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
        Schema::create('validation_hrs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cesno')->nullable();
            $table->string('vd_vhr_ces_we')->nullable();
            $table->string('tov_vhr_ces_we')->nullable();
            $table->string('r_vhr_ces_we')->nullable();
            $table->string('encoder')->nullable();
            $table->string('last_updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validation_hrs');
    }
};
