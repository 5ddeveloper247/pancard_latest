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
        Schema::create('puc', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('puc_type_id')->nullable();
            $table->double('puc_type_rate', 8, 2)->nullable();
            $table->double('puc_challan_rate', 8, 2)->nullable();
            $table->double('puc_charges', 8, 2)->nullable();
            $table->string('registration_number', 100)->nullable();
            $table->string('model', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('vehicle_image')->nullable();
            $table->integer('challan')->nullable();
            $table->string('chasis_number', 20)->nullable();
            $table->string('engine_number')->nullable();
            $table->string('challan_image')->nullable();
            $table->string('certificate_pdf')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->smallInteger('status')->nullable()->comment('1=>pending, 2=>approved, 3=>reject, 4=>completed');
            $table->smallInteger('file_view_flag')->nullable()->comment('0=>Un-Read, 1=>Read')->default(0);
            $table->smallInteger('share_view_flag')->nullable()->comment('0=>Un-Read, 1=>Read')->default(0);
            $table->smallInteger('download_view_flag')->nullable()->comment('0=>Un-Read, 1=>Read')->default(0);
            $table->string('rejection_reason')->nullable();
            $table->date('date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puc');
    }
};
