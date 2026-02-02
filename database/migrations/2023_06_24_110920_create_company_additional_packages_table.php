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
        Schema::create('company_additional_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_package_id')->constrained('company_packages')->cascadeOnDelete();
            $table->enum('additional_type', ['invoices ', 'employees', 'clients', 'vendors', 'inventories', 'products', 'treasueries', 'assets', 'quotations', 'banks_accounts', 'purhase_order', 'attachments']);
            $table->unsignedTinyInteger('additional_no');
            $table->decimal('additional_price');
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
        Schema::dropIfExists('company_additional_packages');
    }
};
