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
        Schema::table('business_types', function (Blueprint $table) {
            if (! Schema::hasColumn('business_types', 'status')) {
                $table->string('status')->default('active')->after('name');
            }

            if (! Schema::hasColumn('business_types', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('name');
            }

            if (! Schema::hasColumn('business_types', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('slug');
            }
        });

        Schema::table('companies', function (Blueprint $table) {
            if (! Schema::hasColumn('companies', 'business_type_id')) {
                $table->foreignId('business_type_id')->nullable()->after('user_id')->constrained('business_types')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            if (Schema::hasColumn('companies', 'business_type_id')) {
                $table->dropForeign(['business_type_id']);
                $table->dropColumn('business_type_id');
            }
        });

        Schema::table('business_types', function (Blueprint $table) {
            if (Schema::hasColumn('business_types', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
