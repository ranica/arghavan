<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatedevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatedevices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('ip');
            $table->string('number');
            // type: Logical = 1, Physical = 0
            $table->integer('type');
            // gate: Gate = 1, Antenna = 0
            $table->integer('gate');
            $table->boolean('state')->nullable();
            $table->integer('gategender_id')->unsigned();
            $table->integer('gatepass_id')->unsigned();
            $table->integer('zone_id')->unsigned();
            $table->integer('gatedirect_id')->unsigned();
            $table->boolean('netState')->nullable();
            $table->integer('timepass')->nullable();
            $table->integer('timeserver')->nullable();
            // $table->integer('group_id')->unsigned();
            $table->softDeletes();

            $table->foreign('gategender_id')
                    ->references('id')->on('gategenders')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('gatepass_id')
                    ->references('id')->on('gatepasses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('zone_id')
                    ->references('id')->on('zones')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('gatedirect_id')
                    ->references('id')->on('gatedirects')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            // $table->foreign('group_id')
            //         ->references('id')->on('groups')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatedevices');
    }
}
