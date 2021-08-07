<?php

namespace App\Http\Controllers\Admin\Kelas;

use App\Http\Controllers\Controller;
use App\Models\DetailKelas;
use App\Models\Kategori;
use App\Models\Kelas;
use App\User;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kelas::all();
        return view('pages.admin.kelas.index')->with([
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
        return view('pages.admin.kelas.create')->with([
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

        Kelas::create($data);

        return redirect()->back()->with([
            'message' => 'Kelas berhasil ditambahkan',
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
        $kelas = Kelas::all();
        $creator = User::all();
        $detail = DetailKelas::with('kelas')->where('id_kelas', $id)->get();
        $item = Kelas::findOrFail($id);
        return view('pages.admin.kelas.detail')->with([
            'item' => $item,
            'detail' => $detail,
            'kelas' => $kelas,
            'creator' => $creator
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = User::all();
        $kategori = Kategori::all();
        $item = Kelas::findOrFail($id);
        return view('pages.admin.kelas.edit')->with([
            'item' => $item,
            'kategori' => $kategori,
            'author' => $author
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
        $item = Kelas::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Data kelas berhasil diupdate',
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
        $item = Kelas::findOrFail($id);
        $item->delete();

        return redirect()->back()->with([
            'message' => 'Kelas berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }
}
