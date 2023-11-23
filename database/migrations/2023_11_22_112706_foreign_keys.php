<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Khóa ngoại từ sản phẩm đến loại sản phẩm
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('product_type_id')->constrained('product_types');
        });

        //Khóa ngoại từ bảng hóa đơn đến user
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
        });

        //Khóa ngoại từ bảng chi tết hóa đơn đến hóa đơn, sản phẩm, combo
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreignId('invoice_id')->constrained('invoices');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('combo_id')->constrained('combos');
        });

        //Khóa ngoại từ bảng chi tiết combo đến combo
        Schema::table('combo_details', function (Blueprint $table) {
            $table->foreignId('combo_id')->constrained('combos');
            $table->foreignId('product_id')->constrained('products');
        });

        //Khóa ngoại bảng comment đến user, sản phẩm
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
        });

        //Khóa ngoại từ bảng giỏ hàng đến user, sản phâmr, combo
        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('combo_id')->constrained('combos');
        });

        //Khóa ngoại bảng hình ảnh sản phẩm
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
