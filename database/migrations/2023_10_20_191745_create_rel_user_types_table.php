<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_user_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('types_id');
            $table->timestamps();
            
            //foreing keys
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('types_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::table('rel_user_types')->insert([
            'users_id' => 1,
            'types_id' => 1,
        ]); 
        
        DB::table('rel_user_types')->insert([
            'users_id' => 1,
            'types_id' => 2,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_user_types');
    }
}
