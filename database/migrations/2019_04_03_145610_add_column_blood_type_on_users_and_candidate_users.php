<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBloodTypeOnUsersAndCandidateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //   
		Schema::table('users', function (Blueprint $table) {
            $table->string('blood_type');
        });
        Schema::table('candidate_users', function (Blueprint $table) {
            $table->string('blood_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('candidate_users', function (Blueprint $table) {
            $table->dropColumn('blood_type');
        });
        
		Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('blood_type');
        });
    }
}
