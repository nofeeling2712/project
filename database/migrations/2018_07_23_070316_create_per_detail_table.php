<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('per_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action_name');
            $table->string('action_code');
            $table->integer('check_action');                   
            $table->integer('id_per')->unsigned();
            $table->foreign('id_per')->references('id')->on('permission');
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
        Schema::dropIfExists('per_detail');
    }
}
