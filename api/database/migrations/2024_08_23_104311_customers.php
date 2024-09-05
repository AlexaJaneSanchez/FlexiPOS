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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customerID'); // Primary key with auto increment
            $table->string('firstname'); // First name of the customer
            $table->string('lastname'); // Last name of the customer
            $table->string('email')->unique(); // Email address, unique constraint to avoid duplicates
            $table->string('phonenumber'); // Phone number of the customer
            $table->boolean('isactive')->default(true); // Active status of the customer
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
