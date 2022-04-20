<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Htttp\Request;

class UserPostController extends Controller {
    public function index(){
        return view('userpage',
            ['posts' => auth()->id()->posts]
        );
    }


}