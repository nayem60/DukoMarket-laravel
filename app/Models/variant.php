<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variant extends Model
{
    use HasFactory;
   // protected $fillable="variants";
    protected $fillable=[
      'product_id',
      'size_id',
      'color_id',
      'price',
      'quantity'
    
    ];
    
    public function product(){
      return $this->belongsTo(product::class,'product_id');
    }
    public function size(){
      return $this->belongsTo(size::class,'size_id');
    }
    public function color(){
      return $this->belongsTo(color::class,'color_id');
    }
}
