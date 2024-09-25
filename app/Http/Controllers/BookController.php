<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->type;
        $filter = $request->title;
        $query = Book::query();
        if ($filter) {
            $query->where('title', 'LIKE', '%' . $filter . '%');
        }
        if ($type == 'latest') {
            $query->withCount('reviews')->withAvg('reviews', 'rating')->latest();
        } else if ($type == 'popular_last_months') {
            $query->withCount(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(1));
            }])
            ->withAvg(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(1));   
            }], 'rating')
                ->having('reviews_count', '>', 0)
                ->orderBy('reviews_count', 'desc');
        } else if ($type == 'popular_last_6_months') {
            $query->withCount(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(6));
            }])
            ->withAvg(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(6));   
            }], 'rating')
                ->having('reviews_count', '>', 0)
                ->orderBy('reviews_count', 'desc');
        } else if ($type == 'highest_rating_last_month') {
            $query->withCount(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(1));
            }])
            ->withAvg(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(1));   
            }], 'rating')
                ->having('reviews_avg_rating', '>', 0)
                ->orderBy('reviews_avg_rating', 'desc');
        } else if ($type == 'highest_rating_last_6_month') {
            $query->withCount(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(6));
            }])
            ->withAvg(['reviews' => function($q) {
                $q->where('created_at', '>=', now()->subMonth(6));   
            }], 'rating')   
                ->having('reviews_avg_rating', '>', 0)
                ->orderBy('reviews_avg_rating', 'desc');
        } else {
            $query->withCount('reviews')->withAvg('reviews', 'rating');
        }

        $cacheKey = 'books:' . $filter . ':' . $type;

        $books = cache()->remember($cacheKey, 3600, fn() => $query->paginate(50));

        return response()->json([
            'data' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cacheKey = 'book:' . $id;

        $book = cache()->remember($cacheKey, 3600, fn() => Book::withCount('reviews')->withAvg('reviews', 'rating')->findOrFail($id));
 
        return view('books.detail', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeReview(Request $request) {

        $book_id = $request->id;
        $review = $request->review;
        $rating = $request->rating;

        $book = Book::findOrFail($book_id);

        $book->reviews()->create([
            'review' => $review,
            'rating' => $rating,
        ]);

        return response()->json([
            'message' => 'Review added successfully',
            'status' => 'success',
        ]);
    }

    public function getReview($id) {

        $reviews = Book::with(['reviews' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return response()->json([
            'data' => $reviews,
        ]);

    }
}
