<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Browser extends Model
{
    protected $fillable = ['name', 'count'];

    public $timestamps = false;
}
