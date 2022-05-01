<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    public function orderItem(){
      return $this->belongsTo(orderitem::class,'orderitem_id');
    }
}
