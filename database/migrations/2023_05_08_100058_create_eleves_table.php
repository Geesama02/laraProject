<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('codeMassar')->unique();
            $table->string('nom_arabe');
            $table->string('nom_francaise');
            $table->string('prenom_arabe');
            $table->string('prenom_francaise');
            $table->string('niveau_scolaire');
            $table->enum('sexe', ['mâle', 'femme']);
            $table->boolean('endecapé')->default(false);
            $table->foreignId('etablissement_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
};
