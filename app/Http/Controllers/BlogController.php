<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('blog.index', ['posts' => $posts]);
    }

    public function show($id){
        $post = Post::findOrFail($id);

        return view('blog.show', ['post' => $post]);
    }

    public function create(){
        $categories = Category::all();

        return view('blog.create', ['categories' => $categories]);
    }

    public function store(){
        $post = new Post();

        $post->title = request('title');
        $post->user_id = request('user_id');
        $post->category_id = request('category');
        $post->content = request('content');

        $post->save();

        return redirect('/');
    }

    public function categories($id){
        $posts = Post::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $category = Category::findOrFail($id);

        return view('blog.categories', ['posts' => $posts, 'category' => $category]);
    }

    public function search(){
        $search = request('search');
        $posts = Post::where('content', 'like', '%' . $search . '%')->orWhere('title', 'like', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(4);

        return view('blog.search', ['posts' => $posts, 'search' => $search]);
    }
}
