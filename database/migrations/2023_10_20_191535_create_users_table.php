<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone', 15)->nullable();
            $table->integer('age');
            $table->string('token')->nullable();
            $table->integer('verification');
            $table->timestamps();
        });
        
        DB::table('users')->insert(
            ['name' => 'administrator','password' =>Hash::make('notifications'),
            'email' => 'administrator@gmail.com',
            'age' => '25',
            'verification' => '1'
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
