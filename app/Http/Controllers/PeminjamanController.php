<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Pinjaman;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->pin == 44156) {
            $pinjam = Pinjaman::where('status', 'Pinjam')->count();
            $hilang = Pinjaman::where('status', 'Hilang')->count();
            $total = Pinjaman::all()->count();
            $kategori = Kategori::all();
            $penulis = Penulis::all();
            $penerbit = Penerbit::all();
            $jumlahpelanggan = User::where('status', 'Aktif')->count();
            $pelanggan = User::where('status', 'Aktif')->get();
            $jumlahBuku = Buku::where('status', 'Tersedia')->count();
            $buku = Buku::where('status', 'Tersedia')->get();
            $data = Pinjaman::all();
            return view('pages.peminjaman.index')->with([
                'data' => $data,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'pelanggan' => $pelanggan,
                'buku' => $buku,
                'total' => $total,
                'pinjam' => $pinjam,
                'hilang' => $hilang,
                'jumlahBuku' => $jumlahBuku,
                'jumlahPelanggan' => $jumlahpelanggan
            ]);
        }

        return redirect()->route('landing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        Pinjaman::create($data);
        $buku = $request->all();
        $whereBook = Buku::findOrFail($request->input('id_buku'), 'id');
        $whereBook->update($buku);

        return redirect()->route('peminjaman.index')->with([
            'message' => 'Data Peminjaman berhasil ditambahkan',
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
        //
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
        $buku = $request->all();
        $item = Pinjaman::findOrFail($id);
        $whereBook = Buku::findOrFail($request->input('id_buku'), 'id');
        $item->update($data);
        $whereBook->update($buku);


        return redirect()->route('peminjaman.index')->with([
            'message' => 'Data berhasil diupdate',
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
        $item = Pinjaman::findOrFail($id);
        $item->delete();

        return redirect()->route('peminjaman.index')->with([
            'message' => 'Data Peminjaman berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }

    public function detail($id, $trid)
    {
        $totalDonasi = 0;
        $donasi = Pinjaman::where('id_transaksi', $trid)->get();
        foreach ($donasi as $value) {
            $totalDonasi = $totalDonasi + $value['donasi'];
        }
        $totalPinjam = Pinjaman::where('id_transaksi', $trid)->count();
        $data = Pinjaman::where('id_transaksi', $trid)->get();
        $item = Pinjaman::findOrFail($id);
        return view('pages.peminjaman.invoice')->with([
            'item' => $item,
            'data' => $data,
            'totalPinjam' => $totalPinjam,
            'totalDonasi' => $totalDonasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pinjam(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        Pinjaman::create($data);
        $buku = $request->all();
        $whereBook = Buku::findOrFail($request->input('id_buku'), 'id');
        $whereBook->update($buku);

        return redirect()->back()->with([
            'message' => 'Buku berhasil dipesan, Mohon untuk mengambil buku di alamat tertera',
            'status' => 'alert-success'
        ]);
    }

}
