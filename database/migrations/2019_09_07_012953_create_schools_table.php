<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('schid')->unique();
            $table->string('name');
            $table->string('type');
            $table->integer('total_teachers')->default(0);
            $table->integer('g1')->default(0);
            $table->integer('g2')->default(0);
            $table->integer('g3')->default(0);
            $table->integer('g4')->default(0);
            $table->integer('g5')->default(0);
            $table->integer('g6')->default(0);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
