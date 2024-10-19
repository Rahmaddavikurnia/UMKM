<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoris = Categori::all();
        return view('admin.categori.dashboard',compact('categoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categori::create([
            'id'=>$request->id,
            'nama_categori'=>$request->nama_categori,
            'deskripsi'=>$request->deskripsi
        ]);
        return Redirect::route('c.tabel');     
    }

    /**
     * Display the specified resource.
     */
    public function show(Categori $categori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoris = Categori::find($id);
        return view('admin.categori.edit',compact('categoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $update = Categori::findOrFail($id);

        $update->nama_categori = $request -> nama_categori;
        $update->deskripsi = $request -> deskripsi;

        $update->save();

        return Redirect::route('c.tabel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categori $categoris)
    {
        $categoris->delete();

        return Redirect::route('c.tabel');
    }
}
