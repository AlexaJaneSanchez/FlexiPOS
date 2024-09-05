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
        Schema::create('customer_return', function (Blueprint $table) {
            $table->id('returnID'); // Primary key with auto increment
            $table->unsignedBigInteger('customerID'); // Foreign key (unsigned big integer)
            $table->unsignedBigInteger('processedBy'); // Foreign key (unsigned big integer)
            $table->string('returnDate'); // Return date as string
            $table->string('returnStatus'); // Return status as string
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_return');
    }
};
