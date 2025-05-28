<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Industri;

class DaftarIndustri extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); // Reset ke halaman 1 saat pencarian diubah
    }

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
            ->paginate(1); // <- pagination

        return view('livewire.siswa.daftar-industri', compact('industris'))
            ->layout('layouts.app');
    }
}
