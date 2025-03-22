<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('address');
            $table->string('city', 100);
            $table->string('postal_code', 20);
            $table->string('country', 100);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('shipping_addresses');
    }
};
