<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSex extends Migration
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
            $table->enum('gender', ['M', 'F'])->default("M");
        });
        Schema::table('candidate_users', function (Blueprint $table) {
            $table->enum('gender', ['M', 'F'])->default("M");
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
            $table->dropColumn('gender');
        });
        
		Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
}
