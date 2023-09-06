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
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->unsignedBigInteger('orderIdFK')->comment('Hace referencia a la Orden');
            $table->string('name', 50)->comment('Nombre del Artículo');
            $table->string('color', 25)->comment('Color del Artículo');
            $table->string('size', 25)->comment('Talla del Artículo');
            $table->decimal('unitaryPrice', 8, 2, true)->comment('Precio de la Unidad del Artículo');
            $table->decimal('shippingUnitary', 8, 2, true)->comment('Envío de la Unidad del Artículo');
            $table->tinyInteger('articleAmount', false, true)->comment('Cantidad de Artículo');
            $table->decimal('total', 8, 2, true)->comment('Suma de envío, Calculado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
