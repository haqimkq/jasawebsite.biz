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
        Schema::table('invoice_domains', function (Blueprint $table) {
            $table->bigInteger('id_domain')->unsigned();
            $table->foreign('id_domain', 'fk_domains_id_domain')->references('id')->on('domains')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_domains', function (Blueprint $table) {
            $table->dropForeign('fk_domains_id_domain');
            $table->dropColumn('id_domain');
        });
    }
};
