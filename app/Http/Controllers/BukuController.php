<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $totalPinjam = Buku::where('status', 'Dipinjam')->count();
            $total = Buku::all()->count();
            $kategori = Kategori::all();
            $penulis = Penulis::all();
            $penerbit = Penerbit::all();
            $data = Buku::orderBy('status','DESC')->get();
            return view('pages.admin.books.index')->with([
                'data' => $data,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'total' => $total,
                'totalPinjam' => $totalPinjam
            ]);
        return redirect()->route('landing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->pin == 44156) {
            $kategori = Kategori::all();
            $penulis = Penulis::all();
            $penerbit = Penerbit::all();
            return view('pages.admin.books.create')->with([
                'kategori' => $kategori,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
            ]);
        }
        return redirect()->route('landing');
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
        if($request->cover){

            $cover = $request->file('cover');
            $tujuan = 'cover';
            $namaFile =  time() . '.' . $cover->getClientOriginalExtension();

            $cover->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['cover'] = $namaFile;
        }

        Buku::create($data);

        return redirect()->back()->with([
            'message' => 'Buku berhasil ditambahkan',
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
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $item = Buku::findOrFail($id);
        return view('pages.admin.books.detail')->with([
            'item' => $item,
            'kategori' => $kategori,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
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
        if($request->cover){

            $cover = $request->file('cover');
            $tujuan = 'cover';
            $namaFile =  time() . '.' . $cover->getClientOriginalExtension();

            $cover->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );

            $data['cover'] = $namaFile;

        }
        $item = Buku::findOrFail($id);
        $item->update($data);

        return redirect()->route('buku.show', $id)->with([
            'message' => 'Data buku berhasil diupdate',
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
        $item = Buku::findOrFail($id);
        $pinjam = Pinjaman::where('id_buku', $id);
        $item->delete();
        $pinjam->delete();

        return redirect()->route('buku.index')->with([
            'message' => 'Data buku berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }
}
