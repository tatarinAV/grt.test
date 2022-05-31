<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;

class Product extends Model
{
    use HasFactory;

    public function create(Request $request)
    {
        $product = new Product;
        $product->name = 'God of War';
        $product->price = 40;

        $product->save();

        $discount = Discount::find([10, 20]);
        $product->discounts()->attach($discount);

        return 'Success';
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }
}
