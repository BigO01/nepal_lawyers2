<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_badges extends Model
{
    protected $table = 'badges';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
