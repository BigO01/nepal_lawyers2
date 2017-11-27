<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_lawyers extends Model
{
    protected $table = 'lawyers';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
