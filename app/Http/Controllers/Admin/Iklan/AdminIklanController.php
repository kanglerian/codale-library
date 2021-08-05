<?php

namespace App\Http\Controllers\Admin\Iklan;

use App\Http\Controllers\Controller;
use App\Models\Iklan;
use Illuminate\Http\Request;

class AdminIklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Iklan::all();
        return view('pages.admin.iklan.index')->with([
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

        Iklan::create($data);

        return redirect()->back()->with([
            'message' => 'Iklan berhasil ditambahkan',
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
        //
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

        $item = Iklan::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Iklan berhasil diupdate',
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
        $item = Iklan::findOrFail($id);
        $item->delete();

        return redirect()->back()->with([
            'message' => 'Data iklan berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }
}
