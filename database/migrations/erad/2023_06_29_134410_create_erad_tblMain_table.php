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
        Schema::create('erad_tblMain', function (Blueprint $table) {
            $table->id('acno');
            $table->integer('acbatchno')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('position')->nullable();
            $table->string('position_remarks')->nullable();
            $table->string('department')->nullable();
            $table->string('office')->nullable();
            $table->string('c_status')->nullable();
            $table->date('c_date')->nullable();
            $table->string('c_resno')->nullable();
            $table->date('we_date')->nullable();
            $table->string('wlocation')->nullable();
            $table->string('werating')->nullable();
            $table->string('we_remarks')->nullable();
            $table->string('encoder')->nullable();
            $table->date('e_date')->nullable();
            $table->string('picture')->nullable();
            $table->integer('contactno')->nullable();
            $table->integer('faxno')->nullable();
            $table->integer('mobileno')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('emailadd')->nullable();
            $table->integer('cesno')->nullable();
            $table->string('maddress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erad_tblMain');
    }
};
