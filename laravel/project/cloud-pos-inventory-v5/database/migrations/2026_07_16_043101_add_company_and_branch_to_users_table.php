<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * NOTE: This migration is now a NO-OP.
 * company_id and branch_id columns are already added in:
 *   - 2026_07_07_070141_add_tenant_columns_to_users_table.php
 * Kept here only to maintain migration history integrity.
 */
return new class extends Migration
{
    public function up(): void
    {
        // company_id already added in 2026_07_07_070141_add_tenant_columns_to_users_table.php
        // branch_id already added in 2026_07_07_070141_add_tenant_columns_to_users_table.php
        // No action needed - avoids duplicate column errors
    }

    public function down(): void
    {
        // Nothing to reverse
    }
};
