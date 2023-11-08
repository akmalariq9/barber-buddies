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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pending', 'Confirmed', 'Canceled', 'Completed'])->default('Pending');
            $table->dateTime('reservation_datetime');
            $table->text('additional_notes')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('barber_shop_id')->constrained('barber_shops');
            $table->foreignId('service_id')->constrained('services');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
