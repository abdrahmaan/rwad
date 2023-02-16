<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarMovmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_movments', function (Blueprint $table) {
            $table->id();
            $table->integer("Tabashery");
            $table->string("PlateNumber");
            $table->string("CarType");
            $table->integer("StartCounter");
            $table->integer("EndCounter");
            $table->integer("Diff");
            $table->string("BranchName");
            $table->string("op");

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
        Schema::dropIfExists('car_movments');
    }
}
