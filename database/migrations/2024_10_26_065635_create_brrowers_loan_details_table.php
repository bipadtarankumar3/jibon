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
        Schema::create('brrowers_loan_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('loan_type_id');
            $table->string('principle_amount')->nullable();
            $table->string('loan_terms')->nullable();
            $table->string('days')->nullable();
            $table->string('interest')->nullable();
            $table->string('amortization')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brrowers_loan_details');
    }
};
