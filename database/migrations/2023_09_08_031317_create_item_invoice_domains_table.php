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
        Schema::create('item_invoice_domains', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->integer('quantity');
            $table->integer('harga');
            $table->timestamps();

            $table->bigInteger('invoice_domain_id')->unsigned();
            $table->foreign('invoice_domain_id')->references('id')->on('invoice_domains')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_invoice_domains');
    }
};
