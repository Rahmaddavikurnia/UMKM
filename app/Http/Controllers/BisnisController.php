<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\Categori;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bisniss = Bisnis::with('categoris','users','provinces','regencies')->get();
        return view('admin.bisnis.dashboard',compact('bisniss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categoris = Categori::all();
        $provincis = Province::all();
        $regencies = Regency::all();
        return view('admin.bisnis.create',compact('users','categoris','provincis','regencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'categori_id'=> 'required|array|min:1',
            'province_id'=>'required|array|min:1',
            'regenci_id'=>'required|array|min:1',
            'categori_id.*'=> 'nullable',
            'province_id.*'=>'nullable',
            'regenci_id.*'=>'nullable',
            'nama_bisnis'=>'required|string',
            'email'=>'required|unique,email|string|max:255',
            'no_hp'=>'required',
            'deskripsi'=>'required|string',
            'medsos'=>'required|string',
            'foto_produk'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_bisnis'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'categori_id.required'=> 'Pilih Salah satu Kategori',
            'province_id.required'=>'Pilih Salah satu Provinsi',
            'regenci_id.required'=>'Pilih Salah satu Kabupaten',
            'categori_id.*nullable'=> 'Kategori Wajib Diisi',
            'province_id.*nullable'=>'Provinsi Wajib Diisi',
            'regenci_id.*nullable'=>'Kabupaten/Kota Wajib Diisi',
            'nama_bisnis.required'=>'Nama Bisnis Wajib Diisi',
            'email.required'=>'Email Harus Diisi',
            'no_hp.required'=>'No Hp Wajib Diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'medsos.required'=>'Isi medsos umkm',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/umkm/dashboard')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('foto_bisnis');
        $name=$file->getClientOriginalName();
        $path='storage/image/bisnis/';
        $file->move($path,$name);
        $foto_bisnis = $name;
        
        $file = $request->file('foto_produk');
        $name=$file->getClientOriginalName();
        $path='storage/image/produk/';
        $file->move($path,$name);
        $foto_produk = $name;

        $bisnis = Bisnis::create([
            'categori_id'=>$request->categori_id,
            'user_id'=>auth()->id(),
            'province_id'=>$request->province_id,
            'regenci_id'=>$request->regenci_id,
            'nama_bisnis'=>$request->nama_bisnis,
            'email'=>$request->email, 
            'no_hp'=>$request->no_hp,
            'deskripsi'=>$request->deskripsi,
            'jambuka'=>$request->jambuka,
            'medsos'=>$request->medsos,
            'foto_produk'=>$foto_produk,
            'foto_bisnis'=>$foto_bisnis,
            'latitude' => $request -> latitude,
            'longitude' => $request -> longitude,

        ]);

        if ($bisnis) {
            return redirect('/admin/umkm/dashboard')->with('success', 'Berhasil Menambahkan Usaha');
        } else {
            return redirect('/admin/umkm/dashboard')->with('error', 'Gagal Menambahkan Usaha');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bisnis $bisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bisniss = Bisnis::with('categoris','users','provinces','regencies')->find($id);
        $categoris = Categori::all();
        $users = User::all();
        $provinsis = Province::all();
        $regencies = Regency::all();
        return view('admin.bisnis.edit',compact('users','categoris','provincis','regencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'categori_id'=> 'required|array|min:1',
            'province_id'=>'required|array|min:1',
            'regenci_id'=>'required|array|min:1',
            'categori_id.*'=> 'nullable',
            'province_id.*'=>'nullable',
            'regenci_id.*'=>'nullable',
            'nama_bisnis'=>'required|string',
            'email'=>'required|unique,email|string|max:255',
            'no_hp'=>'required',
            'deskripsi'=>'required|string',
            'medsos'=>'nullable',
            'foto_produk'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_bisnis'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'categori_id.required'=> 'Pilih Salah satu Kategori',
            'province_id.required'=>'Pilih Salah satu Provinsi',
            'regenci_id.required'=>'Pilih Salah satu Kabupaten',
            'categori_id.*nullable'=> 'Kategori Wajib Diisi',
            'province_id.*nullable'=>'Provinsi Wajib Diisi',
            'regenci_id.*nullable'=>'Kabupaten/Kota Wajib Diisi',
            'nama_bisnis.required'=>'Nama Bisnis Wajib Diisi',
            'email.required'=>'Email Harus Diisi',
            'no_hp.required'=>'No Hp Wajib Diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('b.edit',['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $update = Bisnis::findOrFail($id);

        if ($update->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if($request->file('foto_produk')){

            $file=$request->file('foto_produk');
            unlink('storage/image/bisnis/'.$update->foto_produk);
            $name=$file->getClientOriginalName();
            $path= 'storage/image/bisnis/';
            $file->move($path,$name);
            $update['foto_produk'] = $name;
        }
        if($request->file('foto_bisnis')){

            $file=$request->file('foto_bisnis');
            unlink('storage/image/produk/'.$update->foto_bisnis);
            $name=$file->getClientOriginalName();
            $path= 'storage/image/produk/';
            $file->move($path,$name);
            $update['foto_bisnis'] = $name;
        }

        $update->categori_id = $request -> categori_id;
        $update->province_id = $request -> province_id;
        $update->regenci_id = $request -> regenci_id;
        $update->nama_bisnis = $request -> nama_bisnis;
        $update->email = $request -> email;
        $update->no_hp = $request -> no_hp;
        $update->deskripsi = $request -> deskripsi;
        $update->jambuk = $request -> jambuka;
        $update->medsos = $request -> medsos;
        $update->latitude = $request -> latitude;
        $update->longitude = $request -> longitude;

        $update->save();

        if ($update) {
            return redirect('/admin/umkm/dashboard')->with('success', 'Berhasil Memperbarui Usaha');
        } else {
            return redirect('/admin/umkm/dashboard')->with('error', 'Gagal Memperbarui Usaha');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bisnis $bisnis)
    {
        $foto_produkPath = 'storage/image/produk/' .$bisnis->foto_produk;
        $foto_bisnisPath = 'storage/image/bisnis/' .$bisnis->foto_bisnis;
        unlink($foto_produkPath);
        unlink($foto_bisnisPath);

        $bisnis->delete();

        return Redirect::route('b.tabel');
    }
}
