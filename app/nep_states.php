<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_states extends Model
{
    protected $table = 'states';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
