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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();

            // Menambahkan foreign key untuk users
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            // Menambahkan foreign key untuk produk
            $table->foreign('produk_id')
                  ->references('id')
                  ->on('produk') // Menggunakan tabel 'produk' yang sudah ada
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
