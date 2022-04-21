<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowingsController extends Controller{

    public function store(User $user, $id) 
    {
        $user->followings()->attach($id);
        return redirect()->back();
    }

    public function destroy(User $user, $id) 
    {
        $user->followings()->detach($id);
        return redirect()->back();
    }

}