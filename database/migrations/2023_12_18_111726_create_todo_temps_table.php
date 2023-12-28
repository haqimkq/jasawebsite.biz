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
        Schema::create('todo_temps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->text('catatan')->nullable();
            $table->string('subject');
            $table->enum('status', ['pending', 'submit'])->default('pending');
            $table->unsignedBigInteger('todoFrom')->nullable();
            $table->foreign('todoFrom')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_temps');
    }
};
