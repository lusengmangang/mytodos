<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MtActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mt_myactivities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity') ;
            $table->string('details');
            $table->text('images')->nullable();
            $table->string('project')->deafult('0');
            $table->string('owner')->deafult('0');
            $table->timestamp('added_on') ;
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
        //
    }
}
