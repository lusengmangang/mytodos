<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MtActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('mt_activity', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('task');
            $table->string('activity') ;
            $table->string('details');
            $table->text('images')->nullable();
            $table->string('action');
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
