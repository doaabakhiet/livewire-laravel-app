<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table="colors";
    protected $fillable=['name','code','status'];
    public function products(){
        return $this->belongsToMany(Product::class,'product_colors')->withPivot('color_quantity');
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
