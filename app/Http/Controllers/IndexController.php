<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Produk;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class IndexController extends Controller
{
    //
    public function index(){
        $post = Post::where('hidden', false)->get();
        return view('index',compact('post'));
    }

    public function view($id){
        $post = Post::findOrFail($id);
        $produk = Produk::where('kategori_id',$post->kategori->id)->where('hidden',false)->paginate(5);
        
        if ( $post->hidden == true ){
            return redirect('/index');
        }
        return view('post.view',compact('post','produk'));
    }

    public function rekomendasi(){
        return view('rekomendasi');
    }

    public function addRekomendasi(Request $request){


        $jamu = new Jamu();
        $saran = new Saran();
        
        $data = [
            'nama_jamu' => $jamu->namaJamu($request->keluhan)['nama_jamu'],
            'khasiat' => $jamu->namaJamu($request->keluhan)['khasiat'],
            'keluhan' => $request->keluhan,
            'umur' => $jamu->umur($request->umur),
            'saran_penggunaan' => $saran->getSaran($request->keluhan,$request->umur)
        ];


        return view('rekomendasi',compact('data'));


    }


}


class Jamu {

    public function namaJamu($keluhan){
        $data = [];
        if ( $keluhan == 'keseleo' OR $keluhan == 'kurang nafsu makan'){
            $data['nama_jamu'] = 'Beras Kencur';
            $data['khasiat'] = 'Mengobati keseleo dan mengobati kurang nafsu makan';
        } else if ( $keluhan == 'pegal-pegal'){
            $data['nama_jamu'] = 'Kunyit Asam';
            $data['khasiat'] = 'Mengobati pegal-pegal';
        } else if ( $keluhan == 'darah tinggi' OR $keluhan == 'gula darah'){
            $data['nama_jamu'] = 'Brotowali';
            $data['khasiat'] = 'Darah tinggi dan gula darah';
        } else  if ( $keluhan == 'kram perut' OR $keluhan == 'masuk angin'){
            $data['nama_jamu'] = 'Temulawak';
            $data['khasiat'] = 'Mengobati kram perut dan mengobati masuk angin';
        }

        return $data;
    }


    public function umur($tahunLahir){

        return date('Y') - $tahunLahir;

    }

}

class Saran extends Jamu {
    public function getSaran($keluhan,$tahunLahir){
        $saran = '';

        if ( $this->umur($tahunLahir) <=10 ){
            return $keluhan == 'keseleo' ? 'Dioleskan 1x' : 'Dikonsumsi 1x';
        } else {
            return $keluhan == 'keseleo' ? 'Dioleskan 2x' : 'Dikonsumsi 2x';
        } 
    }
}
