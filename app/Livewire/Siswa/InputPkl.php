<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pkl;

class InputPkl extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); // Reset ke halaman pertama saat search berubah
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';

        $pkls = Pkl::with(['siswa', 'guru', 'industri'])
            ->when($this->search, function ($query) use ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->whereHas('siswa', fn($s) =>
                        $s->where('nama', 'like', $searchTerm))
                    ->orWhereHas('industri', fn($i) =>
                        $i->where('nama', 'like', $searchTerm))
                    ->orWhereHas('guru', fn($g) =>
                        $g->where('nama', 'like', $searchTerm));
                });
            })
            ->paginate(1); // Ganti sesuai kebutuhan per halaman

        return view('livewire.siswa.input-pkl', compact('pkls'))
            ->layout('layouts.app');
    }
}
