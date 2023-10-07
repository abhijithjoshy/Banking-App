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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ac_no');
            $table->decimal('current_balance', 10, 2)->default(0.00);
            $table->decimal('last_withdrawn_amount', 10, 2)->default(0.00);
            $table->string('last_transaction_to')->default('0');
            $table->string('last_transaction_from')->default('0');
            $table->decimal('last_transaction_amount', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
