<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add status/slug/is_active to business_types and business_type_id FK to companies.
     *
     * NOTE:
     * - 'slug' already exists in create_business_types_table migration → skip
     * - 'is_active' already exists in create_business_types_table migration → skip
     * - 'business_type_id' already exists in create_companies_table migration → skip
     * Only 'status' column on business_types is truly new here.
     */
    public function up(): void
    {
        // Add 'status' to business_types if not already present
        Schema::table('business_types', function (Blueprint $table) {
            if (! Schema::hasColumn('business_types', 'status')) {
                $table->string('status')->default('active')->after('name');
            }

            // 'slug' already exists in create_business_types_table - skip
            // 'is_active' already exists in create_business_types_table - skip
        });

        // 'business_type_id' already exists in create_companies_table - skip
        // Adding it again would cause "Duplicate column name" error
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_types', function (Blueprint $table) {
            if (Schema::hasColumn('business_types', 'status')) {
                $table->dropColumn('status');
            }
        });

        // Do NOT drop business_type_id from companies - it belongs to create_companies_table
    }
};
