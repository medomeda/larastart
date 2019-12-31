<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('abreviation', 100);
            $table->text('description')->nullable();
            $table->string('typeparam', 255);
            $table->boolean('estCalcule')->default(false);
            $table->string('formule', 255)->nullable();
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
        Schema::dropIfExists('ratios');
    }
}
