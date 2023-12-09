<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts'; // Đặt tên bảng tương ứng với tên bảng trong cơ sở dữ liệu của bạn

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Điều chỉnh tên cột khóa ngoại user_id nếu cần
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Điều chỉnh tên cột khóa ngoại product_id nếu cần
    }
    
}
