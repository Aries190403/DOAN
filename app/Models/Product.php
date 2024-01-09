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
        'SKU',
        'name',
        'description',
        'price',
        'stock',
        'image',
        'ebook_link',
        'avatar',
        'product_type_id',
        'status'
    ];

    public function producttype()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->status = 0;
            $product->save();
        });
    }
}
