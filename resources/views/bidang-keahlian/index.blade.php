@extends('layouts.app')

@section('title', 'Daftar Bidang Keahlian - SPK Dosen')
@section('header-title', 'Daftar Bidang Keahlian')
@section('header-description', 'Kelola daftar bidang keahlian yang tersedia')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-5 lg:p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
            <h1 class="text-xl lg:text-2xl font-bold text-gray-900 tracking-tight">Daftar Bidang Keahlian</h1>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                <button onclick="openModal('create')" class="bg-gray-900 hover:bg-gray-800 text-white px-4 lg:px-5 py-2 rounded-lg flex items-center justify-center space-x-2 shadow-md transition-all duration-200 text-sm lg:text-base font-medium">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Tambah Bidang Keahlian</span>
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
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bidang Keahlian</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($bidangKeahlian as $index => $bidang)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $bidang->bidang }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium space-x-3">
                            <button onclick="openModal('edit', {{ $bidang->id_bidang_keahlian }}, '{{ $bidang->bidang }}')" class="text-gray-600 hover:text-gray-900 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <form action="{{ route('bidang-keahlian.destroy', $bidang->id_bidang_keahlian) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus bidang keahlian ini?')" class="text-red-600 hover:text-red-800 transition-colors duration-200 p-1 rounded-md hover:bg-red-50">
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
<div id="bidangModal" class="fixed inset-0 bg-gray-800 bg-opacity-60 hidden flex items-center justify-center p-4 z-50">
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden transform transition-all sm:my-8 sm:w-full">
        <div class="p-5 lg:p-6">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg lg:text-xl font-semibold text-gray-900" id="modalTitle">Tambah Bidang Keahlian</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <form id="bidangForm" method="POST">
                @csrf
                <div id="methodContainer"></div>
                
                <div class="mb-5">
                    <label for="bidangName" class="block text-gray-700 text-sm font-medium mb-2">Nama Bidang Keahlian</label>
                    <input type="text" name="bidang" id="bidangName" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 placeholder-gray-400 transition-colors duration-200" placeholder="Masukkan nama bidang keahlian" required>
                    @error('bidang')
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
    function openModal(action, id = null, name = '') {
        const modal = document.getElementById('bidangModal');
        const title = document.getElementById('modalTitle');
        const form = document.getElementById('bidangForm');
        const methodContainer = document.getElementById('methodContainer');
        const nameInput = document.getElementById('bidangName');
        
        if (action === 'create') {
            title.textContent = 'Tambah Bidang Keahlian';
            form.action = "{{ route('bidang-keahlian.store') }}";
            methodContainer.innerHTML = '';
            nameInput.value = '';
        } else if (action === 'edit') {
            title.textContent = 'Edit Bidang Keahlian';
            form.action = `/bidang-keahlian/${id}`;
            methodContainer.innerHTML = '@method("PUT")';
            nameInput.value = name;
        }
        
        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('bidangModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('bidangModal');
        const modalContent = document.querySelector('#bidangModal > div');
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