<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alpha');
            $table->string('snp');
            $table->date('dt')->nullable();
            $table->string('sex');
            $table->text('address')->nullable();
            $table->text('contacts')->nullable();
            $table->string('mail')->nullable();
            $table->string('from')->nullable();
            $table->integer('class_id')->unsigned();
            $table->text('parents');
            $table->text('descriptions');
            $table->tinyInteger('archive')->nullable();
            $table->string('social_group');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupils');
    }
}
