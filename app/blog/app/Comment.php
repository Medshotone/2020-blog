<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['author', 'content'];

    public function commentable()
    {
        return $this->morphTo();
    }
}
