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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productID');
            $table->string('productcategory');
            $table->string('productname');
            $table->string('brandname');
            $table->decimal('wholesaleunit', 15, 2);  // Decimal with precision and scale for money
            $table->decimal('retailunit', 15, 2);     // Decimal with precision and scale for money
            $table->integer('retailqtyperwholesaleunit');
            $table->integer('reorderpoint');
            $table->decimal('markup', 5, 2);  // Assuming markup is a percentage, e.g., 10.00%
            $table->boolean('isactive')->default(true);
            $table->integer('quantityonhand');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
