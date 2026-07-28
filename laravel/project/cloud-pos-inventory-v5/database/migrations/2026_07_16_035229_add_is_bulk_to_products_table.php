<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * NOTE: This migration is now a NO-OP.
     * 'is_bulk' column already exists in 2026_07_12_061309_create_products_table.php
     * Kept here only to maintain migration history integrity.
     */
    public function up(): void
    {
        // is_bulk column already added in create_products_table migration
        // Adding it again would cause "Duplicate column" error
        if (!Schema::hasColumn('products', 'is_bulk')) {
            Schema::table('products', function (Blueprint $table) {
                $table->boolean('is_bulk')->default(false)->after('name');
            });
        }
    }

    public function down(): void
    {
        // Nothing to reverse - column is managed by create_products_table migration
    }
};
