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
            $table->integer('group_permit_id')->unsigned();
            $table->integer('role_id')->unsigned();
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
            $table->integer('group_permit_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
            $table->integer('card_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
         * Migrate Car _ user
         */
        Schema::create('car_user', function (Blueprint $table) {
            $table->integer('car_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
            $table->integer('gatedevice_id')->unsigned();
            $table->integer('gateoption_id')->unsigned();

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
            $table->integer('gatedevice_id')->unsigned();
            $table->integer('gateoperator_id')->unsigned();
            $table->foreign('gatedevice_id')->references('id')
                ->on('gatedevices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('gateoperator_id')->references('id')
                ->on('gateoperators')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['gatedevice_id', 'gateoperator_id']);
        });

         Schema::create('term_user', function (Blueprint $table) {
            $table->integer('term_id')->unsigned();
            $table->integer('user_id')->unsigned();

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

    }
}
