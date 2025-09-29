<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->integer('price'); // Harga per item
            $table->integer('total_price'); // price * quantity
            $table->date('booking_date')->nullable();
            $table->enum('status', ['active', 'checked_out', 'expired'])->default('active');
            $table->timestamps();
            
            // Index untuk performa
            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};