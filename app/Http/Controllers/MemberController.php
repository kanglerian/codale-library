<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Pinjaman;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->pin == 44156) {
            $total = User::all()->count();
            $data = User::all();
            return view('pages.member.index')->with([
                'total' => $total,
                'data' => $data

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
     *//**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with([
            'message' => 'Data anggota sudah ditambahkan',
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
        $user = User::findOrFail($id);
        return view('pages.member.edit')->with([
            'user' => $user
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
        $user = User::findOrFail($id);
        if($request->password != $user->password){
            $data['password'] = bcrypt($request->password);
        }

        $item = User::findOrFail($id);
        $item->update($data);

        return redirect()->back()->with([
            'message' => 'Data diri berhasil diubah',
            'status' => 'alert-success',
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
        $item = User::findOrFail($id);
        $pinjam = Pinjaman::where('id_pelanggan', $id);
        $item->delete();
        $pinjam->delete();

        return redirect()->back()->with([
            'message' => 'Member berhasil dihapus',
            'status' => 'alert-danger'
        ]);
    }
}
