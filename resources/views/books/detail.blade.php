@extends('layout.app')

@section('content')
    <div class="bg-gray-100 dark:bg-gray-800 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                        <img class="w-full h-full object-cover" src="{{ $book->image }}" alt="Product Image">
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $book->title }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        {{ $book->description }}
                    </p>
                    <div class="flex items-center mb-4">
                        @for ($i = 0; $i < round($book->reviews_avg_rating); $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor

                        <span class="ml-2 text-gray-600">{{ round($book->reviews_avg_rating, 1) }}
                            ({{ $book->reviews_count }}
                            reviews)</span>
                    </div>

                    <div class="mb-4">
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <span class="font-bold text-gray-700 dark:text-gray-300">Author:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $book->author }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Availability:</span>
                                <span class="text-gray-600 dark:text-gray-300">In Stock</span>
                            </div>
                        </div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                            {{ $book->description }}
                        </p>
                    </div>

                    <div class="">
                        <h3 class="font-bold text-gray-700 dark:text-gray-300">Key Features:</h3>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Industry-leading noise cancellation</li>
                            <li>30-hour battery life</li>
                            <li>Touch sensor controls</li>
                            <li>Speak-to-chat technology</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-white px-4 py-12 md:py-24">
        <div class="max-w-screen-xl mx-auto">
            <h2 class="font-black text-black text-center text-3xl leading-none uppercase max-w-2xl mx-auto mb-12">What
                Listeners
                Are Saying</h2>
            <div class="max-w-screen-xl px-6 mx-auto mb-12 lg:px-8 xl:px-4 lg:mb-16 xl:mb-24">
                <div class="flex flex-col items-center justify-space-between">
                    <form
                        class="border border-yellow-400 rounded-lg bg-yellow-100/50 p-6 rounded-lg shadow-md w-full md:w-[65%]">
                        <input type="hidden" name="" id="id" value="{{ $book->id }}" id="">
                        <div class="flex flex-col md:flex-row justify-center items-center gap-6">
                            <div class="w-full md:w-1/2">
                                <label for="review" class="block text-gray-700 font-bold mb-2">Your Review</label>
                                <textarea id="review" name="review" rows="4"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                            </div>
                            <div class="w-full md:w-1/2">
                                <label for="rating" class="block text-gray-700 font-bold mb-2">Your Rating</label>
                                <div class="flex space-x-2 text-yellow-400">
                                    <input type="radio" name="rating" id="star1" value="1" class="hidden">
                                    <label for="star1" class="cursor-pointer">
                                        <svg class="rating-star w-6 h-6 fill-current text-gray-400 hover:text-yellow-400"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="radio" name="rating" id="star2" value="2" class="hidden">
                                    <label for="star2" class="cursor-pointer">
                                        <svg class="rating-star w-6 h-6 fill-current text-gray-400 hover:text-yellow-400"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="radio" name="rating" id="star3" value="3" class="hidden">
                                    <label for="star3" class="cursor-pointer">
                                        <svg class="rating-star w-6 h-6 fill-current text-gray-400 hover:text-yellow-400"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="radio" name="rating" id="star4" value="4" class="hidden">
                                    <label for="star4" class="cursor-pointer">
                                        <svg class="rating-star w-6 h-6 fill-current text-gray-400 hover:text-yellow-400"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="radio" name="rating" id="star5" value="5" class="hidden">
                                    <label for="star5" class="cursor-pointer">
                                        <svg class="rating-star w-6 h-6 fill-current text-gray-400 hover:text-yellow-400"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                            </path>
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" id="btn-save"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-full">Submit
                                Review</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col" id="reviews-container">

            </div>
        </div>
    </section>
@endsection

@section('secsion-content')
    <script>
        function fetchReview() {
            const id = $('#id').val();
            $.ajax({
                url: '/api/review/get/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    const reviews = response.data.reviews;
                    let reviewsHtml = '';
                    reviews.forEach(function(item) {
                        reviewsHtml += `
                            <div class="bg-gray-200 rounded-lg p-8 text-center m-2">
                                <p class="text-xl font-light italic text-gray-700">${item.review}</p>
                                <div class="flex items-center justify-center space-x-2 mt-4">
                                    ${renderStars(item.rating)}
                                </div>
                            </div>
                        `;
                    });
                    $('#reviews-container').html(reviewsHtml);
                },
                error: function(xhr, status, error) {
                    console.log('Error loading reviews:', error);
                }
            });
        }

        function renderStars(rating) {
            let starsHtml = '';
            for (let i = 0; i < rating; i++) {
                starsHtml += `
                    <svg class="text-yellow-500 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" stroke="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                `;
            }
            return starsHtml;
        }
        
        $(document).ready(function() {
            fetchReview();

            $('form').on('submit', function(event) {
                event.preventDefault();
            });

            function updateStars(rating) {
                $('.rating-star').each(function(index) {
                    if (index < rating) {
                        $(this).addClass('text-yellow-400').removeClass('text-gray-400');
                    } else {
                        $(this).addClass('text-gray-400').removeClass('text-yellow-400');
                    }
                });
            }

            $('input[name="rating"]').on('change', function() {
                const rating = $(this).val();
                updateStars(rating);
            });

            $('#btn-save').on('click', function() {
                const id = $('#id').val();
                const review = $('#review').val();
                const rating = $('input[name="rating"]:checked').val();
                $.ajax({
                    url: '/api/review/store',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        review: review,
                        rating: rating,
                    },
                    success: function(response) {
                        if (response.status) {
                            swal(response.message, "", response.status);
                            fetchReview();

                        }
                    },
                    error: function(xhr, status, error) {
                        swal("Something Went Wrong", "", "error");
                    }
                })
            })
        });
    </script>
@endsection
