<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','price'];
    use HasFactory;

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }


}
