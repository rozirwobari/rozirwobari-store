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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('id_transaksi', 250)->nullable();
            $table->integer('total')->default(0);
            $table->mediumText('snap_token')->nullable();
            $table->mediumText('reason')->nullable();
            $table->tinyInteger('status', 1)->default(0);
            $table->string('status_label', 250)->default('Pending');
            $table->string('payment', 200)->nullable();
            $table->json('data')->default('[]');
            $table->json('data_pay')->default('[]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
