<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use App\Role;
use App\Permission;
use App\User;
class usersrole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
		$owner->name         = 'owner';
		$owner->display_name = 'Project Owner'; // optional
		$owner->description  = 'User is the owner of a given project'; // optional
		$owner->save();
		
		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit other users'; // optional
		$admin->save();
		
		$lawfirm = new Role();
		$lawfirm->name         = 'lawfirm';
		$lawfirm->display_name = 'Lawfirm'; // optional
		$lawfirm->description  = ''; // optional
		$lawfirm->save();
		
		$lawyer = new Role();
		$lawyer->name         = 'lawyer';
		$lawyer->display_name = 'Lawyer'; // optional
		$lawyer->description  = ''; // optional
		$lawyer->save();
		
		$guest = new Role();
		$guest->name         = 'guest';
		$guest->display_name = 'Guest'; // optional
		$guest->description  = ''; // optional
		$guest->save();
		
		$user = new User();
		$user->first_name = 'Nepal';
		$user->last_name = 'Admin';
		$user->user_email = 'admin@nepallawyer.com';
		$user->password =  Crypt::encrypt('nepal@100');
		
		$user->save();
		$user->roles()->attach($owner->id);
		$user->roles()->attach($admin->id);
    }
}
