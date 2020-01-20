<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachByTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 'teach_by' , function (Blueprint $table) {
            $table->bigIncrements ( 'id' );
            $table->string ( 'teacher_id' );
            $table->foreign ( 'teacher_id' )
                ->references ( 'teacher_id' )
                ->on ( 'teacher_info' )
                ->onDelete ( 'cascade' )
                ->onUpdate ( 'cascade' );
            $table->string ( 'subject_id' );
            $table->foreign ( 'subject_id' )
                ->references ( 'subject_id' )
                ->on ( 'subject' )
                ->onDelete ( 'cascade' )
                ->onUpdate ( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ( 'teach_by' );
    }
}
