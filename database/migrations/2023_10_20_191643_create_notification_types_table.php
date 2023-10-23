<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('notification_types')->insert([
            ['name' => 'Sport', 'description' => 'Highly competitive sports and information about your favorite disciplines.'],
            ['name' => 'Finance', 'description' => 'Everything about finance, investment and money management.'],
            ['name' => 'Movies', 'description' => 'The world of cinema at your fingertips.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_types');
    }
}
