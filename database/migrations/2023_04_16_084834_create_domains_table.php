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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('nama_domain')->unique();
            $table->string('epp_code')->nullable();
            $table->longText('keterangan_domain')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_expired');
            $table->string('hosting')->nullable();
            $table->string('perpanjangan')->default(650000);
            $table->integer('kapasitas_hosting')->nullable();
            $table->date('tanggal_hosting')->nullable();
            $table->string('lokasi_hosting')->nullable();
            $table->string('paket_website')->nullable();
            $table->integer('jumlah_email')->nullable();
            $table->string('slug');
            $table->string('hidden_epp');
            $table->string('loginUrl')->nullable();
            $table->string('loginUsername')->nullable();
            $table->string('loginPassword')->nullable();
            $table->boolean('onlyHosting')->default(false);
            $table->boolean('externalDomain')->default(false);
            $table->string('vendor')->nullable();
            $table->enum('status', ['isFollowUp', 'isPending'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
