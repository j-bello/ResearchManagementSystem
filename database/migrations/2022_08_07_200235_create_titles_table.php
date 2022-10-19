<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('user_number',200)->nullable();
            $table->string('program',200)->nullable();
            $table->string('titlecode',200)->nullable();
            $table->longText('title',200)->nullable();
            $table->longText('description',500)->nullable();
            $table->longText('panelists',200)->nullable();
            $table->string('approvedBy',200)->nullable();
            $table->string('year',200)->nullable();
            $table->string('themes',200)->nullable();
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
        Schema::dropIfExists('titles');
    }
}
