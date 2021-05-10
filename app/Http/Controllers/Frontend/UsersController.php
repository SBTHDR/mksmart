<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('frontend.pages.users.dashboard', compact('user'));
    }

    public function profile()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();

        $user = Auth::user();
        return view('frontend.pages.users.profile', compact('user', 'divisions', 'districts'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'username' => ['required', 'alpha_dash', 'max:255', 'unique:users,username,' . $user->id],
            'phone_no' => ['required', 'unique:users,phone_no,' . $user->id],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'street_address' => ['required'],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->street_address = $request->street_address;
        $user->shipping_address = $request->shipping_address;
        $user->ip_address = request()->ip();

        $user->save();

        session()->flash('success', 'Your profile has been updated successfully!');

        return back();
    }
}
