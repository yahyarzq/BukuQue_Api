<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreign(['Books_id', 'Books_Surah_id'], 'fk_Students_Books1')->references(['id', 'Surah_id'])->on('books')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('Class_id', 'fk_Students_Class1')->references('id')->on('class')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('Teacher_id', 'fk_Students_Teacher')->references('id')->on('teacher')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('fk_Students_Books1');
            $table->dropForeign('fk_Students_Class1');
            $table->dropForeign('fk_Students_Teacher');
        });
    }
}
