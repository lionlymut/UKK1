<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pkl;


class APIPklController extends Controller
{
    // Ambil semua data PKL
    public function index()
    {
        $pkl = Pkl::with(['siswa', 'industri', 'guru'])->get();
        return response()->json($pkl, 200);
    }


    // Simpan data PKL baru
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'guru_id' => 'required|exists:gurus,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);


        $pkl = new Pkl();
        $pkl->siswa_id = $request->siswa_id;
        $pkl->industri_id = $request->industri_id;
        $pkl->guru_id = $request->guru_id;
        $pkl->tanggal_mulai = $request->tanggal_mulai;
        $pkl->tanggal_selesai = $request->tanggal_selesai;
        $pkl->save();


        return response()->json($pkl, 201);
    }


    // Tampilkan data PKL tertentu
    public function show($id)
    {
        $pkl = Pkl::with(['siswa', 'industri', 'guru'])->find($id);
        if (!$pkl) {
            return response()->json(['message' => 'PKL not found'], 404);
        }
        return response()->json($pkl, 200);
    }


    // Update data PKL
    public function update(Request $request, $id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(['message' => 'PKL not found'], 404);
        }


        $request->validate([
            'siswa_id' => 'sometimes|required|exists:siswas,id',
            'industri_id' => 'sometimes|required|exists:industris,id',
            'guru_id' => 'sometimes|required|exists:gurus,id',
            'tanggal_mulai' => 'sometimes|required|date',
            'tanggal_selesai' => 'sometimes|required|date|after_or_equal:tanggal_mulai',
        ]);


        $pkl->siswa_id = $request->siswa_id ?? $pkl->siswa_id;
        $pkl->industri_id = $request->industri_id ?? $pkl->industri_id;
        $pkl->guru_id = $request->guru_id ?? $pkl->guru_id;
        $pkl->tanggal_mulai = $request->tanggal_mulai ?? $pkl->tanggal_mulai;
        $pkl->tanggal_selesai = $request->tanggal_selesai ?? $pkl->tanggal_selesai;
        $pkl->save();


        return response()->json($pkl, 200);
    }


    // Hapus data PKL
    public function destroy($id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(['message' => 'PKL not found'], 404);
        }


        $pkl->delete();


        return response()->json(['message' => 'PKL deleted'], 200);
    }
}

