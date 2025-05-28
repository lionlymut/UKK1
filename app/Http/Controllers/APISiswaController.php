<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;


class APISiswaController extends Controller
{
    // Ambil semua data siswa
    public function index()
    {
        $siswa = Siswa::all();
        return response()->json($siswa, 200);
    }


    // Simpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:siswas',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:siswas',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status_pkl' => 'nullable|string'
        ]);


        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->gender = $request->gender;
        $siswa->alamat = $request->alamat;
        $siswa->kontak = $request->kontak;
        $siswa->email = $request->email;
        $siswa->status_pkl = $request->status_pkl;


        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $siswa->foto = $path;
        }


        $siswa->save();


        return response()->json($siswa, 201);
    }


    // Tampilkan data siswa tertentu
    public function show($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa not found'], 404);
        }
        return response()->json($siswa, 200);
    }


    // Update data siswa
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa not found'], 404);
        }


        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'nis' => 'sometimes|required|string|max:50|unique:siswas,nis,' . $id,
            'gender' => 'sometimes|required|in:L,P',
            'alamat' => 'sometimes|required|string',
            'kontak' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:siswas,email,' . $id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status_pkl' => 'nullable|string'
        ]);


        $siswa->fill($request->except('foto'));


        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $path = $request->file('foto')->store('foto_siswa', 'public');
            $siswa->foto = $path;
        }


        $siswa->save();


        return response()->json($siswa, 200);
    }


    // Hapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa not found'], 404);
        }


        // Hapus foto jika ada
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }


        $siswa->delete();


        return response()->json(['message' => 'Siswa deleted'], 200);
    }
}

