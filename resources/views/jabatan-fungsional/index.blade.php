@extends('layouts.app')

@section('title', 'Daftar Jabatan Fungsional - SPK Dosen')
@section('header-title', 'Daftar Jabatan Fungsional')
@section('header-description', 'Kelola daftar jabatan fungsional beserta score-nya')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-5 lg:p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
            <h1 class="text-xl lg:text-2xl font-bold text-gray-900 tracking-tight">Daftar Jabatan Fungsional</h1>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                <button onclick="openModal('create')" class="bg-gray-900 hover:bg-gray-800 text-white px-4 lg:px-5 py-2 rounded-lg flex items-center justify-center space-x-2 shadow-md transition-all duration-200 text-sm lg:text-base font-medium">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Tambah Jabatan</span>
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
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($jabatan as $index => $j)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $j->jabatan }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $j->score }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-500">
                            @if($j->score == 1) Asisten Ahli
                            @elseif($j->score == 2) Lektor
                            @elseif($j->score == 3) Lektor Kepala
                            @endif
                        </td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium space-x-3">
                            <button onclick="openModal('edit', {{ $j->id }}, '{{ $j->jabatan }}', {{ $j->score }})" class="text-gray-600 hover:text-gray-900 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <form action="{{ route('jabatan-fungsional.destroy', $j->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?')" class="text-red-600 hover:text-red-800 transition-colors duration-200 p-1 rounded-md hover:bg-red-50">
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
<div id="jabatanModal" class="fixed inset-0 bg-gray-800 bg-opacity-60 hidden flex items-center justify-center p-4 z-50">
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden transform transition-all sm:my-8 sm:w-full">
        <div class="p-5 lg:p-6">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg lg:text-xl font-semibold text-gray-900" id="modalTitle">Tambah Jabatan Fungsional</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <form id="jabatanForm" method="POST">
                @csrf
                <div id="methodContainer"></div>
                
                <div class="mb-5">
                    <label for="jabatanName" class="block text-gray-700 text-sm font-medium mb-2">Nama Jabatan</label>
                    <input type="text" name="jabatan" id="jabatanName" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 placeholder-gray-400 transition-colors duration-200" placeholder="Masukkan nama jabatan" required>
                    @error('jabatan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="jabatanScore" class="block text-gray-700 text-sm font-medium mb-2">Score</label>
                    <select name="score" id="jabatanScore" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 transition-colors duration-200" required>
                        <option value="">Pilih Score</option>
                        <option value="1">1 - Asisten Ahli</option>
                        <option value="2">2 - Lektor</option>
                        <option value="3">3 - Lektor Kepala</option>
                    </select>
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
    function openModal(action, id = null, jabatan = '', score = '') {
        const modal = document.getElementById('jabatanModal');
        const title = document.getElementById('modalTitle');
        const form = document.getElementById('jabatanForm');
        const methodContainer = document.getElementById('methodContainer');
        const jabatanInput = document.getElementById('jabatanName');
        const scoreInput = document.getElementById('jabatanScore');
        
        if (action === 'create') {
            title.textContent = 'Tambah Jabatan Fungsional';
            form.action = "{{ route('jabatan-fungsional.store') }}";
            methodContainer.innerHTML = '';
            jabatanInput.value = '';
            scoreInput.value = '';
        } else if (action === 'edit') {
            title.textContent = 'Edit Jabatan Fungsional';
            form.action = `/jabatan-fungsional/${id}`;
            methodContainer.innerHTML = '@method("PUT")';
            jabatanInput.value = jabatan;
            scoreInput.value = score;
        }
        
        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('jabatanModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('jabatanModal');
        const modalContent = document.querySelector('#jabatanModal > div');
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