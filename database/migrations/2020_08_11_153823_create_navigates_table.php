<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('block_id')->default(0);
            $table->string('title');
            $table->string('link')->nullable();
            $table->boolean('active')->default(1);
            $table->text('settings')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('navigates');
    }
}
