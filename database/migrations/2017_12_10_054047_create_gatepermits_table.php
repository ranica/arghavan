<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatepermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatepermits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gatedevice_id')->unsigned();
            $table->integer('gateoperator_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('gatedevice_id')->references('id')
                ->on('gatedevices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('gateoperator_id')->references('id')
                ->on('gateoperators')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatepermits');
    }
}
