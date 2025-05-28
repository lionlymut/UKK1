<?php


namespace App\Livewire\Siswa;


use Livewire\Component;
use App\Models\Pkl;


class InputPkl extends Component
{
    public $search = '';


    public function render()
    {
        $pkls = Pkl::with(['siswa', 'guru', 'industri'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('siswa', fn($s) =>
                        $s->where('nama', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('industri', fn($i) =>
                        $i->where('nama', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('guru', fn($g) =>
                        $g->where('nama', 'like', '%' . $this->search . '%'));
                });
            })
            ->get();


        return view('livewire.siswa.input-pkl', compact('pkls'))
            ->layout('layouts.app');
    }
}

