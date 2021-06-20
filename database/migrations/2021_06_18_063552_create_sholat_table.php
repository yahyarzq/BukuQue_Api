<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSholatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sholat', function (Blueprint $table) {
            $table->bigInteger('sholat_id', true);
            $table->tinyInteger('is_subuh');
            $table->tinyInteger('is_dzuhur');
            $table->tinyInteger('is_azhar');
            $table->tinyInteger('is_maghrib');
            $table->tinyInteger('is_isya');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sholat');
    }
}
