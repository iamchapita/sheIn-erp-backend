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
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->unsignedBigInteger('customerIdFK')->comment('Hace Referencia al cliente');
            $table->decimal('orderChargedToCustomer', 8, 2, true)->comment('Precio de Pedido, Calculado');
            $table->decimal('shippingChargedToCustomer', 8, 2, true)->comment('Envío Cobrado al Cliente, Calculado');
            $table->decimal('orderPrice', 8, 2, true)->comment('Precio del Pedido, Calculado');
            $table->boolean('orderPlaced')->default(false)->comment('Se refiere a a si el pedido fué realizado o no');
            $table->boolean('orderDelivered')->default(false)->comment('Se refiere a a si el pedido fué entregado o no');
            $table->enum('saleType', ['Contado', 'Crédito'])->default('Contado')->comment('Se refiere al tipo de venta');
            $table->boolean('wasAssigned')->default(false)->comment('Se refiere a si fue asignado a un lote o no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
