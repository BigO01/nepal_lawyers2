<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_questions extends Model
{
    protected $table = 'questions';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
