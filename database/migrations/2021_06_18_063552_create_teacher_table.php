<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name');
            $table->string('number');
            $table->string('phone_number', 100);
            $table->string('username');
            $table->string('password');
            $table->bigInteger('Class_id')->index('fk_Teacher_Class1_idx');
            $table->primary(['id', 'Class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
