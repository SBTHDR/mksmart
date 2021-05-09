<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
      $products = Product::orderBy('id', 'desc')->paginate(2);
        return view('frontend.pages.index', compact('products'));
    }

    public function search(Request $request)
    {
      $search = $request->search;
      $products = Product::orWhere('title', 'like', '%' . $search . '%')->
      orWhere('description', 'like', '%' . $search . '%')->
      orderBy('id', 'desc')->paginate(5);
        return view('frontend.pages.product.search', compact('search', 'products'));
    }
}
