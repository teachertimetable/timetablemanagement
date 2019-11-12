<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable_main', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('timetable_name');
            $table->json('timetable_info');
            $table->bigInteger ("user_id");
            $table->foreign('user_id')
                ->references ('id')->on('users')
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
        Schema::dropIfExists('timetable_main');
    }
}
