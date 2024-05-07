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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->integer('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('otp')->nullable();
            $table->datetime('otp_created_at')->nullable();
            $table->string('user_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('pin_code')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->string('landmark')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('aadhar')->nullable();
            $table->double('balance', 8, 2)->default(0);
            $table->string('status', 20);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
