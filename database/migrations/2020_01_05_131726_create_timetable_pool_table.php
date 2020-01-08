<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablePoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 'timetable_pool' , function (Blueprint $table) {
            $table->bigIncrements ( 'id' );
            $table->string ( 'subject_id' );
            $table->string ( 'teacher_id' );
            $table->string ( 'start_time' );
            $table->string ( 'end_time' );
            $table->string ( 'duration' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ( 'timetable_pool' );
    }
}
