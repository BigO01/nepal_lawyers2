<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_days_time extends Model
{
    protected $table = 'days_time';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
