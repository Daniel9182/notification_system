<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelNotificationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_notification_images', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('notifications_id');
            $table->unsignedBigInteger('images_id');
            $table->timestamps();
            
            //foreing keys
            $table->foreign('images_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('rel_notification_images');
    }
}
