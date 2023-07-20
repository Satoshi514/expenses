<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgos', function (Blueprint $table) {
            $table->id();
            $table->string('major_subject_name');
            $table->string('subject');
            $table->integer('year')->unsigned();
            $table->integer('month')->unsigned();
            $table->integer('amount')->unsigned();
            $table->text('description');
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
        Schema::dropIfExists('outgos');
    }
};
