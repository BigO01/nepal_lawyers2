<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_cities extends Model
{
    protected $table = 'cities';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
