<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        $this->setPageTitle('Login', '');
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->validated();
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            $user = Auth::getProvider()->retrieveByCredentials($credentials);

            Auth::login($user);

            return $this->authenticated($request, $user)
                ?: redirect()->intended();
        } else {
            Session::flash('status', 'Please Enter Correct Email and Password ');
            return redirect()->route('auth.login.show');
        }
    }
    private function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->intended(route('homepage'));
        }
    }
}