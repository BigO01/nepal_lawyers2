<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_certificates extends Model
{
   	protected $table = 'certificates';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
