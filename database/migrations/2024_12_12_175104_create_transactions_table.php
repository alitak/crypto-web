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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('coin');
            $table->string('event');
            $table->decimal('price', 10, 3);
            $table->decimal('average', 10, 3);
            $table->decimal('stock', 9, 5);
            $table->decimal('cost', 7, 3);
            $table->decimal('min_threshold', 10, 3);
            $table->decimal('max_threshold', 10, 3);
            $table->unsignedTinyInteger('package_count');
            $table->decimal('account', 7, 3);
            $table->decimal('total', 7, 3)->nullable();
            $table->decimal('quantity', 7, 3)->nullable();
            $table->timestamp('happened_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
