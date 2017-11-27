<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_appointments extends Model
{
    protected $table = 'appointments';
   	protected $guarded = ['id'];
    public $timestamps = true;
}
