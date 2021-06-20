<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name');
            $table->string('address');
            $table->string('phone_number', 100);
            $table->string('number');
            $table->string('username');
            $table->string('password');
            $table->bigInteger('Teacher_id')->index('fk_Students_Teacher_idx');
            $table->bigInteger('Class_id')->index('fk_Students_Class1_idx');
            $table->bigInteger('Books_id');
            $table->bigInteger('Books_Surah_id');
            $table->primary(['id', 'Teacher_id', 'Class_id', 'Books_id', 'Books_Surah_id']);
            $table->index(['Books_id', 'Books_Surah_id'], 'fk_Students_Books1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
