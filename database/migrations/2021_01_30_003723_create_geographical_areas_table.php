<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geographical_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained("cities")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geographical_areas');
    }
};
