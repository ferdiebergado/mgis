<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('g1')->default(0);
            $table->integer('g2')->default(0);
            $table->integer('g3')->default(0);
            $table->integer('g4')->default(0);
            $table->integer('g5')->default(0);
            $table->integer('g6')->default(0);
            $table->string('remarks')->nullable();
            $table->year('sy');
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
        Schema::dropIfExists('enrolments');
    }
}
