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
        Schema::create('invoice_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('nomor_invoice')->unique();
            $table->date('due_date');
            $table->date('bill_date');
            $table->string('nama_penerima');
            $table->string('nama_perusahaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_pelanggans');
    }
};
