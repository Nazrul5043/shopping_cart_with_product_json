<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        
        $json = \Illuminate\Support\Facades\Storage::get("product-list.json");

        $products = json_decode($json);

        return view('frontend.products', compact('products'));
    }

    public function product($product_id)
    {
        
        $json = \Illuminate\Support\Facades\Storage::get("product-list.json");

        $products = json_decode($json);
        foreach ($products as $item) {
            if ($item->product_id == $product_id) {
                return view('frontend.product', compact('item'));
            }
        }

    }
}
