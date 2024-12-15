<?php

declare(strict_types=1);

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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('coin');
            $table->unsignedTinyInteger('package_count');
            $table->decimal('current_price', 16, 5);
            $table->decimal('min_threshold', 16, 5);
            $table->decimal('max_threshold', 16, 5);
            $table->decimal('quantity', 9, 5);
            $table->decimal('stock', 9, 5);
            $table->decimal('cost', 16, 5);
            $table->decimal('avg_price', 16, 5);
            $table->decimal('account', 10, 5);
            $table->decimal('fees', 10, 5);
            $table->unsignedMediumInteger('packet_price');
            $table->decimal('min_threshold_percent_value', 4, 3);
            $table->decimal('max_threshold_percent_value', 4, 3);
            $table->unsignedMediumInteger('start_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
