<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('channels',function(Blueprint $table){
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('urlImage')->nullable();
            $table->string('titleImage')->nullable();
            $table->string('linkImage')->nullable();
            $table->string('pubDate')->nullable();
            $table->string('generator')->nullable();
            $table->string('link')->nullable();
            $table->integer('userId')->unsigned();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
