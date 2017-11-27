<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_awards extends Model
{
    protected $table = 'awards';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
