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
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id', 'fk_users_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('cascade')->change();
            $table->bigInteger('label_id')->unsigned()->nullable();
            $table->foreign('label_id', 'fk_labels_label_id')->references('id')->on('labels')->onUpdate('CASCADE')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->dropForeign('fk_users_user_id');
            $table->dropColumn('user_id');
            $table->dropForeign('fk_labels_label_id');
            $table->dropColumn('label_id');
        });
    }
};
