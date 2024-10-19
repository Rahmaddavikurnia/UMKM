<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeutama()
    {
        return view('frontend.daftarumkm.form-daftar');
    }

    public function allumkm()
    {
    }
}
