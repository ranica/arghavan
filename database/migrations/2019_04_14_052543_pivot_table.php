<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /**
         * Migrate GroupPermit_Role
         */
        Schema::create('group_permit_role', function (Blueprint $table) {
            $table->unsignedInteger('group_permit_id');
            $table->unsignedInteger('role_id');
            $table->softDeletes();

            $table->foreign('group_permit_id')
                    ->references('id')
                    ->on('group_permits')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['group_permit_id', 'role_id']);
        });

        /**
         * Migrate GroupPermit and User
         */
        Schema::create('group_permit_user', function (Blueprint $table) {
            $table->unsignedInteger('group_permit_id');
            $table->unsignedInteger('user_id');
            $table->softDeletes();

            $table->foreign('group_permit_id')
                    ->references('id')
                    ->on('group_permits')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['group_permit_id', 'user_id']);
        });

         /**
         * Migrate card_user
         */
        Schema::create('card_user', function (Blueprint $table) {
            $table->unsignedInteger('card_id');
            $table->unsignedInteger('user_id');
            $table->softDeletes();

            $table->foreign('card_id')
                    ->references('id')
                    ->on('cards')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['card_id', 'user_id']);
        });

         /**
         * Migrate car to user
         */
        Schema::create('car_user', function (Blueprint $table) {
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('user_id');
            $table->softDeletes();

            $table->foreign('car_id')
                    ->references('id')
                    ->on('cars')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['car_id', 'user_id']);
        });

        /* *
        * Migrate Gatedevice to gateoption
        */
         Schema::create('gatedevice_gateoption', function (Blueprint $table) {
            $table->unsignedInteger('gatedevice_id');
            $table->unsignedInteger('gateoption_id');

            $table->foreign('gatedevice_id')
                    ->references('id')
                    ->on('gatedevices')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('gateoption_id')
                    ->references('id')
                    ->on('gateoptions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['gatedevice_id', 'gateoption_id']);
        });
         /**
         * Migrate gatedevice to gateoption
         */
        Schema::create('gatedevice_gateoperator', function (Blueprint $table) {
            $table->unsignedInteger('gatedevice_id');
            $table->unsignedInteger('gateoperator_id');

            $table->foreign('gatedevice_id')
                    ->references('id')
                    ->on('gatedevices')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('gateoperator_id')
                    ->references('id')
                    ->on('gateoperators')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['gatedevice_id', 'gateoperator_id']);
        });

        /**
         * Migrate term to user
         */
        Schema::create('term_user', function (Blueprint $table) {
            $table->unsignedInteger('term_id');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('term_id')
                    ->references('id')
                    ->on('terms')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['user_id', 'term_id']);
        });

         /**
         * Migrate term to user
         */
        Schema::create('material_room', function (Blueprint $table) {
            $table->unsignedInteger('material_id');
            $table->unsignedInteger('room_id');

            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->primary(['material_id', 'room_id']);
        });


    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_permit_role');
        Schema::dropIfExists('group_permit_user');
        Schema::dropIfExists('card_user');
        Schema::dropIfExists('car_user');
        Schema::dropIfExists('gatedevice_gateoption');
        Schema::dropIfExists('gatedevice_gateoperator');
        Schema::dropIfExists('term_user');
        Schema::dropIfExists('material_room');
        Schema::dropIfExists('dormitory_manager');
    }
}
