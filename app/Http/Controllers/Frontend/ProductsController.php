<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.pages.product.index')->with('products', $products);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
          return view('frontend.pages.product.show', compact('product'));
        } else {
          session()->flash('error', 'No product found!');
          return redirect()->route('products.index');
        }
        return view('pages.product.index')->with('products', $products);
    }
}
