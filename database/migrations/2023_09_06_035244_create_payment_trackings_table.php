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
        Schema::create('payment_trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->unsignedBigInteger('orderIdFK')->comment('Llave foránea hacia el pedido');
            $table->boolean('cancelled')->default(false)->comment('Se refiere al estado del pedido, si está pendiente el pago o no');
            $table->decimal('advance', 8, 2, true)->default(0)->comment('Anticipo de Pedido');
            $table->decimal('paid', 8, 2, true)->default(0)->comment('Pagado de Pedido');
            $table->decimal('remaining', 8, 2, true)->comment('Restante por pagar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_trackings');
    }
};
