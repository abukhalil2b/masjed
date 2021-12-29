<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->integer('user_id')->comment('برنامج يتبع مسجد معين');//EX: msjed_id
            $table->string('status')->nullable();//NULL -end - coming - going
            $table->timestamps();
        });
    }

    /**
             
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
