<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_answers extends Model
{
    protected $table = 'answers';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
