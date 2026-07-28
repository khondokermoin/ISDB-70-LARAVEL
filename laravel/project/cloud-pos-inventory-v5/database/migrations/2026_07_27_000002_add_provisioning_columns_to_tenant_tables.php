<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * NOTE: This migration is now a NO-OP.
 * All columns for global_units, global_taxes, and customers tables
 * are already defined in their respective create_* migrations:
 *   - 2026_07_09_143302_create_global_units_table.php
 *   - 2026_07_09_143309_create_global_taxes_table.php
 *   - 2026_07_12_061390_create_customers_table.php
 * Kept here only to maintain migration history integrity.
 */
return new class extends Migration
{
    public function up(): void
    {
        // global_units columns already in create_global_units_table migration
        // global_taxes columns already in create_global_taxes_table migration
        // customers columns already in create_customers_table migration
        // No action needed - avoids duplicate column errors
    }

    public function down(): void
    {
        // Nothing to reverse
    }
};
