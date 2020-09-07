<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherinmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherinmos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mo_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('mo_id')->references('id')->on('mos')->onDelete('cascade');
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->boolean('active')->after('vcp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacherinmos');
    }
}
