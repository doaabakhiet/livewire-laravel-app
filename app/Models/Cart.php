<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $fillable=['quantity','user_id','product_id','color_id'];

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function colors(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
}
