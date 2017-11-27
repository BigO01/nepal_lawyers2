<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_claimprofile extends Model
{
    protected $table = 'claimprofile';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
