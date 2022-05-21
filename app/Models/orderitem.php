<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    use HasFactory;
    protected $fillable=['rstatus'];
    protected $table="orderitems";
    
    public function product(){
      return $this->belongsTo(product::class,'product_id');
    }
    public function order(){
      return $this->belongsTo(order::class,'order_id');
    }
    public function review (){
      return $this->hasOne(review::class,'orderitem_id','id');
    }
    public function variant(){
      return $this->belongsTo(variant::class,'variant_id');
    }
    
}
