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
        Schema::create('puc_user_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('puc_type_id')->nullable();
            $table->double('puc_rate', 8, 2)->nullable();
            $table->datetime('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puc_user_rates');
    }
};
