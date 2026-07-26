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
        if (! Schema::hasTable('shifts')) {
            Schema::create('shifts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('branch_id');
                $table->unsignedBigInteger('opened_by');
                $table->decimal('opening_balance', 15, 2)->default(0);
                $table->decimal('closing_balance', 15, 2)->nullable();
                $table->enum('status', ['open', 'closed'])->default('open');
                $table->timestamps();

                $table->index('company_id');
                $table->index('branch_id');
                $table->index('opened_by');
            });
        } else {
            Schema::table('shifts', function (Blueprint $table) {
                if (! Schema::hasColumn('shifts', 'company_id')) {
                    $table->unsignedBigInteger('company_id')->after('id');
                }
                if (! Schema::hasColumn('shifts', 'branch_id')) {
                    $table->unsignedBigInteger('branch_id')->after('company_id');
                }
                if (! Schema::hasColumn('shifts', 'opened_by')) {
                    $table->unsignedBigInteger('opened_by')->after('branch_id');
                }
                if (! Schema::hasColumn('shifts', 'opening_balance')) {
                    $table->decimal('opening_balance', 15, 2)->default(0)->after('opened_by');
                }
                if (! Schema::hasColumn('shifts', 'closing_balance')) {
                    $table->decimal('closing_balance', 15, 2)->nullable()->after('opening_balance');
                }
                if (! Schema::hasColumn('shifts', 'status')) {
                    $table->enum('status', ['open', 'closed'])->default('open')->after('closing_balance');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
