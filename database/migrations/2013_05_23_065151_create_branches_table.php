<?php

use PixelApp\Models\SystemConfigurationModels\Branch;
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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('branches')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('type' , Branch::TYPE)->default(Branch::DEFAULT_TYPE);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('branches');
    }
};
