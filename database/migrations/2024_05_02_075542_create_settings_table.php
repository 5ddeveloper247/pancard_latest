<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->string('website_title')->nullable();
            $table->double('retailer_rate', 8, 2)->nullable();
            $table->double('distributor_rate', 8, 2)->nullable();
            $table->double('super_distributor_rate', 8, 2)->nullable();
            $table->double('api_rate', 8, 2)->nullable();
            $table->string('helpline_email')->nullable();
            $table->string('helpline_phone', 20)->nullable();
            $table->integer('state')->nullable();
            $table->integer('puc_type')->nullable();
            $table->integer('disable_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
