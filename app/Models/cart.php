<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    //protected $table="carts";
    protected $fillable=["user_id","product_id","variant_id","quantity"];
    
    public function product(){
      return $this->belongsTo(product::class,'product_id');
    }
    public function variant(){
      return $this->belongsTo(variant::class,'variant_id');
    }
    
    public function get_total(){
      return 10+10;
    }
    
    
}
