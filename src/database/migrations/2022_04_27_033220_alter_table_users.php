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
        // Drop id if using uuid
        Schema::table('users', function (Blueprint $table) {
            if (config('laravel-permission.use-uuid')) {
                $table->dropColumn(['id']);
            }
        });

        // Create column id if using uuid
        Schema::table('users', function (Blueprint $table) {
            if (config('laravel-permission.use-uuid')) {
                $table->uuid('id')->primary();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
