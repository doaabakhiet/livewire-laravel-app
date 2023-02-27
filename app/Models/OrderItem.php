<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table="order_items";
    protected $fillable=['order_id','product_id','color_id','price','quantity'];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function colors(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
}
