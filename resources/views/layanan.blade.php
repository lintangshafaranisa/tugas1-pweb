@extends('layouts.app')

@section('content')
    <div class="d-sm-flex justify-content-between mb-3">
        <h2>Daftar Layanan</h2>
        <button class="btn btn-primary" onclick="openModal()">Tambah Layanan</button>
    </div>

    <table border="1" width="100%" id="tableLayanan">
        <thead>
            <tr class="text-center">
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataLayanan">
            {{-- @forelse tetap dipakai --}}
            @forelse([] as $item)
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- MODAL --}}
    <div id="modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span onclick="closeModal()" style="cursor:pointer;">&times;</span>

            <h3>Tambah Layanan</h3>

            <input type="text" id="kode" placeholder="Kode" class="form-control mb-2">
            <input type="text" id="nama" placeholder="Nama" class="form-control mb-2">
            <input type="number" id="harga" placeholder="Harga" class="form-control mb-2">

            <button class="btn btn-success" onclick="simpanData()">Simpan</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let data = [{
                kode: 'LY001',
                nama: 'Hair Cut',
                harga: 50000
            },
            {
                kode: 'LY002',
                nama: 'Hair Spa',
                harga: 80000
            },
            {
                kode: 'LY003',
                nama: 'Creambath',
                harga: 70000
            },
            {
                kode: 'LY004',
                nama: 'Hair Coloring',
                harga: 150000
            },
            {
                kode: 'LY005',
                nama: 'Blow Dry',
                harga: 40000
            },
            {
                kode: 'LY006',
                nama: 'Rebonding',
                harga: 250000
            },
            {
                kode: 'LY007',
                nama: 'Smoothing',
                harga: 200000
            },
        ];

        function render() {
            let tbody = document.getElementById('dataLayanan');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="4" class="text-center">Kosong</td></tr>`;
                return;
            }

            data.forEach((item, index) => {
                tbody.innerHTML += `
            <tr class="text-center">
                <td>${item.kode}</td>
                <td>${item.nama}</td>
                <td>Rp ${item.harga}</td>
                <td>
                    <button onclick="editData(${index})">Edit</button>
                    <button onclick="hapusData(${index})">Hapus</button>
                </td>
            </tr>
        `;
            });
        }

        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function simpanData() {
            let kode = document.getElementById('kode').value;
            let nama = document.getElementById('nama').value;
            let harga = document.getElementById('harga').value;

            data.push({
                kode,
                nama,
                harga
            });
            render();
            closeModal();
        }

        function hapusData(index) {
            data.splice(index, 1);
            render();
        }

        function editData(index) {
            let item = data[index];

            document.getElementById('kode').value = item.kode;
            document.getElementById('nama').value = item.nama;
            document.getElementById('harga').value = item.harga;

            data.splice(index, 1);
            openModal();
        }

        render();
    </script>
@endpush
