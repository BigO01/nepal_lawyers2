<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_certificate_award extends Model
{
   	protected $table = 'certificate_award';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
