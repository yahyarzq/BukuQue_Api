<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->tinyInteger('is_nugas');
            $table->tinyInteger('is_ngaji');
            $table->tinyInteger('is_doabanguntidur');
            $table->tinyInteger('is_doabelumtidur');
            $table->text('book_content');
            $table->tinyInteger('is_subuh');
            $table->tinyInteger('is_dzuhur');
            $table->tinyInteger('is_azhar');
            $table->tinyInteger('is_maghrib');
            $table->tinyInteger('is_isya');
            $table->timestamp('date', 1)->default('current_timestamp(1)');
            $table->bigInteger('Surah_id')->index('fk_Books_Surah1_idx');
            $table->tinyInteger('bookisreviewed')->nullable();
            $table->primary(['id', 'Surah_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
