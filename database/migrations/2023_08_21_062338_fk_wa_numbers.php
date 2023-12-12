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
        Schema::table('wa_numbers', function (Blueprint $table) {
            $table->bigInteger('whatsapp_id')->unsigned();
            $table->foreign('whatsapp_id', 'fk_whatsapps_whatsapp_id')->references('id')->on('whatsapps')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wa_numbers', function (Blueprint $table) {
            $table->dropForeign('fk_whatsapps_whatsapp_id');
            $table->dropColumn('whatsapp_id');
        });
    }
};
