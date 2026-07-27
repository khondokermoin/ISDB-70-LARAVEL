<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('global_units', function (Blueprint $table) {
            if (! Schema::hasColumn('global_units', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
            }
            if (! Schema::hasColumn('global_units', 'name')) {
                $table->string('name')->nullable()->after('company_id');
            }
            if (! Schema::hasColumn('global_units', 'short_code')) {
                $table->string('short_code')->nullable()->after('name');
            }
            if (! Schema::hasColumn('global_units', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('short_code');
            }
        });

        Schema::table('global_taxes', function (Blueprint $table) {
            if (! Schema::hasColumn('global_taxes', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
            }
            if (! Schema::hasColumn('global_taxes', 'name')) {
                $table->string('name')->nullable()->after('company_id');
            }
            if (! Schema::hasColumn('global_taxes', 'rate')) {
                $table->decimal('rate', 8, 2)->default(0)->after('name');
            }
            if (! Schema::hasColumn('global_taxes', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('rate');
            }
        });

        Schema::table('customers', function (Blueprint $table) {
            if (! Schema::hasColumn('customers', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
            }
            if (! Schema::hasColumn('customers', 'name')) {
                $table->string('name')->nullable()->after('company_id');
            }
            if (! Schema::hasColumn('customers', 'phone')) {
                $table->string('phone')->nullable()->after('name');
            }
            if (! Schema::hasColumn('customers', 'email')) {
                $table->string('email')->nullable()->after('phone');
            }
            if (! Schema::hasColumn('customers', 'is_walk_in')) {
                $table->boolean('is_walk_in')->default(false)->after('email');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'is_walk_in')) {
                $table->dropColumn('is_walk_in');
            }
            if (Schema::hasColumn('customers', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('customers', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('customers', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('customers', 'company_id')) {
                $table->dropColumn('company_id');
            }
        });

        Schema::table('global_taxes', function (Blueprint $table) {
            if (Schema::hasColumn('global_taxes', 'is_active')) {
                $table->dropColumn('is_active');
            }
            if (Schema::hasColumn('global_taxes', 'rate')) {
                $table->dropColumn('rate');
            }
            if (Schema::hasColumn('global_taxes', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('global_taxes', 'company_id')) {
                $table->dropColumn('company_id');
            }
        });

        Schema::table('global_units', function (Blueprint $table) {
            if (Schema::hasColumn('global_units', 'is_active')) {
                $table->dropColumn('is_active');
            }
            if (Schema::hasColumn('global_units', 'short_code')) {
                $table->dropColumn('short_code');
            }
            if (Schema::hasColumn('global_units', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('global_units', 'company_id')) {
                $table->dropColumn('company_id');
            }
        });
    }
};
