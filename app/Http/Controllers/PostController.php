<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class PostController extends Controller
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
            $post = Post::where('hidden', false)->get();
        } else {
            $post = Post::all();
        }
        return view('post.post',compact('post'));
    }

    public function hide($id){
        $post = Post::findOrFail($id);


        if ( $post->hidden == false ){
            $post->update([
                'hidden' => true
            ]);
        } else {
            $post->update([
                'hidden' => false
            ]);
        }

        return redirect('/post');

        
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
        return view('post.add',compact('kategori'));
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
        $data['tanggalDibuat'] = date('Y-m-d');

        Post::create($data);
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        if ( $post->hidden == true ){
            return redirect('/post');
        }

        $kategori = Kategori::all();
        return view('post.edit',compact('post','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $data = $request->all();

        $post->update($data);
        return redirect('/post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect('/post');
    }
}
