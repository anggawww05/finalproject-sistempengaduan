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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pengaduan Diterima', 'Ditugaskan ke Departemen', 'Investigasi ke Lapangan', 'Tindakan Eksekusi', 'Selesai'])->default('Pengaduan Diterima')->nullable();
            $table->text('additional')->nullable();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->foreignId('report_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelines');
    }
};
