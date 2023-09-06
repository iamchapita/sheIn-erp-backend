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
        Schema::table('batches', function (Blueprint $table) {
            $table->foreign('orderIdFK')->references('id')->on('orders');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customerIdFK')->references('id')->on('customers');
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('orderIdFK')->references('id')->on('orders');
        });

        Schema::table('payment_trackings', function (Blueprint $table) {
            $table->foreign('orderIdFK')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
