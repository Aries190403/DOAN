<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'quantity',
        'unit_price',
        'unit_price',
        'invoice_id',
        'product_id',
        'combo_id',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
