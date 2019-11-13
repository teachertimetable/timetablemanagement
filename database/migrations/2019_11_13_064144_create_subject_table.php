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
        Schema::create('subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('subject_id');
            $table->text('subject_name');
            $table->smallInteger('credit');
            $table->text('teacher_id');
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
        Schema::dropIfExists('subject');
    }
}
