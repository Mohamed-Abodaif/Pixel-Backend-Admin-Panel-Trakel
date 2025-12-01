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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->nullable()->unique();
            $table->string('symbol')->nullable();
            $table->string('symbol_native')->nullable();
            $table->tinyInteger('decimal_digits')->nullable();// converting type from string to tiny integer
            $table->boolean('rounding')->nullable()->default(0); // converting type from string to boolean 
            $table->string('name_plural')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_main')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};