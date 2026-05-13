@extends('layouts.app')

@section('content')
    <h2>Data Layanan</h2>

    <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-3">

        Tambah Layanan

    </a>

    <table class="table">

        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>

        @foreach ($layanan as $item)
            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>

                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="80">
                    @endif

                </td>

                <td>{{ $item->nama_layanan }}</td>

                <td>Rp {{ number_format($item->harga) }}</td>

                <td>{{ $item->durasi }}</td>

                <td>

                    <a href="{{ route('layanan.show', $item->id) }}" class="btn btn-info btn-sm">

                        Detail

                    </a>

                    <a href="{{ route('layanan.edit', $item->id) }}" class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>
        @endforeach

    </table>

    {{ $layanan->links() }}
@endsection
