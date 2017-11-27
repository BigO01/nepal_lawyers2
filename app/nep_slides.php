<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_slides extends Model
{
    protected $table = 'slides';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
