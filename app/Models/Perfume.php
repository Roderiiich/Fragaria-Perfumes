<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory; // <-- Esta es la línea mágica

    protected $fillable = ['nombre', 'descripcion', 'imagen', 'brand_id', 'category_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('nombre', 'LIKE', "%{$term}%");
    }
}