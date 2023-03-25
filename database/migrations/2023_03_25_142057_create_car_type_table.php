<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_type', function (Blueprint $table) {
            $table->id();
            $table->string("CarType");
            $table->string("CarImg");
            $table->string("SollarType");
            $table->integer("Sollar");
            $table->integer("Zeet");
            $table->integer("FilterZ");
            $table->integer("FilterH");
            $table->integer("Sior");
            $table->integer("Kawtsh");
            $table->integer("Dbryag");
            $table->integer("Framel");
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
        Schema::dropIfExists('car_types');
    }
}
