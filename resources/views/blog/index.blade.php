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
                            <div class="flex my-2">
                                <i class="fa fa-calendar m-1"></i>
                                <p class="mb-2 text-gray-600 font-medium">{{ $post->created_at->format('F j, Y') }} by <a href="#" class="text-blue-500">{{ $post->user->name }}</a></p>
                                <i class="fa fa-tag m-1"></i>
                                <p class="mb-2 text-gray-600 font-medium">{{ $post->category->category_name }}</p>
                            </div>
                            <p class="text-gray-700 text-base">
                                {{ Str::limit($post->content, 300) }}
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <a href="/post/{{ $post->id }}">
                                <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Read more
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-center mt-8">
                    {{ $posts->links() }} 
                </div>
                               
            </div>

            <div class="w-2/6 mt-8 ml-10">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection