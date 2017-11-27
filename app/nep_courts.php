<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_courts extends Model
{
    protected $table = 'courts';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
