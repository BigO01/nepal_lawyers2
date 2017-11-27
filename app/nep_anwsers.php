<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_anwsers extends Model
{
    protected $table = 'anwsers';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
