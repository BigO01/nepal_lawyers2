<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_lawyer_expertise extends Model
{
    protected $table = 'lawyer_expertise';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
