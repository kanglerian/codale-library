<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function all(Request $request)
    {
        // $id = $request->input('id');
        // $limit = $request->input('limit',6);
        // $id = $request->input('name');
        // $id = $request->input('profesi');

        // if($id){
        //     $penulis = Penulis::findOrFail($id);

        //     if($penulis){
        //         echo "ada";
        //         return ResponseFormatter::success($penulis,'Data penulis berhasil diambil');
        //     }else{
        //         echo "Ga ada";
        //         return ResponseFormatter::success(null,'Data penulis tidak ada',404);
        //     }
        // }

        $data = Penerbit::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Penerbit',
            'data'    => $data
         ], 200);
    }
}
