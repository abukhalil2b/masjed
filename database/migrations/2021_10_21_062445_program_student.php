<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_student', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id');
            $table->integer('student_id');
        });
    }

    /**
     
     */
    public function down()
    {
        Schema::dropIfExists('program_student');
    }
}
