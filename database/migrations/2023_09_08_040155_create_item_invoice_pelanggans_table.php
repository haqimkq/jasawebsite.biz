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
        Schema::create('item_invoice_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->integer('harga');
            $table->timestamps();

            $table->bigInteger('invoice_pelanggan_id')->unsigned();
            $table->foreign('invoice_pelanggan_id')->references('id')->on('invoice_pelanggans')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_invoice_pelanggans');
    }
};
