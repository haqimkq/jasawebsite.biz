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
        Schema::table('invoice_pelanggans', function (Blueprint $table) {
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan', 'fk_pelanggans_id_pelanggan')->references('id')->on('pelanggans')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_pelanggans', function (Blueprint $table) {
            $table->dropForeign('fk_pelanggans_id_pelanggan');
            $table->dropColumn('id_pelanggan');
        });
    }
};
