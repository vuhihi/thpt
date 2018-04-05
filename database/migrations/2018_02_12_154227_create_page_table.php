<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('main_content');
            $table->string('title');
            $table->string('parent_name');
            $table->integer('order')->nullable();
            $table->string('link')->unique();
            $table->string('fb_title');
            $table->text('fb_description');
            $table->string('fb_image');
            $table->text('google_keywords');
            $table->text('google_description');
            $table->boolean('publish');
            $table->integer('parent_id')->unsigned()->onDelete('cascade');

            $table->timestamps();
        });

        Schema::table('page', function($table) {
        $table->foreign('parent_id')->references('id')->on('category');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page');
    }
}
