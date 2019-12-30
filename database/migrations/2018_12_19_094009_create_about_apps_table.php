<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_apps', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('body');

            $table->string('address');

            $table->string('fb_link');
            $table->string('twitter_link');

            $table->string('google_link');

            $table->string('insta_link');
            $table->string('snap_link');

            $table->string('privacy_title');

            $table->longText('privacy_policy');


            $table->string('consultant_privacy_title');

            $table->longText('consultant_privacy_policy');            
            
            

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
        Schema::dropIfExists('about_apps');
    }
}
