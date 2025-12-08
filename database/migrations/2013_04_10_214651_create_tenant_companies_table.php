<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PixelApp\Models\CompanyModule\TenantCompany;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_companies', function (Blueprint $table) {
            $table->id();
            $table->string("hashed_id");
            $table->string('company_id')->nullable();
            $table->string('name')->index();
            $table->string('name_shortcut')->index();
            $table->string('abbreviation')->nullable();
            $table->string('mobile' , 20)->index();
            $table->string('domain')->nullable()->unique();
            $table->string('sector');
            $table->string('address')->nullable();
            $table->string('logo')->nullable() ;
            $table->foreignId("country_id")->constrained("countries")->cascadeOnUpdate();
            $table->enum('status', TenantCompany::REGISTRATIONS_STATUSES )->default(TenantCompany::REGISTRATIONS_DEFAULT_STATUS);
            $table->enum('account_type', TenantCompany::CompanyAccountAllowedTypes  )->default(TenantCompany::CompanyAccountDefaultType );
            $table->string('cr_no')->nullable()->unique();
            $table->string('employees_no');
            $table->string('branches_no')->nullable();
            $table->enum('package_status', ['Basic', 'Upgraded-no-Due', 'Upgraded-in-Due', 'Upgraded-over-Due'])->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->json('data')->nullable();
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
        Schema::dropIfExists('tenant_companies');
    }
};