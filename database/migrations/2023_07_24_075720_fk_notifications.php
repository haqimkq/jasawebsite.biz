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
        Schema::table('notifications', function (Blueprint $table) {
            $table->bigInteger('domain_id')->unsigned();
            $table->foreign('domain_id', 'fk_domains_domain_id')->references('id')->on('domains')->onUpdate('CASCADE')->onDelete('cascade')->change();
            $table->bigInteger('notif_pelanggan')->unsigned()->nullable();
            $table->foreign('notif_pelanggan', 'fk_pelanggans_notif_pelanggan')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('fk_domains_domain_id');
            $table->dropColumn('domain_id');
            $table->dropForeign('fk_pelanggans_notif_pelanggan');
            $table->dropColumn('notif_pelanggan');
        });
    }
};
