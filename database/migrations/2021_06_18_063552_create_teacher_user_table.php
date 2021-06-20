<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_user', function (Blueprint $table) {
            $table->bigInteger('teacher_id', true);
            $table->string('username', 16);
            $table->string('email')->nullable();
            $table->string('password', 32);
            $table->timestamp('create_time')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_user');
    }
}
