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
        Schema::create('package_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();
            $table->enum('discount_type', ['monthly', 'three_months', 'semi_annual', 'yearly', 'two_years']);
            $table->decimal('discount_value');
            $table->decimal('discount_percent');
            $table->enum('discount_period_type', ['days ', 'seconds']);
            $table->decimal('discount_period');
            $table->timestamp('discount_start_date');
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
        Schema::dropIfExists('package_offers');
    }
};
