<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->pin == 44156) {
        $total = Penerbit::all()->count();
        $data = Penerbit::all();
        return view('pages.admin.penerbit.index')->with([
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
        Penerbit::create($data);

        return redirect()->back()->with([
            'message' => 'Data penerbit berhasil ditambahkan',
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
        $item = Penerbit::findOrFail($id);
        $buku = Buku::with('penerbit')->where('id_penerbit',$id)->get();
        return view('pages.admin.penerbit.profile')->with([
            'item' => $item,
            'buku' => $buku
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
        $item = Penerbit::findOrFail($id);
        return view('pages.admin.penerbit.edit-penerbit')->with([
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
        $item = Penerbit::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Data penerbit berhasil diupdate',
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
        $item = Penerbit::findOrFail($id);
        $item->delete();

        return redirect()->route('penerbit.index')->with([
            'message' => 'Penerbit berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }

}
