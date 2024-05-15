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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_type')->comment('1=online, 2=manual');
            $table->integer('user_id');
            $table->integer('bank_id');
            $table->float('amount');
            $table->string('transaction_number',100);
            $table->integer('status')->comment('1 for pending, 2 for rejected and 3 for approved for manual transactions')->nullable();
            $table->integer('transaction_status')->comment('1 for pending, 2 for rejected and 3 for approved for online transactions')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
