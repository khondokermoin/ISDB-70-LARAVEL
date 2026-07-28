<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * NOTE: This migration is now a NO-OP.
 * All columns were moved to their respective create_* migrations.
 * The product_variants table is also created in its own migration.
 * Kept here only to maintain migration history integrity.
 */
return new class extends Migration
{
    public function up(): void
    {
        // All columns already exist in their respective create_* migrations.
        // product_variants table is created in 2026_07_12_061340_create_product_variants_table.php
    }

    public function down(): void
    {
        // Nothing to reverse
    }
};
