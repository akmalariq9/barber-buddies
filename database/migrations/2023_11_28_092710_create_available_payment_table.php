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
        Schema::create('available_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barber_shop_id')->constrained('barber_shops');
            $table->string('payment_method');
            $table->string('account_number'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_payment');
    }
};
