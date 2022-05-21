<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;
    protected $table="subsubcategories";
    public function category (){
      return $this->belongsTo(category::class,'category_id');
    }
    public function subcategory (){
      return $this->belongsTo(subcategory::class,'subcategory_id');
    }
}
