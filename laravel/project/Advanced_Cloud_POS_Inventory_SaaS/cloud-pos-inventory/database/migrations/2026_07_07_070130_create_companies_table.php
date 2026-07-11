<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            
            // --- Basic Information ---
            $table->string('name');                      // কোম্পানির নাম
            $table->string('slug')->unique()->nullable(); // URL বা Subdomain এর জন্য
            $table->string('email')->unique();           // কোম্পানির ইমেইল
            $table->string('phone')->nullable();
            $table->string('contact_person')->nullable(); // মালিক বা ম্যানেজারের নাম
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('Bangladesh');
            $table->string('zip_code')->nullable();
            $table->string('logo')->nullable();
            
            // --- SaaS & Multi-tenancy ---
            $table->string('subdomain')->unique()->nullable(); // যেমন: rfl.yourdomain.com
            $table->string('custom_domain')->nullable(); // White-labeling এর জন্য
            
            // --- POS & Inventory Core Settings ---
            $table->string('currency', 10)->default('BDT'); // ডিফল্ট কারেন্সি (POS এর জন্য খুব জরুরি)
            $table->string('timezone', 50)->default('Asia/Dhaka'); // রিপোর্ট এবং টাইমস্ট্যাম্প এর জন্য
            $table->json('settings')->nullable(); // কোম্পানি ভিত্তিক কাস্টম সেটিংস (JSON ফরম্যাটে)
            
            // --- Subscription & Status ---
            $table->enum('status', ['active', 'inactive', 'suspended', 'trial'])->default('trial');
            $table->timestamp('trial_ends_at')->nullable();
            $table->foreignId('plan_id')->nullable()->constrained('plans')->nullOnDelete(); // বর্তমান সাবস্ক্রিপশন প্ল্যান
            
            // --- Admin Owner ---
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Company Admin (Owner)
            
            $table->timestamps();
            $table->softDeletes(); // SaaS এর জন্য Soft Delete খুব জরুরি যাতে ভুলে ডাটা হারিয়ে না যায়
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};