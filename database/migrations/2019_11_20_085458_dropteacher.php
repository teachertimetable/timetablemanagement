<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubjectTypeToSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject', function (Blueprint $table) {
            $table->string('subject_type_id');
            $table->foreign ('subject_type_id')
                ->references ('subject_type_id')->on('subject_type')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
            $table->dropForeign ('subject_type_id_foreign');
            $table->dropColumn('subject_type_id');
        });
    }
}
