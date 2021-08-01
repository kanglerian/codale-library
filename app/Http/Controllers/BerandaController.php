<?php

namespace App\Http\Controllers;

use App\Models\DetailStatus;
use App\Models\Iklan;
use App\Models\Informasi;
use App\Models\Status;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $informasi = Informasi::where('status','Aktif')->Latest()->take(1)->get();
        $iklan = Iklan::where('status','Aktif')->latest()->take(2)->get();
        $comments = DetailStatus::all();
        $data = Status::orderBy('id','DESC')->get();
        return view('pages.beranda.index')->with([
            'data' => $data,
            'comments' => $comments,
            'iklan' => $iklan,
            'informasi' => $informasi
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
        Status::create($data);

        return redirect()->back();
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
        $item = Status::findOrFail($id);
        $item->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Status::findOrFail($id);
        $komen = DetailStatus::where('id_status', $id);
        $item->delete();
        $komen->delete();

        return redirect()->back();
    }

}