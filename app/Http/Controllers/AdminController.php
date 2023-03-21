<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Routing\Controller;

class AdminController extends Controller


{
    public function showDatos()
    {
        $user = User::all();
        $post = Post::all();
        $comment = Comment::all();
        return view('admin', compact('user', 'post', 'comment'));
    }
}
