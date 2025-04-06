<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function desserts()
    {
        return $this->hasMany(Dessert::class);
    }
}
