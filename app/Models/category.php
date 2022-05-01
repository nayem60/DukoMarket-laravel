<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory,Sluggable;
    protected $table="categories";
    public function subcategory(){
      return $this->hasMany(subcategory::class,'category_id');
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function product(){
      return $this->hasMany(product::class);
    }
    
}
