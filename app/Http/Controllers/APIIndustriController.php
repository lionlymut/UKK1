<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Industri;


class APIIndustriController extends Controller
{
    // Ambil semua data industri
    public function index()
    {
        $industri = Industri::get();
        return response()->json($industri, 200);
    }


    // Simpan data industri baru
    public function store(Request $request)
    {
        $industri = new Industri();
        $industri->nama = $request->nama;
        $industri->bidang_usaha = $request->bidang_usaha;
        $industri->alamat = $request->alamat;
        $industri->kontak = $request->kontak;
        $industri->email = $request->email;
        $industri->website = $request->website;
        $industri->save();


        return response()->json($industri, 201);
    }


    // Tampilkan data industri tertentu
    public function show($id)
    {
        $industri = Industri::find($id);
        return response()->json($industri, 200);
    }


    // Update data industri
    public function update(Request $request, $id)
    {
        $industri = Industri::find($id);
        $industri->nama = $request->nama;
        $industri->bidang_usaha = $request->bidang_usaha;
        $industri->alamat = $request->alamat;
        $industri->kontak = $request->kontak;
        $industri->email = $request->email;
        $industri->website = $request->website;
        $industri->save();


        return response()->json($industri, 200);
    }


    // Hapus data industri
    public function destroy($id)
    {
        Industri::destroy($id);
        return response()->json(['message' => 'Industri deleted'], 200);
    }
}

