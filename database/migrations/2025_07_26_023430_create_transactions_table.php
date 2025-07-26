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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users
            $table->string('title');
            $table->decimal('amount', 10, 2); // Up to 99999999.99
            $table->enum('type', ['income', 'expense']); // Pemasukan / Pengeluaran
            $table->string('category')->nullable(); // Bisa dikaitkan dengan categories table nanti
            $table->date('date');
            $table->text('notes')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
