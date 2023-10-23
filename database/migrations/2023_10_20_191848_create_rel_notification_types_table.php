<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelNotificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_notification_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_types_id');
            $table->unsignedBigInteger('notifications_id');
            $table->timestamps();
            
            //foreing keys
            $table->foreign('notification_types_id')->references('id')->on('notification_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('notifications_id')->references('id')->on('notifications')->onUpdate('cascade')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_notification_types');
    }
}
