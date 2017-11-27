<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_post_comment extends Model
{
    protected $table = 'post_comment';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
