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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            //$table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('state_id')->constrained('states');
            //$table->foreignId('state_id')->references('id')->on('states');
            $table->dateTime('invoice_date', $precision = 0) ;
            $table->decimal('total', $precision = 8, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
