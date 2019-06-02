<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmailAndIdentityNumberToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_users', function (Blueprint $table) {
            $table->string('email', 50)->nullable()->change();
            $table->string('identity_number', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_users', function (Blueprint $table) {
            //
            $table->string('email', 50)->nullable(false)->change();
            $table->string('identity_number', 50)->nullable(false)->change();
        });
    }
}
