<?php

use PixelApp\Models\UsersModule\PixelUser as User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('hashed_id')->unique();
            $table->string('email')->unique();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("name");
            $table->string("full_name")->nullable()->comment("The name composed from 4 names for some countries Citizens");
            $table->string('password');
            $table->string('mobile', 20)->unique();
            $table->enum('user_type', User::USER_ALLOWED_TYPES)->default(User::USER_DEFAULT_TYPE);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->dateTime('accepted_at')->nullable();
            $table->foreignId("department_id")->nullable()->constrained("departments")->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('dep_role',User::DEP_TYPES)->nullable();
            $table->string('employee_id')->nullable()->comment("EMP-auto_increment_id");
            $table->enum('status', User::USER_STATUS_VALUES)->default(User::USER_DEFAULT_INIT_STATUS_VALUE);
            $table->boolean('default_user')->default(0);
            $table->foreignId("role_id")->nullable()->constrained("roles")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId("previous_role_id")->nullable()->constrained("roles")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->restrictOnDelete()->cascadeOnUpdate();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });


            Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};