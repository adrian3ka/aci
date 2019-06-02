<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAndCandidateTable extends Migration
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
            $table->string('email', 50)->nullable()->change();
            $table->string('identity_number', 50)->nullable()->change();
            
            $table->string('birth_place')->nullable();
        });
        
        Schema::table('candidate_users' , function (Blueprint $table) {
            $table->string('birth_place')->nullable();
        });
        Schema::table('contacts' , function (Blueprint $table) {
            $table->string('relation')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('email', 50)->nullable(false)->change();
            $table->string('identity_number', 50)->nullable(false)->change();
            
            
            $table->dropColumn('birth_place');
        });
        
        
        Schema::table('candidate_users' , function (Blueprint $table) {
            $table->dropColumn('birth_place');
        });
        
        
        Schema::table('contacts' , function (Blueprint $table) {
            $table->dropColumn('relation');
        });
    }
}
