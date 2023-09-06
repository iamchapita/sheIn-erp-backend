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
        Schema::create('binacles', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('actionOn')->comment('Nombre de la tabla donde se hizo la acción');
            $table->string('actionType')->comment('Tipo de Accción que se hizo');
            $table->string('user')->comment('Usuario que provocó la acción');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binacles');
    }
};
