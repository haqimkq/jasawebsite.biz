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
        Schema::create('label_domain_todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('label_domain_id');
            $table->unsignedBigInteger('todo_id')->nullable();
            $table->timestamps();

            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');
            $table->foreign('label_domain_id')->references('id')->on('label_domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('label_domain_todos');
    }
};
