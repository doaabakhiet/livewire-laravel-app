<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table="user_details";
    protected $fillable=['user_id','phone','pincode','address'];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
