<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->string('booking_code')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->date('travel_date');
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 12, 2);
            $table->string('payment_method');
            $table->string('payment_proof')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};