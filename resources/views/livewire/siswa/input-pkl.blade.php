<div class="max-w-screen-xl mx-auto mt-8 bg-white border border-gray-300 rounded-xl shadow-lg p-6">
    <!-- Header salam dan info user -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-semibold mb-2">Daftar Siswa PKL</h2>
        <p class="text-gray-600">Silakan input data PKL dan Industri:</p>
    </div>

    <!-- Baris tombol dan search -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('pkl.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
            Daftar PKL
        </a>

        <input type="text" 
               wire:model.live.300ms="search" 
               placeholder="Search..." 
               class="border border-gray-300 rounded px-4 py-2 md:w-40 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
    </div>

    <!-- Container tabel dengan tinggi tetap dan scroll -->
    <div class="overflow-y-auto border border-gray-300 rounded pb-6" style="height: 23rem;">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-center font-medium border-b border-gray-300 sticky top-0 bg-gray-100 z-10">Nama Siswa</th>
                    <th class="p-3 text-center font-medium border-b border-gray-300 sticky top-0 bg-gray-100 z-10">Industri</th>
                    <th class="p-3 text-center font-medium border-b border-gray-300 sticky top-0 bg-gray-100 z-10">Assesor</th>
                    <th class="p-3 text-center font-medium border-b border-gray-300 sticky top-0 bg-gray-100 z-10">Tanggal Mulai</th>
                    <th class="p-3 text-center font-medium border-b border-gray-300 sticky top-0 bg-gray-100 z-10">Tanggal Selesai</th>
                    <th class="p-3 text-center font-medium border-b border-gray-300 sticky top-0 bg-gray-100 z-10">Hari</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pkls as $pkl)
                    <tr class="border-b last:border-b-0 hover:bg-gray-50 transition">
                        <td class="p-3">{{ $pkl->siswa->nama ?? '-' }}</td>
                        <td class="p-3">{{ $pkl->industri->nama ?? '-' }}</td>
                        <td class="p-3">{{ $pkl->guru->nama ?? '-' }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($pkl->tanggal_mulai)->format('d M Y') }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($pkl->tanggal_selesai)->format('d M Y') }}</td>
                        <td class="p-3">{{ $pkl->durasi }} Hari</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-6 text-gray-500">
                            Data PKL tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>