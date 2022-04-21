<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostCommentsController extends Controller {
    public function store(Post $post) {

        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }

    public function edit(Request $request, Comment $comment) {

        if ($request->user()->cannot('edit', $comment)) {
            abort(403);
        }

        return view('edit-comment', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment) {

        if ($request->user()->cannot('update', $comment)) {
            abort(403);
        }

        $attributes =request()->validate([
            'body' => 'required',
        ]);

        $comment->update($attributes);

        return redirect ('/');
    }

    public function destroy(Request $request, Comment $comment) {
        if ($request->user()->cannot('destroy', $comment)) {
            abort(403);
        }

        $comment->delete();

        return redirect('/');
    }

}