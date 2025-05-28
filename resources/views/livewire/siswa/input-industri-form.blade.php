 <div class="flex justify-center items-center min-h-screen bg-gray-50">
    <div class="bg-white border-2 border-blue-400 rounded-xl shadow-md p-8 w-full max-w-md h-auto">
        <h2 class="text-center text-xl font-bold text-blue-900 mb-6">TAMBAH INDUSTRI BARU</h2>


        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('message') }}
            </div>
        @endif


        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label for="nama" class="block text-sm font-medium">Nama Industri</label>
                <input id="nama" type="text" wire:model="nama" class="w-full border p-2 rounded" />
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label for="bidang_usaha" class="block text-sm font-medium">Bidang Usaha</label>
                <input id="bidang_usaha" type="text" wire:model="bidang_usaha" class="w-full border p-2 rounded" />
                @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label for="alamat" class="block text-sm font-medium">Alamat</label>
                <input id="alamat" type="text" wire:model="alamat" class="w-full border p-2 rounded" />
                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label for="kontak" class="block text-sm font-medium">Kontak</label>
                <input id="kontak" type="text" wire:model="kontak" class="w-full border p-2 rounded" />
                @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" wire:model="email" class="w-full border p-2 rounded" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label for="website" class="block text-sm font-medium">Website</label>
                <input id="website" type="url" wire:model="website" class="w-full border p-2 rounded" />
                @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div class="text-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-400 transition duration-200">
                    Simpan Industri
                </button>
            </div>
        </form>
    </div>
</div>

