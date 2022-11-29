<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( auth()->user()->role == 'editor' ){
            $produk = Produk::where('hidden', false)->get();
        } else {
            $produk = Produk::all();
        }

        return view('produk.produk',compact('produk'));
    }

    public function hide($id){
        $post = Produk::findOrFail($id);


        if ( $post->hidden == false ){
            $post->update([
                'hidden' => true
            ]);
        } else {
            $post->update([
                'hidden' => false
            ]);
        }

        return redirect('/produk');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('produk.add',compact('kategori'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('image-produk');
        Produk::create($data);

        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
        
        if ( $produk->hidden == true && auth()->user()->role !== 'admin'){
            return redirect('/produk');
        }
        $kategori = Kategori::all();
        return view('produk.edit',compact('produk','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
        $data = $request->all();
        if ( $request->file('foto') == NULL ){
            $data['foto'] = $produk->foto;
        } else {
            Storage::delete($produk->foto);
            $data['foto'] = $request->file('foto')->store('image-produk');
        }
        
        $produk->update($data);

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
        Storage::delete($produk->foto);
        $produk->delete();
        return redirect('/produk');
    }
}
