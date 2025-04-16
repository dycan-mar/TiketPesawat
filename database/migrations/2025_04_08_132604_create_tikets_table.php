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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->unsignedBigInteger('idPenerbangan');
            $table->unsignedBigInteger('idUser')->nullable();
            $table->enum('status', ['tersedia', 'dipesan', 'dibayar'])->default('tersedia');
            $table->unsignedBigInteger('id_booking')->nullable();

            $table->foreign('idPenerbangan')->references('id')->on('penerbangans')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_booking')->references('id')->on('bookings')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
