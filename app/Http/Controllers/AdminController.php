<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $acountadmin = User::where('role','admin')->count();
        $acountowner = User::where('role','owner')->count();
        $acountcustomer = User::where('role','customer')->count();
        $totalumkm = DB::table('bisnis')->count();
        return view('admin.dashboard', compact('acountadmin','acountowner','acountcustomer','totalumkm'));
    }
}
