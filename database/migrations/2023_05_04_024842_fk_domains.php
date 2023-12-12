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
        Schema::table('domains', function (Blueprint $table) {
            $table->bigInteger('pelanggan_id')->unsigned()->nullable();
            $table->foreign('pelanggan_id', 'fk_pelanggans_pelanggan_id')->references('id')->on('pelanggans')->onUpdate('CASCADE')->onDelete('cascade')->change();
            $table->bigInteger('nameserver_id')->unsigned()->nullable();
            $table->foreign('nameserver_id', 'fk_nameservers_nameserver_id')->references('id')->on('nameservers')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropForeign('fk_pelanggans_pelanggan_id');
            $table->dropColumn('pelanggan_id');
            $table->dropForeign('fk_nameservers_nameserver_id');
            $table->dropColumn('nameserver_id');
        });
    }
};
