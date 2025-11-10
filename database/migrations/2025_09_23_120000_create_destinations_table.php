<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description'); 
            $table->unsignedBigInteger('price');
            $table->string('duration', 50);
            $table->string('location', 100);
            $table->string('image')->nullable();
            $table->decimal('rating', 3, 1)->default(0.0);
            $table->string('category', 50);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
