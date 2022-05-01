<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="products";
    
    public function variant(){
      return $this->hasMany(variant::class,'product_id');
    }
    public function subcategory(){
      return $this->belongsTo(subcategory::class,'subcategory_id');
    
      
    }
    
    public function orderitem(){
      return $this->hasMany(orderitem::class)->with('order','review');
    }
    
    
    public function subcategoryChild(){
      return $this->belongsTo(subsubcategory::class,'subcategory_child_id','id');
      
    }
    
    
    
}
