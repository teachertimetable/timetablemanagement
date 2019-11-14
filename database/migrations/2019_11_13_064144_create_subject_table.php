<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_info', function (Blueprint $table) {
            $table->string('teacher_id')->primary();
            $table->string('teacher_name');
            $table->string('teacher_pic_src');
            $table->string('teacher_email');
            $table->string('teacher_tel');
            $table->timestamps();
        });
        Schema::create('subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject_id');
            $table->string('subject_name');
            $table->smallInteger('credit');
            $table->string('teacher_id');
            $table->time ('start_time');
            $table->time('end_time');
            $table->foreign ('teacher_id')
                ->references ('teacher_id')->on('teacher_info')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists ('teacher_info');
        Schema::dropIfExists('subject');
    }
}
