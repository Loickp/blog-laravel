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
}
