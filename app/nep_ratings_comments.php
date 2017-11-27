<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_ratings_comments extends Model
{
    protected $table = 'ratings_comments';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
