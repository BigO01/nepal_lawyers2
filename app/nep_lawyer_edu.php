<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_lawyer_edu extends Model
{
    protected $table = 'lawyer_edu';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
