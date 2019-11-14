<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constraints_teacher', function (Blueprint $table) {
            $table->bigIncrements ('id');
            $table->string('constraints_title');
            $table->string('teacher_id');
            $table->foreign ('teacher_id')
                ->references ('teacher_id')->on('teacher_info')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('weekday');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ('constraints_teacher');
    }
}
