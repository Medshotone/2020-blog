<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description'];

    public $timestamps = false;

    public function articles(){
        return $this->belongsToMany('App\Article');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
