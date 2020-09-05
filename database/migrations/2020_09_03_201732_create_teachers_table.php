<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('snp');
            $table->string('sex');
            $table->string('date')->nullable();
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->string('honors')->nullable();
            $table->string('photo')->nullable();
            $table->string('phones')->nullable();
            $table->string('mail')->nullable();
            $table->string('pasw')->nullable();
            $table->string('address')->nullable();
            $table->year('last_year_certificate')->nullable();
            $table->date('last_date_courses')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
