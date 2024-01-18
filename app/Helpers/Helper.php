<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper {
    public static function producttypes($producttypes) :string
    {
        $html = '';
        foreach ($producttypes as $key => $producttype) {
                $html .= '
                    <li>
                        <a href="/producttype/' . $producttype->id . '-' . Str::slug($producttype->name, '-') . '.html">
                            ' . $producttype->name . '
                        </a>';

                unset($producttypes[$key]);

                $html .= '</li>';
        }

        return $html;
    }
}
