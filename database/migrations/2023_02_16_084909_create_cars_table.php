<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer("Tabashery");
            $table->string("PlateNumber");
            $table->string("ShasehNumber");
            $table->string("CarType");
            $table->integer("SCounter");
            $table->string("BranchName");
            $table->string("DateExpire");
            $table->integer("NextSollar");
            $table->integer("NextZet");
            $table->integer("NextFilterZ");
            $table->integer("NextFilterH");
            $table->integer("NextSior");
            $table->integer("NextKawtsh");
            $table->integer("NextDbryag");
            $table->integer("NextFramel");
            $table->string("CarImg");
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
        Schema::dropIfExists('cars');
    }
}
