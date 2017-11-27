<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_testimonials extends Model
{
    protected $table = 'testimonials';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
