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
        Schema::create('tenant_default_admins', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("first_name");
            $table->string("last_name");
            $table->string('email');
            $table->string('password');
            $table->string('mobile', 20);
            $table->foreignId("nationality_id")->constrained("countries")->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->foreignId("company_id")->constrained("tenant_companies")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('tenant_default_admins');
    }
};