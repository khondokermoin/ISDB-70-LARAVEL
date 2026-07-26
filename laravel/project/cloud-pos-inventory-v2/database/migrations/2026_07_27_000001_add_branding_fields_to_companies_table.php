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
        Schema::table('companies', function (Blueprint $table) {
            if (! Schema::hasColumn('companies', 'logo')) {
                $table->string('logo')->nullable()->after('zip_code');
            }

            if (! Schema::hasColumn('companies', 'favicon')) {
                $table->string('favicon')->nullable()->after('logo');
            }

            if (! Schema::hasColumn('companies', 'theme_settings')) {
                $table->json('theme_settings')->nullable()->after('favicon');
            }

            if (! Schema::hasColumn('companies', 'social_links')) {
                $table->json('social_links')->nullable()->after('theme_settings');
            }

            if (! Schema::hasColumn('companies', 'contact_info')) {
                $table->json('contact_info')->nullable()->after('social_links');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            if (Schema::hasColumn('companies', 'contact_info')) {
                $table->dropColumn('contact_info');
            }

            if (Schema::hasColumn('companies', 'social_links')) {
                $table->dropColumn('social_links');
            }

            if (Schema::hasColumn('companies', 'theme_settings')) {
                $table->dropColumn('theme_settings');
            }

            if (Schema::hasColumn('companies', 'favicon')) {
                $table->dropColumn('favicon');
            }

            if (Schema::hasColumn('companies', 'logo')) {
                $table->dropColumn('logo');
            }
        });
    }
};
