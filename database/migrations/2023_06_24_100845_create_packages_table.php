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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();

            $table->unsignedInteger('users_no')->nullable();
            $table->unsignedInteger('fire_sys_list_no')->nullable();
            $table->unsignedInteger('logs_no')->nullable();
            $table->unsignedInteger('maintenance_no')->nullable();
            $table->unsignedInteger('attachments_size')->nullable();

            $table->unsignedInteger('free_subscrip_period')->nullable();
            $table->unsignedInteger('grace_period')->nullable();

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
        Schema::dropIfExists('packages');
    }
};
