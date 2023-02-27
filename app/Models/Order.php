<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=['user_id','tracking_number','full_name','email','phone','pincode','address','status_message','payment_mode','payment_id'];
    public function order_items(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

}
