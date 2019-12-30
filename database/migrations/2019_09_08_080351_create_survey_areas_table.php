<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('area_id')->unsigned()->nullable();
            //$table->foreign('area_id')->references('id')->on('areas')->onUpdate('set null')->onDelete('set null');
            $table->integer('survey_id')->unsigned()->nullable();
            //$table->foreign('survey_id')->references('id')->on('surveys')->onUpdate('set null')->onDelete('set null');
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
        Schema::dropIfExists('survey_areas');
    }
}
