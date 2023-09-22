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
        // in depth validation
        Schema::create('erad_tblIVP', function (Blueprint $table) {
            $table->id('ctrlno');
            $table->foreignId('acno')->constrained('erad_tblMain', 'acno');
            $table->date('dteassign'); // date assign
            $table->date('dtesubmit'); // date submit
            $table->string('validator');
            $table->string('recom');
            $table->string('remarks');
            $table->date('dtedefer'); // date defer
            $table->string('encoder');
            $table->timestamp('encdate')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erad_tblIVP');
    }
};
