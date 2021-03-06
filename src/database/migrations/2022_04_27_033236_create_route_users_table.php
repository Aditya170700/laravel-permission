<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_user', function (Blueprint $table) {
            if (config('laravel-permission.use-uuid')) {
                $table->uuid('route_id');
                $table->uuid('user_id');
            } else {
                $table->unsignedBigInteger('route_id');
                $table->unsignedBigInteger('user_id');
            }

            $table->foreign('route_id')->references('id')->on('routes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_user');
    }
};
