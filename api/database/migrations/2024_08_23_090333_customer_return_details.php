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
        Schema::create('customer_return_details', function (Blueprint $table) {
            $table->id('returnDetailID'); // Primary key with auto increment
            $table->unsignedBigInteger('returnID'); // Foreign key (unsigned big integer)
            $table->unsignedBigInteger('productID'); // Foreign key (unsigned big integer)
            $table->string('quantityReturned'); // Quantity of the product returned
            $table->string('unitPrice'); // Unit price of the product returned
            $table->string('refundAmount'); // Refund amount for the return
            $table->string('returnDetails'); // Additional details about the return
            $table->string('returnStatus'); // Status of the return
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_return_details');
    }
};
