<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_expertises extends Model
{
    protected $table = 'expertises';
	protected $guarded = ['id'];
	public $timestamps = false;
}
