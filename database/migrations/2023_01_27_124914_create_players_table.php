<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * PlayerCode

     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string("PlayerName");
            $table->integer("Age");
            $table->string("Address");
            $table->string("Phone1");
            $table->string("Phone2");
            $table->string("DateOfBirth");
            $table->string("Position");
            $table->string("Height");
            $table->string("Weight");
            $table->string("GroupName");
            $table->string("BranchName");
            $table->string("CategoryName");
            $table->string("Status");
            $table->string("VideoLink")->nullable();
            $table->string("ImagePath")->nullable();
            $table->string("TotalPhy")->nullable();
            $table->string("TotalAdaKhaty")->nullable();
            $table->string("TotalMahary")->nullable();
            $table->string("TotalMentalState")->nullable();
            $table->string("TotalBrainState")->nullable();

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
        Schema::dropIfExists('players');
    }
}
