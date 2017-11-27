<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_lawfirms extends Model
{
    protected $table = 'lawfirms';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
