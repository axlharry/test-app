<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller{

    public function index() {
        return view('homepage', [
            'posts' => Post::latest()->paginate(6)
        ]);
    }

    public function create() {
        return view('create');
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}