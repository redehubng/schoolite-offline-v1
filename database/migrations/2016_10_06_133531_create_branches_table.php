<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('website');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('facebook');
            $table->string('googleplus');
            $table->string('lat');
            $table->string('long');
            $table->string('embed');
            $table->string('instagram');
            $table->string('vimeo');
            $table->string('youtube');
            $table->string('twitter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
