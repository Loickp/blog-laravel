@extends('layouts.blog')

@section('content')
<div class="container mx-auto">
    <div class="flex">
        <div class="w-1/6 mt-6 ml-10">
            @include('layouts.sidebar_dash')
        </div>
        <div class="w-5/6 h-screen">
            <div class="bg-white rounded-lg shadow mt-24">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-300">
                        <th class="px-4 py-2">Post title</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Author</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="border px-4 py-2">{{ $post->title }}</td>
                                <td class="border px-4 py-2">{{ $post->category->category_name }}</td>
                                <td class="border px-4 py-2">{{ $post->created_at->format('F j, Y') }}</td>
                                <td class="border px-4 py-2">{{ $post->user->name }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-center">
                                        <a href="/dashboard/edit/{{ $post->id }}">
                                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded-full">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="/dashboard/delete/{{ $post->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded-full" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-8">
                {{ $posts->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection