<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('email_personal')->nullable();
            $table->string('phone_number',30)->nullable();
            $table->string('skype_id_personal',55)->nullable();
            $table->string('skype_id_official',55)->nullable();
            $table->text('profile_summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('email_personal');
            $table->dropColumn('phone_number');
            $table->dropColumn('skype_id_personal');
            $table->dropColumn('skype_id_official');
            $table->dropColumn('profile_summary');
        });
    }
}
