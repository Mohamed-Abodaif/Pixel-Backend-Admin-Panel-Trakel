<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = Schema::connection($this->getConnection());

        $schema->create('oauth_refresh_tokens', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->string('access_token_id', 100)->unique();
            $table->foreign('access_token_id')->references('id')->on('oauth_access_tokens')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('revoked')->default(0);
            $table->dateTime('expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $schema = Schema::connection($this->getConnection());

        $schema->dropIfExists('oauth_refresh_tokens');
    }

};
