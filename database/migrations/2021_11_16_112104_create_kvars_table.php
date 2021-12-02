<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKvarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kvars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('modelAuta');
            $table->string('registarskeTablice')->nullable();
            $table->string('simptom');
            $table->string('dijagnoza')->nullable();
            $table->string('izvrsenePopravke')->nullable();
            $table->string('imeMajstora')->nullable();
            $table->string('comment')->nullable();
            $table->integer('klijentID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kvars');
    }
}
