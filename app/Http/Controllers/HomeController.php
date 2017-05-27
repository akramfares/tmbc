<?php

namespace App\Http\Controllers;

use App\Comment;

class HomeController extends Controller
{
    public function __invoke()
    {
        $comments = Comment::all();
        return view('welcome', ['title' => 'TMBC Comments', 'comments' => $comments]);
    }
}
