@extends('layouts.blog')

@section('content')


    <div class="container mx-auto">
        <div class="mt-12">
          <h2 class="text-4xl font-medium">{{ $post->title }}</h2>
          <p class="my-2">by <a href="#" class="text-blue-500">{{ $post->user->name }}</a></p>
          <hr>
          <p class="my-2">{{ $post->created_at->format('F j, Y') }}</p>
        </div>
      </div>
        <div class="container mx-auto">
            <div class="flex">
                <div class="w-4/6 mb-8">
                  <div class="my-2">
                    <img class="w-full my-4" style="height: 400px;" src="{{ asset('images/img.png') }}">
                    <p>
                        {{ $post->content }}
                    </p>
                  </div>
                </div>

                <div class="w-2/6 mt-8 ml-10">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection