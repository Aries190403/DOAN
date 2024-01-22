<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainAdminController extends Controller
{
    public function index() {
        $totalInvoices = DB::table('invoices')->where('status', 3)->count();
        $totalProducts = DB::table('products')->where('status', 1)->count();
        $totalUsers = DB::table('users')->where('status', 1)->count();
        $allComments = DB::table('comments')->where('deleted_at', NULL)->count();

        return view('admin.home', [
            'title' => 'Admin Manager Page',
            'totalInvoices' => $totalInvoices,
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
            'totalComments' => $allComments,
        ]);
    }
}
