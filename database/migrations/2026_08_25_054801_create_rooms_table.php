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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // contoh: standard, deluxe, villa
            $table->decimal('price', 12, 2); // harga per malam
            $table->unsignedInteger('capacity')->default(2);
            $table->text('description')->nullable();
            $table->string('photo_url')->nullable();
            $table->boolean('is_active')->default(true); // toggle tampil/gak di landing page
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
