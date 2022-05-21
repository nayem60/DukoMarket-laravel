<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=['status'];
    protected $table="orders";
    
    public function orderItem()
    {
      return $this->hasMany(orderitem::class,'order_id');
    }
    public function user()
    {
      return $this->belongsTo(User::class,'user_id');
    }
    public function payment(){
      return $this->hasOne(payment_type::class,'order_id','id');
    }
    
}
