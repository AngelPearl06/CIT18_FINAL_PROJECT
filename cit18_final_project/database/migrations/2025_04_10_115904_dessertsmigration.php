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
        // You can check more column types in the documentation of Laravel
        // https://laravel.com/docs/12.x/migrations#columns

        Schema::create('dessertstore', function (Blueprint $table) {
            $table->id();                            // Primary key (auto-increment)
            $table->string('name');                   // Item name
            $table->enum('category', ['Cakes', 'Pies', 'Cookies', 'Breads']); // Dropdown for category
            $table->text('description')->nullable();  // Description of the item (nullable)
            $table->integer('quantity');              // Quantity in stock
            $table->decimal('price', 8, 2);           // Price per item
            $table->timestamps();                    // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void

    {
 
        Schema::dropIfExists('dessertstore');  // Drops the desserts table if it exists
 
    } 
};
