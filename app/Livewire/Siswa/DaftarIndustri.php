<?php


namespace App\Livewire\Siswa;


use Livewire\Component;
use App\Models\Industri;


class DaftarIndustri extends Component
{

    public $search = '';
    
    public function render()
    {
        $searchTerm = '%' . $this->search . '%';


        $industris = Industri::query()
            ->when($this->search, function ($query) use ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('nama', 'like', $searchTerm)
                      ->orWhere('bidang_usaha', 'like', $searchTerm)
                      ->orWhere('alamat', 'like', $searchTerm)
                      ->orWhere('kontak', 'like', $searchTerm)
                      ->orWhere('email', 'like', $searchTerm)
                      ->orWhere('website', 'like', $searchTerm);
                });
            })
            ->get();


        return view('livewire.siswa.daftar-industri', compact('industris'))
            ->layout('layouts.app');
    }
}





