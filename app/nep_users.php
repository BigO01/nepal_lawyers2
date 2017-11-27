<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class nep_users extends Model
{
    use EntrustUserTrait;
    use Notifiable;
	
	protected $table = 'users';
   	protected $guarded = ['id'];
    public $timestamps = false;
	/* protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];	*/
}
