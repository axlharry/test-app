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

        $attributes =request()->validate([
            'title' => 'required',
            'slug' => ['required', 'unique:posts'],
            'body' => 'required',
            'image' => 'required|image',
            'alt' => 'required',
        ]);

        $attributes['image'] = request()->file('image')->store('post_images');
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect ('/');
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}