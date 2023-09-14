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
        Schema::create('plantilla_tblPlanAppointees', function (Blueprint $table) {
            $table->id('appointee_id');
            $table->foreignId('plantilla_id')->constrained('plantilla_tblPlanPositions', 'plantilla_id');
            $table->foreignId('cesno')->constrained('profile_tblMain', 'cesno');
            $table->foreignId('appt_stat_code')->constrained('plantillalib_tblApptStatus', 'appt_stat_code');
            $table->string('appt_date')->nullable();
            $table->string('assum_date')->nullable();
            $table->string('is_appointee')->nullable();
            $table->string('ofc_stat_code')->nullable();
            $table->string('basis')->nullable();
            $table->string('encoder')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantilla_tblPlanAppointees');
    }
};