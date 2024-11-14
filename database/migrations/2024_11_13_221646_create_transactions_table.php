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
            $table->foreignId('sender_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('receiver_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('type', ['TRANSFERT', 'DEPOT', 'RETRAIT', 'PAIEMENT', 'ACHAT_CREDIT']);
            $table->decimal('amount', 15, 2); 
            $table->enum('status', ['ENCOURS', 'ECHOUER', 'SUCCES', 'ANNULER'])->default('SUCCES'); 
            $table->timestamp('planifer_at')->nullable(); 
            $table->enum('typeDePlanification', ['JOUR', 'SEMAINE', 'MOIS'])->default('JOUR');
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
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
