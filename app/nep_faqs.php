<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_faqs extends Model
{
   	protected $table = 'faqs';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
