<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($producttype) {
            $producttype->status = 0;
            $producttype->save();
        });
    }
}
