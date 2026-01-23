<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function viewLoginAdmin()
    {
        return view('admin.loginadmin');
    }

    public function prosesLoginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if (!$admin) {
            return back()->with('error', 'Username atau password salah');
        }

        session([
            'loginadmin' => true, //penanda status login.
            'admin_username' => $admin->username //untuk menyimpan data nama user (admin) yang sedang login.
        ]);

        return redirect('/dashboard');
    }

    public function logoutAdmin()
    {
        session()->forget(['loginadmin', 'admin_username']);
        return redirect('/login');
    }
}
