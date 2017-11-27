<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_regions extends Model
{
    protected $table = 'regions';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
