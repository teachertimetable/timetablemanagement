<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeConstraintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table ( 'constraints_teacher' , function (Blueprint $table) {
            $table->bigInteger ( 'subject_id' );
            $table->foreign ( 'subject_id' )
                ->references ( 'id' )->on ( 'subject' )
                ->onUpdate ( 'cascade' )
                ->onDelete ( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table ( 'constraint_teacher' , function (Blueprint $table) {
            //
        } );
    }
}
