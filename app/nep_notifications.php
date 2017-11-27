<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nep_notifications extends Model
{
    protected $table = 'notifications';
   	protected $guarded = ['id'];
    public $timestamps = false;
}
