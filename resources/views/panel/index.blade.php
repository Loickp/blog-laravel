@extends('layouts.blog')

@section('content')
  <div class="container mx-auto">
    <h1 class="text-4xl font-bold mt-8">Your posts</h1>
      <div class="bg-white rounded-lg shadow mt-4">
        <table class="w-full text-left">
            <thead>
              <tr class="bg-gray-300">
                <th class="px-4 py-2">Post title</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
                <tr>
                  <td class="border px-4 py-2">{{ $post->title }}</td>
                  <td class="border px-4 py-2">{{ $post->category->category_name }}</td>
                  <td class="border px-4 py-2">{{ $post->created_at->format('F j, Y') }}</td>
                  <td class="border px-4 py-2">
                    <div class="flex justify-center">
                      <a href="/panel/edit/{{ $post->id }}">
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded-full mr-2">
                            Edit
                        </button>
                      </a>
                      <form action="/panel/delete/{{ $post->id }}" method="post">
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
@endsection