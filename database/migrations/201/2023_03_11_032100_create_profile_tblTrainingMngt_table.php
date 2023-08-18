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
        //other_management_trainings
        Schema::create('profile_tblTrainingMngt', function (Blueprint $table) {
            $table->id('ctrlno');
            $table->unsignedBigInteger('personal_data_cesno');
            $table->foreign('personal_data_cesno')->references('cesno')->on('profile_tblMain')->onDelete('cascade');
            $table->unsignedBigInteger('field_specialization');
            $table->foreign('field_specialization')->references('SpeExp_Code')->on('profilelib_tblExpertiseSpec')->onDelete('cascade');
            $table->string('training');
            $table->string('training_category')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('venue')->nullable();
            $table->string('no_training_hours');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('encoder')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_tblTrainingMngt');
    }
};
