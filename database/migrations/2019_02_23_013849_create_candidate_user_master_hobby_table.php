<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateUserMasterHobbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_user_master_hobby', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('master_hobby_id')->unsigned();
            $table->foreign('master_hobby_id')->references('id')->on('master_hobbies')->onDelete('cascade');
            
            
            $table->integer('candidate_user_id')->unsigned();
            $table->foreign('candidate_user_id')->references('id')->on('candidate_users')->onDelete('cascade');
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
        Schema::dropIfExists('candidate_user_master_hobby');
    }
}
