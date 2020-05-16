@extends('layouts.blog')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold mt-12">Recent posts</h1>
        <div class="flex">
            <div class="w-4/6 mb-8">

                @foreach($posts as $post)
                    <div class="rounded overflow-hidden shadow-lg mt-8">
                        <img class="w-full" src="{{ asset('images/img.png') }}" alt="Sunset in the mountains" style="height: 400px;">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                            <p class="mb-2 text-gray-600 font-medium">{{ $post->created_at->format('F j, Y') }} by <a href="#" class="text-blue-500">{{ $post->user_id }}</a></p>
                            <p class="text-gray-700 text-base">
                                {{ Str::limit($post->content, 300) }}
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Read more
                            </button>
                        </div>
                    </div>
                @endforeach
                
            </div>

            <div class="w-2/6 mt-8 ml-10">
                <div class="max-w-sm rounded overflow-hidden shadow-md">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-2">Search</div>
                        <form class="w-full max-w-sm">
                        <div class="flex items-center border-b border-b-2 border-gray-700 py-2">
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Blog Post">
                            <button class="bg-transparent hover:bg-gray-600 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-600 hover:border-transparent rounded">
                            Search
                            </button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow mt-4">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-2">Categories</div>
                        <ul class="m-2">
                            <li><a href="#">Video games</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow mt-4">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-2">Social Media</div>
                        <ul class="m-2">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection