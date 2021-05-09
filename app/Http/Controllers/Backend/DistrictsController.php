<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class DistrictsController extends Controller
{
  public function index()
  {
      $districts = District::orderBy('name', 'asc')->get();
      return view('backend.pages.districts.index', compact('districts'));
  }

  public function create()
  {
      $divisions = Division::orderBy('priority', 'asc')->get();
      return view('backend.pages.districts.create', compact('divisions'));
  }

  public function edit($id)
  {
    $divisions = Division::orderBy('priority', 'asc')->get();
    $district = District::findOrFail($id);

    if (!is_null($district)) {
      return view('backend.pages.districts.edit', compact('district', 'divisions'));
    } else {
      return redirect()->route('admin.districts');
    }
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'division_id' => 'required',
      ]);

      $district = new District;
      $district->name = $request->name;
      $district->division_id = $request->division_id;

      $district->save();

      session()->flash('success', 'Successfully Created a District!');
      return redirect()->route('admin.districts');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'name' => 'required',
        'division_id' => 'required',
    ]);

    $district = District::findOrFail($id);
    $district->name = $request->name;
    $district->division_id = $request->division_id;

    $district->save();

    session()->flash('success', 'Successfully Updated District!');
    return redirect()->route('admin.districts');
  }

  public function delete($id)
  {
    $district = District::findOrFail($id);
    if(!is_null($district)) {
      $district->delete();
    }
    session()->flash('success', 'Successfully Deleted!');
    return back();
  }
}
