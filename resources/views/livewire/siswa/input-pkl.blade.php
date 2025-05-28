<div class="max-w-screen-xl mx-auto mt-8 bg-white border border-gray-300 rounded-xl shadow-lg p-6">
    <h2 class="text-2xl font-semibold mb-6 text-center">Daftar Siswa PKL</h2>

    <div class="bg-white shadow-md rounded-xl p-6">
        <!-- Tombol & Search -->
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

        <!-- Tabel -->
        <div class="border border-gray-300 rounded overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-center font-medium border-b">Nama Siswa</th>
                        <th class="p-3 text-center font-medium border-b">Industri</th>
                        <th class="p-3 text-center font-medium border-b">Assesor</th>
                        <th class="p-3 text-center font-medium border-b">Tanggal Mulai</th>
                        <th class="p-3 text-center font-medium border-b">Tanggal Selesai</th>
                        <th class="p-3 text-center font-medium border-b">Hari</th>
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

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pkls->onEachSide(1)->links() }}
        </div>
    </div>
</div>
