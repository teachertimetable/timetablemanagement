<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSubjectTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject', function (Blueprint $table) {
            $table->dropColumn ('teacher_id');
            $table->dropColumn('credit');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject', function (Blueprint $table) {

        });
    }
}
