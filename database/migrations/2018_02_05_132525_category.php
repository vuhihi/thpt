<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category',function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('order')->nullable();
            $table->text('link');
            $table->string('fb_title');
            $table->text('fb_description');
            $table->text('fb_image');
            $table->text('google_keywords');
            $table->text('google_description');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}
