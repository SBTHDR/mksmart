<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;


class ProductController extends Controller
{
//    public function index()
//    {
//        $products = Product::orderBy('id', 'desc')->get();
//
//        return view('admin.pages.index', compact('products'));
//    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('backend.pages.product.index')->with('products', $products);
    }

    public function create()
    {
        return view('backend.pages.product.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.pages.product.edit')->with('product', $product);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->slug = Str::slug($request->title);

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;

        $product->save();

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/products/' . $img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }

        session()->flash('success', 'Successfully Created a Product!');
        return redirect()->route('admin.product.create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

//        $product->slug = Str::slug($request->title);
//
//        $product->category_id = 1;
//        $product->brand_id = 1;
//        $product->admin_id = 1;

        $product->save();

//        if ($request->hasFile('product_image')) {
//            $image = $request->file('product_image');
//            $img = time() . '.' . $image->getClientOriginalExtension();
//            $location = public_path('images/products/' . $img);
//            Image::make($image)->save($location);
//
//            $product_image = new ProductImage;
//            $product_image->product_id = $product->id;
//            $product_image->image = $img;
//            $product_image->save();
//        }

        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if(!is_null($product)) {
            $product->delete();
        }

        session()->flash('success', 'Successfully Deleted!');
        return back();
    }
}
