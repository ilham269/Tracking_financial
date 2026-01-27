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
        Schema::create('uang_masuks', function (Blueprint $table) {
            $table->id();
            $table->decimal('nominal', 15, 2);
            $table->string('keterangan');
            $table->date('tanggal_uang_masuk');
            $table->foreignId('saldo_id')->constrained('saldos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uang_masuks');
    }
};
