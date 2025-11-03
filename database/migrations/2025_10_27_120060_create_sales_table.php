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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('create_personal_id')->constrained('merchant_personal')->onDelete('cascade');
            $table->date('create_date');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('sale_statuses')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('merchant_id')->constrained('merchants')->onDelete('cascade')->after('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
