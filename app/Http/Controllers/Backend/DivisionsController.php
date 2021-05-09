<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class DivisionsController extends Controller
{
  public function index()
  {
      $divisions = Division::orderBy('priority', 'asc')->get();
      return view('backend.pages.divisions.index', compact('divisions'));
  }

  public function create()
  {
      return view('backend.pages.divisions.create');
  }

  public function edit($id)
  {
    $division = Division::findOrFail($id);

    if (!is_null($division)) {
      return view('backend.pages.divisions.edit', compact('division'));
    } else {
      return redirect()->route('admin.divisions');
    }
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'priority' => 'required',
      ]);

      $division = new Division;
      $division->name = $request->name;
      $division->priority = $request->priority;

      $division->save();

      session()->flash('success', 'Successfully Created a division!');
      return redirect()->route('admin.divisions');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'name' => 'required',
        'priority' => 'required',
    ]);

    $division = Division::findOrFail($id);
    $division->name = $request->name;
    $division->priority = $request->priority;

    $division->save();

    session()->flash('success', 'Successfully Updated Division!');
    return redirect()->route('admin.divisions');
  }

  public function delete($id)
  {
    $division = Division::findOrFail($id);
    if(!is_null($division)) {
      // Delete all districts
      $districts = District::where('division_id', $division->id)->get();
      foreach ($districts as $district) {
        $district->delete();
      }
      $division->delete();
    }
    session()->flash('success', 'Successfully Deleted!');
    return back();
  }
}
