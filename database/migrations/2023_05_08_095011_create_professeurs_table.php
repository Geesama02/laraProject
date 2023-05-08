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
        Schema::create('professeurs', function (Blueprint $table) {
            $table->id();
            $table->integer('ppr');
            $table->string('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email',70)->unique();
            $table->string('password',60);
            $table->string('sexe');
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
        Schema::dropIfExists('professeurs');
    }
};
