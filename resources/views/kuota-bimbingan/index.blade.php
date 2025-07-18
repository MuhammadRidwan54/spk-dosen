@extends('layouts.app')

@section('title', 'Daftar Kuota Bimbingan - SPK Dosen')
@section('header-title', 'Daftar Kuota Bimbingan')
@section('header-description', 'Kelola daftar kuota bimbingan beserta score-nya')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-5 lg:p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
            <h1 class="text-xl lg:text-2xl font-bold text-gray-900 tracking-tight">Daftar Kuota Bimbingan</h1>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                <button onclick="openModal('create')" class="bg-gray-900 hover:bg-gray-800 text-white px-4 lg:px-5 py-2 rounded-lg flex items-center justify-center space-x-2 shadow-md transition-all duration-200 text-sm lg:text-base font-medium">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Tambah Kuota</span>
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative mb-6 text-sm" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-100">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Range</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($kuota as $index => $k)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $k->kategori }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $k->range }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $k->score }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium space-x-3">
                            <button onclick="openModal('edit', {{ $k->id }}, '{{ $k->kategori }}', '{{ $k->range }}', {{ $k->score }})" class="text-gray-600 hover:text-gray-900 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <form action="{{ route('kuota-bimbingan.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kuota ini?')" class="text-red-600 hover:text-red-800 transition-colors duration-200 p-1 rounded-md hover:bg-red-50">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create/Edit Modal -->
<div id="kuotaModal" class="fixed inset-0 bg-gray-800 bg-opacity-60 hidden flex items-center justify-center p-4 z-50">
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden transform transition-all sm:my-8 sm:w-full">
        <div class="p-5 lg:p-6">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg lg:text-xl font-semibold text-gray-900" id="modalTitle">Tambah Kuota Bimbingan</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <form id="kuotaForm" method="POST">
                @csrf
                <div id="methodContainer"></div>
                
                <div class="mb-5">
                    <label for="kuotaKategori" class="block text-gray-700 text-sm font-medium mb-2">Kategori</label>
                    <input type="text" name="kategori" id="kuotaKategori" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 placeholder-gray-400 transition-colors duration-200" placeholder="Masukkan kategori" required>
                    @error('kategori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="kuotaRange" class="block text-gray-700 text-sm font-medium mb-2">Range</label>
                    <input type="text" name="range" id="kuotaRange" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 placeholder-gray-400 transition-colors duration-200" placeholder="Contoh: 0-5, 6-10, >10" required>
                    <p class="mt-1 text-xs text-gray-500">Contoh: 0-5, 6-10, >10</p>
                    @error('range')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="kuotaScore" class="block text-gray-700 text-sm font-medium mb-2">Score</label>
                    <select name="score" id="kuotaScore" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 transition-colors duration-200" required>
                        <option value="">Pilih Score</option>
                        <option value="1">1 - >10</option>
                        <option value="2">2 - 6-10</option>
                        <option value="3">3 - 0-5</option>
                    </select>
                    <p class="mt-1 text-xs text-gray-500">1 = >10, 2 = 6-10, 3 = 0-5</p>
                    @error('score')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-3 mt-6">
                    <button type="button" onclick="closeModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg transition-colors text-sm font-medium">Batal</button>
                    <button type="submit" class="bg-gray-900 hover:bg-gray-800 text-white px-5 py-2.5 rounded-lg transition-colors text-sm font-medium shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(action, id = null, kategori = '', range = '', score = '') {
        const modal = document.getElementById('kuotaModal');
        const title = document.getElementById('modalTitle');
        const form = document.getElementById('kuotaForm');
        const methodContainer = document.getElementById('methodContainer');
        const kategoriInput = document.getElementById('kuotaKategori');
        const rangeInput = document.getElementById('kuotaRange');
        const scoreInput = document.getElementById('kuotaScore');
        
        if (action === 'create') {
            title.textContent = 'Tambah Kuota Bimbingan';
            form.action = "{{ route('kuota-bimbingan.store') }}";
            methodContainer.innerHTML = '';
            kategoriInput.value = '';
            rangeInput.value = '';
            scoreInput.value = '';
        } else if (action === 'edit') {
            title.textContent = 'Edit Kuota Bimbingan';
            form.action = `/kuota-bimbingan/${id}`;
            methodContainer.innerHTML = '@method("PUT")';
            kategoriInput.value = kategori;
            rangeInput.value = range;
            scoreInput.value = score;
        }
        
        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('kuotaModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('kuotaModal');
        const modalContent = document.querySelector('#kuotaModal > div');
        if (modal && modalContent) {
            modal.addEventListener('mousedown', function(e) {
                if (!modalContent.contains(e.target)) {
                    closeModal();
                }
            });
        }
    });
</script>
@endsection