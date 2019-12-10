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

            /** FOREIGN KEY SUBJECT_ID */
            $table->string ( 'subject_id' );
            $table->foreign ( 'subject_id' )
                ->references ( 'subject_id' )->on ( 'subject' )
                ->onUpdate ( 'cascade' )
                ->onDelete ( 'cascade' );
            /** FOREIGN KEY SUBJECT_ID */

            /** FOREIGN KEY TEACHER_ID */
            $table->string ( 'teacher_id' );
            $table->foreign ( 'teacher_id' )
                ->references ( 'teacher_id' )->on ( 'teacher_info' )
                ->onUpdate ( 'cascade' )
                ->onDelete ( 'cascade' );
            /** FOREIGN KEY TEACHER_ID */

            $table->timestamps ();
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
