<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_languages extends Model
{
    protected $table = 'languages';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
