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
        Schema::create('tasks', function (Blueprint $table) /*fungsi ini digunakan untuk membuat table tasks */ {
            $table->id();
            $table->string('name'); 
            $table->string('description')->nullable();  
            $table->boolean('is_completed')->default(false);
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps(); //ini adalah field dari table

            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};