<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('total_schools')->default(0);
            $table->bigInteger('total_teachers')->default(0);
            $table->bigInteger('total_g1')->default(0);
            $table->bigInteger('total_g2')->default(0);
            $table->bigInteger('total_g3')->default(0);
            $table->bigInteger('total_g4')->default(0);
            $table->bigInteger('total_g5')->default(0);
            $table->bigInteger('total_g6')->default(0);
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
        Schema::dropIfExists('districts');
    }
}
