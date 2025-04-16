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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idPenerbangan');
            $table->integer('jumlah');
            $table->decimal('totalHarga', '12', '2');
            $table->enum('status', ['menunggu dibayar', 'dibayar']);

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idPenerbangan')->references('id')->on('penerbangans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
