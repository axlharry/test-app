<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;


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

    public function edit(Post $post) {
        return view('edit', ['post' => $post]);
    }

    public function update(Post $post) {

        $attributes =request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'body' => 'required',
            'image' => 'image',
            'alt' => 'required',
        ]);

        if (isset($attributes['image'])) {
        $attributes['image'] = request()->file('image')->store('post_images');
        }

        $post->update($attributes);

        return redirect ('/');
    }

}