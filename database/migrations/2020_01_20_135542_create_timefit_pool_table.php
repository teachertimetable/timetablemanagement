<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimefitPoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 'timefit_pool' , function (Blueprint $table) {
            $table->bigIncrements ( 'id' );
            $table->time ( 'start_time' );
            $table->time ( 'end_time' );
            $table->bigInteger ( 'fit_duration' );
            $table->string ( 'teacher_id' );
            $table->foreign ( 'teacher_id' )
                ->references ( 'teacher_id' )
                ->on ( 'teacher_info' )
                ->onDelete ( 'cascade' )
                ->onUpdate ( 'cascade' );
            $table->string ( 'weekday' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ( 'timefit_pool' );
    }
}
