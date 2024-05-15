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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_type')->comment('1=UPI, 2=Bank Account');
            $table->string('bank_name',100)->nullable();
            $table->string('holder_name',100);
            $table->string('account_number',20)->nullable();
            $table->string('ifsc_code',20)->nullable();
            $table->string('upi_id',20)->nullable();
            $table->smallInteger('enable')->default('1')->comment('1=enabled, 0 = disabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
