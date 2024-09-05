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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id("supplierID"); // Primary key
            $table->string('supplierName'); // Name of the category
            $table->string('productName'); // Name of the category
            $table->string('address'); // Name of the category
            $table->integer('Telephone1'); // Name of the category
            $table->integer('Telephone2'); // Name of the category
            $table->boolean('isactive')->default(true); // Optional description of the category
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
