<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items',function(Blueprint $table){
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('desa')->nullable();
            $table->string('desimg')->nullable();
            $table->string('desplaintext')->nullable();
            $table->string('pubDate')->nullable();
            $table->string('link')->nullable();
            $table->string('guid')->nullable();
            $table->string('slash')->nullable();
            $table->integer('channelId')->unsigned();
            $table->timestamps();
            $table->foreign('channelId')->references('id')->on('channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}