<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('pages.admin.artikel.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kategori = Kategori::all();
        return view('pages.admin.artikel.create')->with([
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->gambar){

            $gambar = $request->file('gambar');
            $tujuan = 'gambar';
            $namaFile =  time() . '.' . $gambar->getClientOriginalExtension();

            $gambar->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['gambar'] = $namaFile;
        }

        Article::create($data);

        return redirect()->back()->with([
            'message' => 'Artikel berhasil ditambahkan',
            'status' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $item = Article::findOrFail($id);
        return view('pages.admin.artikel.edit')->with([
            'item' => $item,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->gambar){

            $gambar = $request->file('gambar');
            $tujuan = 'gambar';
            $namaFile =  time() . '.' . $gambar->getClientOriginalExtension();

            $gambar->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['gambar'] = $namaFile;
        }
        $item = Article::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Data Artikel berhasil diupdate',
            'status' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
