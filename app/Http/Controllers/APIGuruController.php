<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Guru; //penggunaan model guru


class APIGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { //method untuk merespon permintaan read data semua guru
        $guru = Guru::get();
        return response()->json($guru, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  //method untuk me respon proses create guru baru
        $guru = new Guru();
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->gender = $request->gender;
        $guru->keterangan = $request->keterangan;
        $guru->alamat = $request->alamat;
        $guru->kontak = $request->kontak;
        $guru->email = $request->email;
        $guru->save();


        return response()->json($guru, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { // method untuk me respon read sala satu guru
        $guru = Guru::find($id);
        return response()->json($guru, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { // method untuk proses update
        $guru = Guru::find($id);
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->gender = $request->gender;
        $guru->keterangan = $request->keterangan;
        $guru->alamat = $request->alamat;
        $guru->kontak = $request->kontak;
        $guru->email = $request->email;
        $guru->save();


        return response()->json($guru, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {  // method untuk me respon proses delete data sala satu guru
        Guru::destroy($id);
        return response()->json(["message" => "Deleted"], 200);
    }
}

