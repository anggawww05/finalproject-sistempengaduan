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
            $table->bigInteger('report_id')->index();
            $table->string('title');
            $table->text('description');
            $table->string('status');
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
//            $table->enum('status', ['Pengaduan Diterima', 'Ditugaskan ke Departemen', 'Investigasi ke Lapangan', 'Tindakan Eksekusi', 'Selesai'])->default('Pengaduan Diterima')->nullable();
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
