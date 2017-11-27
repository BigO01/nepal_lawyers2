<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_quickconsultations extends Model
{
    protected $table = 'quickconsultations';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
