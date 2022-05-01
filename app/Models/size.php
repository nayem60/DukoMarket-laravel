<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $table="sizes";
    
    public function subcategory(){
      return $this->belongsTo(subcategory::class,'subcategory_id');
    }
}
