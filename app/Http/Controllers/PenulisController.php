<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->pin == 44156) {

            $total = Penulis::all()->count();
            $data = Penulis::all();
            return view('pages.admin.penulis.index')->with([
                'data' => $data,
                'total' => $total
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
        //
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

        if($request->photo){

            $photo = $request->file('photo');
            $tujuan = 'photo';
            $namaFile =  time() . '.' . $photo->getClientOriginalExtension();

            $photo->move($tujuan,$namaFile);

            $data['photo'] = $namaFile;

        }
        Penulis::create($data);

        return redirect()->back()->with([
            'message' => 'Penulis berhasil ditambahkan',
            'status' => 'alert-success',
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
        $total = Buku::with('penulis')->where('id_penulis', $id)->count();
        $item = Penulis::findOrFail($id);
        $buku = Buku::with('penulis')->where('id_penulis', $id)->get();
        return view('pages.admin.penulis.profile')->with([
            'item' => $item,
            'buku' => $buku,
            'total' => $total
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
        $item = Penulis::findOrFail($id);
        return view('pages.admin.penulis.edit-penulis')->with([
            'item' => $item
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
        if($request->photo){

            $photo = $request->file('photo');
            $tujuan = 'photo';
            $namaFile =  time() . '.' . $photo->getClientOriginalExtension();

            $photo->move($tujuan,$namaFile);

            $data['photo'] = $namaFile;

        }
        $item = Penulis::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
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
        $item = Penulis::findOrFail($id);
        $item->delete();

        return redirect()->route('penulis.index')->with([
            'message' => 'Penulis berhasil dihapus',
            'status' => 'alert-danger',
        ]);
    }
}
