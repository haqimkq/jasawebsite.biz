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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->text('catatan')->nullable();
            $table->string('subject');
            $table->enum('status', ['todo', 'doing', 'done', 'deleted'])->default('todo');
            $table->dateTime('doneAt')->nullable();
            $table->boolean('isConfirm')->default(true);
            $table->string('point')->default(1);
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
        Schema::dropIfExists('todos');
    }
};
