<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_photos extends Model
{
    protected $table = 'photos';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
