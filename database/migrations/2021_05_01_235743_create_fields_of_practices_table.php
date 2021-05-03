<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsOfPracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_of_practices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        Schema::create('practices__fields_of_practices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('practice_id');
            $table->unsignedBigInteger('fields_of_practice_id');
            $table->foreign('practice_id')->references('id')->on('practices')
                ->onDelete('cascade');
            $table->foreign('fields_of_practice_id')->references('id')->on('fields_of_practices')
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
        Schema::dropIfExists('practices__fields_of_practices');
        Schema::dropIfExists('fields_of_practices');
    }
}
