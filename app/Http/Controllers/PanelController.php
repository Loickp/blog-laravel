<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PanelController extends Controller
{
    public function index(){
        $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('panel.index', ['posts' => $posts]);
    }

    public function show($id){
        $post = Post::findOrFail($id);

        if (Gate::allows('update-post', $post)) {
            return view('panel.show', ['post' => $post ]);
        }

        return redirect('/panel');
    }

    public function update($id){
        $post = Post::findOrFail($id);

        $post->title = request('title');
        $post->content = request('content');

        $post->save();

        return redirect('/panel');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        
        if (Gate::allows('delete-post', $post)){
            $post->delete();
        }

        return redirect('/panel');
    }
}
