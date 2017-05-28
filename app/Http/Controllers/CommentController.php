<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all comments
        $comments = Comment::all();
        return $comments;
        $comments = $this->getCommentsTree($comments);

        Log::info("Get all nested comments.");
        return $comments;
    }

    public function getCommentsTree($comments) {
        $comments_by_id = new Collection;

        // Store comments in Collection
        foreach ($comments as $comment)
        {
            $comments_by_id->put($comment->id, $comment);
        }

        // Loop through comments and make an organized tree
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
        // Create a new comment
        $comment = new Comment();
        $comment->name = $request->get("name");
        $comment->comment = $request->get("comment");
        $comment->level = 0;

        // Check if parent is provided
        if($request->get("parent")) {
            $parent = Comment::find($request->get("parent"));
            $comment->comment_id = $request->get("parent");
            $comment->level = $parent->level + 1;
        }

        // Maximum of 3 levels in nested comments
        if($comment->level > 2) {
            Log::error("Level of comment parent is > 2");
            abort(400, "Bad request. You cannot add a reply to this comment.");
        }

        $comment->save();
        Log::info("Comment saved with id : ". $comment->id);

        return $comment;
    }
}
