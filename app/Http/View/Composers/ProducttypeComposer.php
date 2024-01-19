<?php


namespace App\Http\View\Composers;
use App\Models\ProductType;
use Illuminate\View\View;

class ProducttypeComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $producttypes = ProductType::select('id', 'name')->where('status', 1)->orderByDesc('id')->get();

        $view->with('producttypes', $producttypes);
    }
}
