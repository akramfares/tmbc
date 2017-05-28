<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        $comments_by_id = new Collection;

        foreach ($comments as $comment)
        {
            $comments_by_id->put($comment->id, $comment);
        }

        foreach ($comments as $key => $comment)
        {
            $comments_by_id->get($comment->id)->children = new Collection;

            if ($comment->comment_id != 0)
            {
                $comments_by_id->get($comment->comment_id)->children->push($comment);
                unset($comments[$key]);
            }
        }
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->name = $request->get("name");
        $comment->comment = $request->get("comment");
        if($request->get("parent")) {
            $comment->comment_id = $request->get("parent");
        }
        $comment->level = 0;
        $comment->save();

        return $comment;
    }
}
