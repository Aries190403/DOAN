<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'SKU',
        'name',
        'description',
        'price',
        'stock',
        'image',
        'ebook_link',
        'product_type_id'
    ];

    public function producttype()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
