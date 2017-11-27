<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('region_id')->nullable();
			$table->integer('state_id')->nullable();
			$table->integer('city_id')->nullable();
            $table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
            $table->string('user_email')->unique();
            $table->text('password')->nullable();
			$table->text('contact')->nullable();
			$table->text('office_contact')->nullable();
			$table->text('home_contact')->nullable();
			$table->text('address')->nullable();
			$table->text('image_path')->nullable();
			$table->enum('role', array('admin', 'lawfirm','lawyer','guest'))->nullable();
			$table->boolean('gender')->nullable();
			$table->boolean('status')->nullable();
			
            $table->rememberToken();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('users');
    }
}
