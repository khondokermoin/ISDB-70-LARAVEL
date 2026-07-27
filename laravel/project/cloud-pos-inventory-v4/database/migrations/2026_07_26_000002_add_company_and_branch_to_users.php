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
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id')->index();
            }
            if (! Schema::hasColumn('users', 'branch_id')) {
                $table->unsignedBigInteger('branch_id')->nullable()->after('company_id')->index();
            }
        });

        // Add foreign key constraints safely (avoid duplicate FK name errors)
        if (Schema::hasTable('companies')) {
            try {
                $connection = Schema::getConnection();
                $sm = $connection->getDoctrineSchemaManager();
                $fks = $sm->listTableForeignKeys('users');
                $hasCompanyFk = false;
                foreach ($fks as $fk) {
                    $localCols = $fk->getLocalColumns();
                    if (in_array('company_id', $localCols)) {
                        $hasCompanyFk = true;
                        break;
                    }
                }

                if (! $hasCompanyFk) {
                    Schema::table('users', function (Blueprint $table) {
                        $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
                    });
                }
            } catch (\Throwable $e) {
                // If Doctrine not available or any error occurs, attempt best-effort add and ignore failures
                try {
                    Schema::table('users', function (Blueprint $table) {
                        $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
                    });
                } catch (\Throwable $e) {
                    // ignore to avoid migration failure from duplicate FK name
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'branch_id')) {
                $table->dropColumn('branch_id');
            }
            if (Schema::hasColumn('users', 'company_id')) {
                // drop foreign if exists
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                // best-effort: ignore errors
                try {
                    $table->dropForeign(['company_id']);
                } catch (\Throwable $e) {
                }
                $table->dropColumn('company_id');
            }
        });
    }
};
