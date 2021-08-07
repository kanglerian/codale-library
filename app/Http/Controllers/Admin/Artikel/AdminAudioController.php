<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Audio;
use Illuminate\Http\Request;

class AdminAudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Article::all();
        $data = Audio::all();
        return view('pages.admin.artikel.audio')->with([
            'data' => $data,
            'artikel' => $artikel
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
            $tujuan = 'gambar';
            $namaFile =  time() . '.' . $thumbnail->getClientOriginalExtension();

            $thumbnail->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['thumbnail'] = $namaFile;
        }

        if($request->audio){

            $audio = $request->file('audio');
            $tujuan = 'podcast';
            $namaFile =  time() . '.' . $audio->getClientOriginalExtension();

            $audio->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['audio'] = $namaFile;
        }

        Audio::create($data);

        return redirect()->route('audio.index')->with([
            'message' => 'Podcast berhasil ditambahkan',
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
        $artikel = Article::all();
        $item = Audio::findOrFail($id);
        return view('pages.admin.artikel.detail-audio')->with([
            'item' => $item,
            'artikel' => $artikel
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
            $tujuan = 'gambar';
            $namaThumb =  time() . '.' . $thumbnail->getClientOriginalExtension();

            $thumbnail->move($tujuan,$namaThumb);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['thumbnail'] = $namaThumb;
        }

        if($request->audio){

            $audio = $request->file('audio');
            $tujuan = 'podcast';
            $namaFile =  time() . '.' . $audio->getClientOriginalExtension();

            $audio->move($tujuan,$namaFile);

            // $data['cover'] = $request->file('cover')->store(
            //     'img/cover','public'
            // );
            $data['audio'] = $namaFile;
        }

        $item = Article::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Podcast berhasil diupdate',
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
        $item = Audio::findOrFail($id);
        $item->delete();

        return redirect()->route('audio.index')->with([
            'message' => 'Audio Podcast berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }
}
