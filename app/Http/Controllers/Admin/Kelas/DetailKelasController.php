<?php

namespace App\Http\Controllers\Admin\Kelas;

use App\Http\Controllers\Controller;
use App\Models\DetailKelas;
use App\Models\Kategori;
use App\Models\Kelas;
use App\User;
use Illuminate\Http\Request;

class DetailKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        $creator = User::all();
        $data = DetailKelas::all();
        return view('pages.admin.studio.index')->with([
            'data' => $data,
            'creator' => $creator,
            'kelas' => $kelas
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
        if($request->thumbnail){

            $thumbnail = $request->file('thumbnail');
            $tujuan = 'thumbnail';
            $namaFile =  time() . '.' . $thumbnail->getClientOriginalExtension();

            $thumbnail->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['thumbnail'] = $namaFile;
        }

        DetailKelas::create($data);

        return redirect()->back()->with([
            'message' => 'Video berhasil ditambahkan',
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
        $creator = User::all();
        $kelas = Kelas::all();
        $item = DetailKelas::findOrFail($id);
        return view('pages.admin.studio.detail')->with([
            'item' => $item,
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
        if($request->thumbnail){

            $thumbnail = $request->file('thumbnail');
            $tujuan = 'thumbnail';
            $namaFile =  time() . '.' . $thumbnail->getClientOriginalExtension();

            $thumbnail->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['thumbnail'] = $namaFile;
        }
        $item = DetailKelas::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Data content berhasil diupdate',
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
        $item = DetailKelas::findOrFail($id);
        $item->delete();

        return redirect()->route('detailkelas.index')->with([
            'message' => 'Content berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }
}
