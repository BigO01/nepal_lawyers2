<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_abouts extends Model
{
    protected $table = 'abouts';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
