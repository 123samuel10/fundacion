<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->usertype === 'user') {
            return redirect()->route('user.dashboard');
        }

        // Opcional: Redirige a una página por defecto si el tipo de usuario no coincide
        return redirect('/');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        return view('user.dashboard');
    }
}
