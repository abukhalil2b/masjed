<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_program', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('program_id');
        });

        Schema::create('user_has_studentstatement', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('studentstatement_id');
        });

        Schema::create('user_has_msjedstatement', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('msjedstatement_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_program');
        Schema::dropIfExists('user_has_studentstatement');
        Schema::dropIfExists('user_has_msjedstatement');
    }
}
