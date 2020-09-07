<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManstatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansubjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
//            $table->timestamps();
        });

        Schema::create('manstatistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('year');
            $table->string('pupil');
            $table->integer('position');
//            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('mansubjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mansabjects');
        Schema::dropIfExists('manstatistics');
    }
}
