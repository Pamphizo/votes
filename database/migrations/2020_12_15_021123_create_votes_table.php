<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');  //province for elector(intara yutora avukamo)
            $table->unsignedBigInteger('district_id');//akarere utora aturukamo
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('date')->useCurrent();
            $table->timestamps();

            $table->unique(['season_id','user_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
