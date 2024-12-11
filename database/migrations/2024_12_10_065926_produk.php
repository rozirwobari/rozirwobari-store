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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->mediumText('gambar')->default('home/assets/produk/produk.png');
            $table->integer('harga')->default(0);
            $table->integer('originalPrice')->default(0);
            $table->integer('stok')->default(0);
            $table->mediumText('category')->nullable();
            $table->mediumText('sku')->unique()->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
