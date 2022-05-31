<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description','discount'];

    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


}
