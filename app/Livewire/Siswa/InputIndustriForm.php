<?php


namespace App\Livewire\Siswa;


use Livewire\Component;
use App\Models\Industri;


class InputIndustriForm extends Component
{
    public $nama;
    public $bidang_usaha;
    public $alamat;
    public $kontak;
    public $email;


    // Validasi form
    protected $rules = [
        'nama' => 'required|string|max:255',
        'bidang_usaha' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'required|website|max:255',
    ];


    public function submit()
    {
        // Validasi data input
        $this->validate();


        // Simpan industri baru
        Industri::create([
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'website' => $this->website,
        ]);


        // Redirect ke halaman daftar industri setelah berhasil menambah
        session()->flash('message', 'Industri baru berhasil ditambahkan.');
        return redirect()->route('industri.index');
    }


    public function render()
    {
        return view('livewire.siswa.input-industri-form')->layout('layouts.app');
    }
}
