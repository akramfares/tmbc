<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array('name', 'comment', 'level');

    /**
     * Get the replies for the comment.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the comment that owns the reply.
     */
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
