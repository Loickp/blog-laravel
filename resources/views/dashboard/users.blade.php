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
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Inscription date</th>
                    <th class="px-4 py-2">Role</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->created_at->format('F j, Y') }}</td>
                            <td class="border px-4 py-2">{{ $user->role->role_name }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center">
                                    <a href="/dashboard/users/edit/{{ $user->id }}">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded-full">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/dashboard/users/delete/{{ $user->id }}" method="post">
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
                {{ $users->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection