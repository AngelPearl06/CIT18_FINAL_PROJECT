<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DessertModel extends Model
{
    // you can learn more about Models in https://laravel.com/docs/12.x/eloquent

    // Define the table name associated with the model
    protected $table = 'dessertstore';  // The table name is 'desserts'

    // Specify the columns that can be mass-assigned
    protected $fillable = ['name', 'category', 'description', 'quantity', 'price'];

    // Add a new desserts item
    public static function addItem($name, $category, $description, $quantity, $price)
    {
        return self::create([
            'name' => $name,
            'category' => $category,
            'description' => $description,
            'quantity' => $quantity,
            'price' => $price,
        ]);
    }

    // Update an existing desserts item by its ID
    public static function updateItem($id, $name, $category, $description, $quantity, $price)
    {
        $item = self::find($id);  // Find the item by its ID
        if ($item) {
            $item->update([
                'name' => $name,
                'category' => $category,
                'description' => $description,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }
        return $item;  // Return the updated item, or null if not found
    }

    // Delete an desserts item by its ID
    public static function deleteItem($id)
    {
        $item = self::find($id);  // Find the item by its ID
        if ($item) {
            $item->delete();  // Delete the item
        }
        return $item;  // Return the deleted item, or null if not found
    }
}
