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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float("total_price");
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("status_id")->constrained(
                table: 'statuses'
            )->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('book_order_mtm', function (Blueprint $table) {
            $table->id();
            $table->foreignId("book_id")->constrained()->onDelete('cascade');
            $table->foreignId("order_id")->constrained()->onDelete('cascade');
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
