<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description'];

    public $timestamps = false;

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
