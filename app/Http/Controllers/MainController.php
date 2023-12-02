<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    protected function fixImage(Product $p)
    {
        if ($p->image && Storage::disk('public')->exists($p->image)) {
            $p->image = Storage::url($p->image);
        } else {
            $p->image = '/image/No-Image-Placeholder.svg (1).png';
        }
    }

    public function index()
    {
        $lst = Product::all();
        foreach ($lst as $p) {
            $this->fixImage($p);
        }
        return view('home', [
            'title' => 'Home', 'lst' => $lst
        ]);
    }
}
