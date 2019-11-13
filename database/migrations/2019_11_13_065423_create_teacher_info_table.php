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
        Schema::create('teacher_info', function (Blueprint $table) {
            $table->text('teacher_id')->primary();
            $table->text('teacher_name');
            $table->text('teacher_pic_src');
            $table->text('teacher_email');
            $table->text('teacher_tel');
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
        Schema::dropIfExists('teacher_info');
    }
}
