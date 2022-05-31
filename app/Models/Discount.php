<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
        public function create(Request $request)
    {
        $discount = new Discount();
        $discount->name = 'Discount';
        $discount->description = "Description";
        $discount->discount = 10;

        $discount->save();

        $products = Category::find([1, 2, 3]);
        $discount->products()->attach($products);

        return 'Success';
    }

}
