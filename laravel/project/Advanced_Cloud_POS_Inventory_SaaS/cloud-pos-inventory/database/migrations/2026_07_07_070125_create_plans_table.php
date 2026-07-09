<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // যেমন: Basic, Pro, Enterprise
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);           // মাসিক মূল্য
            $table->integer('trial_days')->default(14);
            $table->integer('user_limit')->default(5); // কতজন স্টাফ রাখতে পারবে
            $table->integer('branch_limit')->default(1);
            $table->json('features')->nullable();      // কোন ফিচারগুলো অন্তর্ভুক্ত
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
