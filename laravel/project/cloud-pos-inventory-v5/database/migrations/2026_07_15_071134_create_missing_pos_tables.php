<?php

use Illuminate\Database\Migrations\Migration;

/**
 * NOTE: This migration is now a NO-OP.
 * brands, units, taxes tables are created in their own migrations.
 * Kept here only to maintain migration history integrity.
 */
return new class extends Migration
{
    public function up(): void
    {
        // brands → created in 2026_07_12 series
        // units  → created in 2026_07_12_061324_create_units_table.php
        // taxes  → created in 2026_07_12_061329_create_taxes_table.php
    }

    public function down(): void
    {
        // Nothing to reverse
    }
};
