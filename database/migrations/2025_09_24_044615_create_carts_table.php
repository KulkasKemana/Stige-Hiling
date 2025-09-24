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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('destination_id');
            $table->integer('quantity')->default(1);
            $table->date('booking_date')->nullable();
            $table->enum('status', ['active', 'checked_out', 'expired'])->default('active');
            $table->decimal('price_snapshot', 10, 2)->nullable();
            $table->timestamps();
            
            // Index untuk performa
            $table->index(['user_id', 'status']);
            $table->index('destination_id');
            
            // Foreign key untuk users (tabel ini pasti sudah ada)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // TIDAK ada foreign key untuk destination_id - biarkan manual saja
            // Unique constraint untuk prevent duplicate
            $table->unique(['user_id', 'destination_id'], 'user_destination_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};