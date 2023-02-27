<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'name', 'slug', 'brand', 'small_description',
        'description', 'original_price', 'selling_price',
        'quantity', 'trending', 'status', 'meta_title',
        'meta_keywords', 'meta_description', 'category_id', 'featured'
    ];
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors')->withPivot('color_quantity');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
