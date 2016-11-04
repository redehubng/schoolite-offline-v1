<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->enum('first_term', ["active", "closed", "inactive"])->default('inactive');
            $table->enum('second_term', ["active", "closed", "inactive"])->default('inactive');
            $table->enum('third_term', ["active", "closed", "inactive"])->default('inactive');
            $table->enum('status', ["active", "closed", "inactive"])->default('inactive');
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
        Schema::drop('sessions');
    }
}
