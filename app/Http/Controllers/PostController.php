<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\Validation\Rule;

class PostController extends Controller{

    public function index() {
        return view('homepage', [
            'posts' => Post::latest()->paginate(6)
        ]);
    }

    public function create() {
        return view('create');
    }

    public function store() {

        request()->validate([
            'title' => 'required',
            'slug' => ['required', 'unique:posts'],
            'body' => 'required'
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body')
        ]);

        return redirect ('/');
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}