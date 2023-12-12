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
        Schema::create('cronjob_domain', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cronjob_id');
            $table->unsignedBigInteger('domain_id')->nullable();
            $table->timestamps();

            $table->foreign('cronjob_id')->references('id')->on('cronjobs')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cronjob_domain');
    }
};
