<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('societe_id')->unsigned();
            $table->foreign('societe_id')->references('id')->on('societes');
            $table->bigInteger('ratio_id')->unsigned();
            $table->foreign('ratio_id')->references('id')->on('ratios');
            $table->integer('periode')->nullable()->default(1);
            $table->float('valeur')->nullable()->default(0);
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
        Schema::dropIfExists('etudes');
    }
}
