<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 'teacher_info' , function (Blueprint $table) {
            $table->string ( 'teacher_id' )->primary ();
            $table->string ( 'teacher_name' );
            $table->string ( 'teacher_pic_src' );
            $table->string ( 'teacher_email' );
            $table->string ( 'teacher_tel' );
            $table->string ( 'position' );
            $table->string ( 'teacher_tel_fax' );
            $table->string ( 'minor' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ( 'teacher_info' );
    }
}
