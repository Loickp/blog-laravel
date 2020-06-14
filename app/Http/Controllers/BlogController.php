<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('blog.index', ['posts' => $posts]);
    }

    public function show($id){
        $post = Post::findOrFail($id);

        return view('blog.show', ['post' => $post ]);
    }

    public function create(){
        return view('blog.create');
    }

    public function store(){
        $post = new Post();

        $post->title = request('title');
        $post->user_id = request('user_id');
        $post->content = request('content');

        $post->save();

        return redirect('/');
    }
}
