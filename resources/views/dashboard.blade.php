@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>

    @php
        $stats = [
            ['judul' => 'Total Booking Hari Ini', 'nilai' => 5, 'warna' => 'primary'],
            ['judul' => 'Total Pelanggan', 'nilai' => 12, 'warna' => 'success'],
            ['judul' => 'Total Layanan', 'nilai' => 7, 'warna' => 'warning'],
            ['judul' => 'Booking Selesai', 'nilai' => 3, 'warna' => 'info'],
            ['judul' => 'Booking Proses', 'nilai' => 2, 'warna' => 'danger'],
        ];
    @endphp

    <div class="row">
        @forelse($stats as $item)
            <x-stat-card :judul="$item['judul']" :nilai="$item['nilai']" warna="{{ $item['warna'] }}" />
        @empty
            <p>Data statistik kosong</p>
        @endforelse
    </div>
@endsection

@push('scripts')
    <script>
        console.log('Dashboard statistik jalan');
    </script>
@endpush
