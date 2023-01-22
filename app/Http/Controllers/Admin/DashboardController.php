<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // funzione che rimanda alla pagina index
    public function index()
    {
        $users = Auth::user();
        return view('admin.dashboard', compact('users'));
    }
}
