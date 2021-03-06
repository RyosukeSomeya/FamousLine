<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlamdunkLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slamdunk_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('title_id');
            $table->integer('slamdunk_character_id');
            $table->text('famousline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slamdunk_lines');
    }
}
