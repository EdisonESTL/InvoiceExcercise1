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
        Schema::create('invoice_line_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('invoice_id');
            $table->foreignId('product_id');
            $table->foreignId('service_id');
            $table->foreignId('state_id');
            $table->decimal('unit_price', $precision = 8, $scale = 2);
            $table->decimal('total_price', $precision = 8, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_line_items');
    }
};
