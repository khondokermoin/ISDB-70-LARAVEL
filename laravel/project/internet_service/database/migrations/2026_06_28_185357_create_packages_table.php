<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            // আপনার SQL অনুযায়ী কলামগুলো তৈরি করা হচ্ছে
            $table->integer('package_id')->primary(); // প্রাইমারি কি হিসেবে package_id
            $table->string('name', 255);
            $table->string('type', 50)->default('home');
            $table->string('features', 255)->nullable();
            $table->float('speed_mbps')->nullable();
            $table->integer('quota_gb')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('duration_days')->nullable();
            $table->string('status', 50)->nullable();
            // যেহেতু আপনার SQL-এ created_at/updated_at ছিল না, তাই আমরা এটি যোগ করলাম না
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
