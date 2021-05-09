<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use File;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('backend.pages.categories.create', compact('main_categories'));
    }

    public function edit($id)
    {
      $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
      $category = Category::findOrFail($id);

      if (!is_null($category)) {
        return view('backend.pages.categories.edit', compact('category', 'main_categories'));
      } else {
        return redirect()->route('admin.categories');
      }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'description' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        // Image for Category
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $img = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/categories/' . $img);
          Image::make($image)->save($location);
          $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'Successfully Created a Category!');
        return redirect()->route('admin.categories');
    }

    public function update(Request $request, $id)
    {
      $request->validate([
          'name' => 'required',
          'image' => 'nullable|image',
          'description' => 'required',
      ]);

      $category = Category::findOrFail($id);
      $category->name = $request->name;
      $category->description = $request->description;
      $category->parent_id = $request->parent_id;

      // Image for Category
      if ($request->hasFile('image')) {
        // Delete Old Image from folder
        if (File::exists('images/categories/' . $category->image)) {
          File::delete('images/categories/' . $category->image);
        }
        $image = $request->file('image');
        $img = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/categories/' . $img);
        Image::make($image)->save($location);
        $category->image = $img;
      }
      $category->save();

      session()->flash('success', 'Successfully Up Category!');
      return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
      $category = Category::findOrFail($id);
      if(!is_null($category)) {
        // Delete sub category if it's parent category
        if ($category->parent_id === NULL) {
          // Delete sub Category
          $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
          foreach ($sub_categories as $sub) {
            if (File::exists('images/categories/' . $sub->image)) {
              File::delete('images/categories/' . $sub->image);
            }
            $sub->delete();
          }
        }
        // Delete category image
        if (File::exists('images/categories/' . $category->image)) {
          File::delete('images/categories/' . $category->image);
        }
        // Delete Category
        $category->delete();
      }

      session()->flash('success', 'Successfully Deleted!');
      return back();
    }
}
