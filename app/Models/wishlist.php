<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;
    protected $table="wishlists";
    
    public function product(){
      return $this->belongsTo(product::class,'product_id');
    }
}
