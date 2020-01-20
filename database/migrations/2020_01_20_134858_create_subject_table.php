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
        Schema::create ( 'subject' , function (Blueprint $table) {
            $table->string ( 'subject_id' )->primary ();
            $table->string ( 'subject_name' );
            $table->string ( 'credit' );
            $table->string ( 'category_id' );
            $table->foreign ( 'category_id' )
                ->references ( 'category_id' )
                ->on ( 'categories' )
                ->onDelete ( 'cascade' )
                ->onUpdate ( 'cascade' );
            $table->bigInteger ( 'year' )->nullable ();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ( 'subject' );
    }
}
