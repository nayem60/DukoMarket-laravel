<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthenticatedAdminController extends Controller
{
      public function create()
    {
        return view('auth.admin-login');
    }


    public function store(AdminRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN);
        //return redirect()->route('admin_dashboard');
      
    }


    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.index');
    }
}
