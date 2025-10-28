<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id(); // big integer unsigned
            $table->string('name');
            $table->text('description');
            $table->bigInteger('price');
            $table->string('duration');
            $table->string('location');
            $table->string('image');
            $table->decimal('rating', 2, 1);
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
