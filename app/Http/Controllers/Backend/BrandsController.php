<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use File;

use Illuminate\Http\Request;

class BrandsController extends Controller
{
  public function index()
  {
      $brands = Brand::orderBy('id', 'desc')->get();
      return view('backend.pages.brands.index', compact('brands'));
  }

  public function create()
  {
      return view('backend.pages.brands.create');
  }

  public function edit($id)
  {
    $brand = Brand::findOrFail($id);

    if (!is_null($brand)) {
      return view('backend.pages.brands.edit', compact('brand'));
    } else {
      return redirect()->route('admin.brands');
    }
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'image' => 'nullable|image',
          'description' => 'required',
      ]);

      $brand = new Brand;
      $brand->name = $request->name;
      $brand->description = $request->description;

      // Image for Brand
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $img = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/brands/' . $img);
        Image::make($image)->save($location);
        $brand->image = $img;
      }
      $brand->save();

      session()->flash('success', 'Successfully Created a Brand!');
      return redirect()->route('admin.brands');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'name' => 'required',
        'image' => 'nullable|image',
        'description' => 'required',
    ]);

    $brand = Brand::findOrFail($id);
    $brand->name = $request->name;
    $brand->description = $request->description;

    // Image for Brand
    if ($request->hasFile('image')) {
      // Delete Old Image from folder
      if (File::exists('images/brands/' . $brand->image)) {
        File::delete('images/brands/' . $brand->image);
      }
      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/brands/' . $img);
      Image::make($image)->save($location);
      $brand->image = $img;
    }
    $brand->save();

    session()->flash('success', 'Successfully Up Brand!');
    return redirect()->route('admin.brands');
  }

  public function delete($id)
  {
    $brand = Brand::findOrFail($id);
    if(!is_null($brand)) {
      // Delete brand image
      if (File::exists('images/brands/' . $brand->image)) {
        File::delete('images/brands/' . $brand->image);
      }
      // Delete Brand
      $brand->delete();
    }

    session()->flash('success', 'Successfully Deleted!');
    return back();
  }
}
