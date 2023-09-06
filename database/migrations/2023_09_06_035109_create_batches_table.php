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
        Schema::create('batches', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('name', 50)->unique();
            $table->unsignedBigInteger('orderIdFK')->nullable()->comment('Llave foránea hacia el pedido');
            $table->decimal('orderChargedToCustomer', 8, 2, true)->default(0)->comment('Cobrado al Cliente por Pedido, Calculado');
            $table->decimal('paidForBatch', 8, 2, true)->default(0)->comment('Acumulados de pagado a SheIn por el Pedido');
            $table->decimal('shippingChargedToCustomer', 8, 2, true)->default(0)->comment('Acumulados de cobrado al cliente por envío, Calculado');
            $table->decimal('shippingPaid', 8, 2, true)->default(0)->comment('Acumulados de pagado a Empresa de envío');
            $table->decimal('orderPrice', 8, 2, true)->default(0)->comment('Acumulados de precios de los Pedidos (Costo Pedido), Calculado');
            $table->enum('orderType', ['Aéreo', 'Marítimo', 'Aéreo Especial'])->default('Marítimo');
            $table->date('deliveryBatch')->comment('Fecha de entrega del lote');
            $table->boolean('status')->default(false)->comment('Almacena el estado del pedido, si fue archivado o no.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
