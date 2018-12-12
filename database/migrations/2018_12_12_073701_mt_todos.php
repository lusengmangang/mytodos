<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MtTodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mt_todos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title') ;
            $table->string('desc');
            $table->string('key');
            $table->string('owner')->nullable();
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
