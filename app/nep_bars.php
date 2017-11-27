<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_bars extends Model
{
    protected $table = 'bars';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
