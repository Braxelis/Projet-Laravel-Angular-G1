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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->enum('type', ['entrant', 'sortant']);
            $table->string('objet');
            $table->string('expediteur')->nullable();
            $table->string('destinataire')->nullable();
            $table->string('service_destinataire');
            $table->string('service_emetteur')->nullable();
            $table->date('date_reception');
            $table->enum('statut', ['recu', 'en_cours', 'traite', 'archive']);
            $table->text('commentaire')->nullable();
            $table->string('fichier_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
