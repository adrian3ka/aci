<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnContactOnUserAndCandidate extends Migration
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
            $table->string('cellphone')->nullable();
        });
        Schema::table('candidate_users', function (Blueprint $table) {
            $table->string('cellphone')->nullable();
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
            $table->dropColumn('cellphone');
        });
        
		Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cellphone');
        });
    }
}
