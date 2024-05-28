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
            $table->smallInteger('type')->comment('1=>credit, 2=>debit')->nullable();
            $table->smallInteger('transaction_type')->comment('1=>online, 2=>manual')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('puc_id')->nullable();
            $table->float('amount')->nullable();
            $table->string('transaction_number',100)->nullable();
            $table->string('transaction_remarks',100)->nullable();
            $table->integer('status')->comment('1=>pending, 2=>rejected, 3=>approved, manual transactions')->nullable();
            $table->integer('transaction_status')->comment('1=>pending, 2=>failed, 3=>completed, online transactions')->nullable();
            $table->text('transaction_checksum')->nullable();
            $table->longText('transaction_response')->nullable();
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
