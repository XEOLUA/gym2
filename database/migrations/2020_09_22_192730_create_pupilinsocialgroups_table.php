<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilinsocialgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupilinsocialgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('socialgroup_id')->unsigned();
            $table->integer('pupil_id')->unsigned();

            $table->foreign('pupil_id')->references('id')->on('pupils')->onDelete('cascade');
            $table->foreign('socialgroup_id')->references('id')->on('socialgroups')->onDelete('cascade');

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
        Schema::dropIfExists('pupilinsocialgroups');
    }
}
