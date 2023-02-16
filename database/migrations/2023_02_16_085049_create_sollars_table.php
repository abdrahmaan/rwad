<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSollarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sollars', function (Blueprint $table) {
            $table->id();
            $table->integer("Tabashery");
            $table->string("PlateNumber");
            $table->string("CarType");
            $table->integer("Counter");
            $table->double("Liter");
            $table->double("CostLiter");
            $table->double("Total");
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
        Schema::dropIfExists('sollars');
    }
}
