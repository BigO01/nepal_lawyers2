<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_info extends Model
{
    protected $table = 'info';
	protected $guarded = ['id'];
	public $timestamps = false;
}
