<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!is_null($user)) {
            $user->status = 1;
            $user->remember_token = NULL;
            $user->save();

            session()->flash('success', 'Email verified successfully, your account has been activated!');
            return redirect('login');

        } else {
            session()->flash('errors', 'Email verification failed!, you token is not valid! try again to register.');
            return redirect('/');
        }

    }
}
