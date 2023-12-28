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
        Schema::create('todo_file_todo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todo_id');
            $table->unsignedBigInteger('file_todo_id');
            $table->timestamps();

            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');
            $table->foreign('file_todo_id')->references('id')->on('file_todos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_file_todo');
    }
};
