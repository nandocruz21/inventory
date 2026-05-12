<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'category_id',
    ];

    // Relasi balik ke Category (Many to One)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}