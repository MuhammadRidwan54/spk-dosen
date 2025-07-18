@extends('layouts.app')

@section('title', 'Daftar Dosen - SPK Dosen')
@section('header-title', 'Daftar Dosen')
@section('header-description', 'Kelola data dosen beserta kriterianya')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-5 lg:p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
            <h1 class="text-xl lg:text-2xl font-bold text-gray-900 tracking-tight">Daftar Dosen</h1>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                <button onclick="openModal('create')" class="bg-gray-900 hover:bg-gray-800 text-white px-4 lg:px-5 py-2 rounded-lg flex items-center justify-center space-x-2 shadow-md transition-all duration-200 text-sm lg:text-base font-medium">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Tambah Dosen</span>
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative mb-6 text-sm" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Search Input -->
        <div class="mb-6">
            <div class="relative max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="searchInput" placeholder="Cari berdasarkan nama dosen..."
                    class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ request('search') }}">
                @if(request('search'))
                    <button type="button" onclick="clearSearch()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i class="fas fa-times text-gray-400 hover:text-gray-600"></i>
                    </button>
                @endif
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-100">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendidikan</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kuota</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($dosen as $index => $d)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $d->nama }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $d->nik }}</td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-600">
                            {{ $d->pendidikanTerakhir->pendidikan }} (Score: {{ $d->pendidikanTerakhir->score }})
                        </td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-600">
                            {{ $d->jabatanFungsional->jabatan }} (Score: {{ $d->jabatanFungsional->score }})
                        </td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm text-gray-600">
                            {{ $d->kuotaBimbingan->kategori }} (Score: {{ $d->kuotaBimbingan->score }})
                        </td>
                        <td class="px-4 lg:px-6 py-3.5 whitespace-nowrap text-sm font-medium space-x-3">
                            <button onclick="openModal('edit', {{ $d->id_dosen }}, '{{ $d->nama }}', '{{ $d->nik }}', {{ $d->pendidikan_terakhir_id }}, {{ $d->jabatan_fungsional_id }}, {{ $d->kuota_bimbingan_id }})" 
                                class="text-gray-600 hover:text-gray-900 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <form action="{{ route('dosen.destroy', $d->id_dosen) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data dosen ini?')" 
                                    class="text-red-600 hover:text-red-800 transition-colors duration-200 p-1 rounded-md hover:bg-red-50">
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
<div id="dosenModal" class="fixed inset-0 bg-gray-800 bg-opacity-60 hidden flex items-center justify-center p-4 z-50">
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden transform transition-all sm:my-8 sm:w-full">
        <div class="p-5 lg:p-6">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg lg:text-xl font-semibold text-gray-900" id="modalTitle">Tambah Dosen</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <form id="dosenForm" method="POST">
                @csrf
                <div id="methodContainer"></div>
                
                <div class="mb-5">
                    <label for="dosenNama" class="block text-gray-700 text-sm font-medium mb-2">Nama Dosen</label>
                    <input type="text" name="nama" id="dosenNama" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 placeholder-gray-400 transition-colors duration-200" placeholder="Masukkan nama dosen" required>
                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="dosenNik" class="block text-gray-700 text-sm font-medium mb-2">NIK</label>
                    <input type="text" name="nik" id="dosenNik" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 placeholder-gray-400 transition-colors duration-200" placeholder="Masukkan NIK" required>
                    @error('nik')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="dosenPendidikan" class="block text-gray-700 text-sm font-medium mb-2">Pendidikan Terakhir</label>
                    <select name="pendidikan_terakhir_id" id="dosenPendidikan" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 transition-colors duration-200" required>
                        <option value="">Pilih Pendidikan</option>
                        @foreach($pendidikan as $p)
                            <option value="{{ $p->id }}">{{ $p->pendidikan }} (Score: {{ $p->score }})</option>
                        @endforeach
                    </select>
                    @error('pendidikan_terakhir_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="dosenJabatan" class="block text-gray-700 text-sm font-medium mb-2">Jabatan Fungsional</label>
                    <select name="jabatan_fungsional_id" id="dosenJabatan" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 transition-colors duration-200" required>
                        <option value="">Pilih Jabatan</option>
                        @foreach($jabatan as $j)
                            <option value="{{ $j->id }}">{{ $j->jabatan }} (Score: {{ $j->score }})</option>
                        @endforeach
                    </select>
                    @error('jabatan_fungsional_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="dosenKuota" class="block text-gray-700 text-sm font-medium mb-2">Kuota Bimbingan</label>
                    <select name="kuota_bimbingan_id" id="dosenKuota" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 text-sm text-gray-800 transition-colors duration-200" required>
                        <option value="">Pilih Kuota</option>
                        @foreach($kuota as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->kategori }} ({{ $k->range }}) - Score: {{ $k->score }}
                            </option>
                        @endforeach
                    </select>
                    @error('kuota_bimbingan_id')
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
    // Search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        let searchTimer;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                performSearch(searchInput.value.trim());
            }, 500);
        });

        window.clearSearch = function() {
            searchInput.value = '';
            performSearch('');
        };
    });

    function performSearch(searchTerm) {
        const url = new URL(window.location.href);
        if (searchTerm) {
            url.searchParams.set('search', searchTerm);
        } else {
            url.searchParams.delete('search');
        }

        fetch(url.pathname + '?' + url.searchParams.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newTableBody = doc.querySelector('tbody');
            document.querySelector('tbody').innerHTML = newTableBody.innerHTML;
        })
        .catch(error => console.error('Error:', error));
    }

    function openModal(action, id = null, nama = '', nik = '', pendidikanId = '', jabatanId = '', kuotaId = '') {
        const modal = document.getElementById('dosenModal');
        const title = document.getElementById('modalTitle');
        const form = document.getElementById('dosenForm');
        const methodContainer = document.getElementById('methodContainer');
        const namaInput = document.getElementById('dosenNama');
        const nikInput = document.getElementById('dosenNik');
        const pendidikanInput = document.getElementById('dosenPendidikan');
        const jabatanInput = document.getElementById('dosenJabatan');
        const kuotaInput = document.getElementById('dosenKuota');
        
        if (action === 'create') {
            title.textContent = 'Tambah Dosen';
            form.action = "{{ route('dosen.store') }}";
            methodContainer.innerHTML = '';
            namaInput.value = '';
            nikInput.value = '';
            pendidikanInput.value = '';
            jabatanInput.value = '';
            kuotaInput.value = '';
        } else if (action === 'edit') {
            title.textContent = 'Edit Dosen';
            form.action = `/dosen/${id}`;
            methodContainer.innerHTML = '@method("PUT")';
            namaInput.value = nama;
            nikInput.value = nik;
            pendidikanInput.value = pendidikanId;
            jabatanInput.value = jabatanId;
            kuotaInput.value = kuotaId;
        }
        
        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('dosenModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('dosenModal');
        const modalContent = document.querySelector('#dosenModal > div');
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