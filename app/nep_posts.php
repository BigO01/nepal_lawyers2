<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_posts extends Model
{
    protected $table = 'posts';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
