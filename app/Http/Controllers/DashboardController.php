<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Category;
use App\Role;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.index', ['posts' => $posts]);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        $categories = Category::whereNotIn('id', [$post->category_id])->get();

        return view('dashboard.show', ['post' => $post, 'categories' => $categories]);
    }

    public function update($id){
        $post = Post::findOrFail($id);

        $post->title = request('title');
        $post->category_id = request('category');
        $post->content = request('content');

        $post->save();

        return redirect('/dashboard');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/dashboard');
    }
    
    public function users(){
        $users = User::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.users', ['users' => $users]);
    }

    public function user_show($id){
        $user = User::findOrFail($id);
        $roles = Role::whereNotIn('id', [$user->role_id])->get();

        return view('dashboard.user_show', ['user' => $user, 'roles' => $roles]);
    }

    public function user_update($id){
        $user = User::findOrFail($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->role_id = request('role');

        $user->save();

        return redirect('/dashboard/users');
    }

    public function user_destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard/users');
    }
}
