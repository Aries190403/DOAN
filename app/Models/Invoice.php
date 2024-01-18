<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'invoice_date',
        'address',
        'phone',
        'total',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invoicedetail()
    {
        return $this->belongsTo(InvoiceDetail::class, 'invoice_id');
    }
}

