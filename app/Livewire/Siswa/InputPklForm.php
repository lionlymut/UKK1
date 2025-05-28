<?php


namespace App\Livewire\Siswa;


use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;


class InputPklForm extends Component
{
    public $siswa_id;
    public $industri_id;
    public $guru_id;
    public $tanggal_mulai;
    public $tanggal_selesai;


    public $sudahInput = false;


    protected $rules = [
        'siswa_id' => 'required|exists:siswas,id',
        'industri_id' => 'required|exists:industris,id',
        'guru_id' => 'required|exists:gurus,id',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after:tanggal_mulai',
    ];


    public function mount()
    {
        $siswaId = Siswa::where('email', auth()->user()->email)->value('id');
        $this->siswa_id = $siswaId;


        $this->sudahInput = Pkl::where('siswa_id', $siswaId)->exists();
    }


    public function submit()
    {
        $this->validate();


        DB::beginTransaction();


        try {
            // Cek ulang dalam transaksi
            $sudahInput = Pkl::where('siswa_id', $this->siswa_id)->exists();


            if ($sudahInput) {
                DB::rollBack();
                session()->flash('error');
                return;
            }


            Pkl::create([
                'siswa_id' => $this->siswa_id,
                'industri_id' => $this->industri_id,
                'guru_id' => $this->guru_id,
                'tanggal_mulai' => $this->tanggal_mulai,
                'tanggal_selesai' => $this->tanggal_selesai,
            ]);


            DB::commit();


            session()->flash('message', 'Data PKL berhasil ditambahkan.');
            return redirect()->route('dashboard');
           
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function render()
    {
        $industris = Industri::all();
        $gurus = Guru::all();
        $siswas = Siswa::where('email', auth()->user()->email)->get();


        return view('livewire.siswa.input-pkl-form', compact('industris', 'gurus', 'siswas'))->layout('layouts.app');
    }
}

