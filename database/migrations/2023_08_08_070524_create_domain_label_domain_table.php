<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('domain_label_domain', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('label_domain_id');
            $table->unsignedBigInteger('sub_label_domain_id')->nullable();
            $table->timestamps();

            $table->foreign('sub_label_domain_id')->references('id')->on('sub_label_domains');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('label_domain_id')->references('id')->on('label_domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_label_domain');
    }
};
