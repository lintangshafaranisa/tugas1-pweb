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
    <div class="bg-white p-4 rounded shadow mb-4">

        <h2 class="text-xl font-bold mb-2">
            Cuaca Surabaya
        </h2>
        <p>
            Suhu:
            <span id="temp"></span> 37°C
        </p>

        <p>
            Cuaca:
            <span id="desc">Panas Terik</span>
        </p>
    </div>
    <div class="bg-white p-4 rounded shadow">

        <h2 class="text-xl font-bold mb-3">
            Statistik Kunjungan
        </h2>

        <p>
            Jumlah Kunjungan:
            {{ $count }}
        </p>

        <p>
            Kunjungan Pertama:
            {{ $first }}
        </p>

        <p>
            Kunjungan Terakhir:
            {{ $last }}
        </p>

        <a href="/reset-visit" class="btn btn-danger mt-3">

            Reset Hitungan

        </a>

    </div>
@endsection

@push('scripts')
    <script>
        console.log('Dashboard statistik jalan');

        async function getWeather() {

            try {

                const response = await fetch(
                    'https://wttr.in/Surabaya?format=j1'
                );

                const data = await response.json();

                document.getElementById('weather-loading')
                    .style.display = 'none';

                document.getElementById('weather-data')
                    .classList.remove('hidden');

                document.getElementById('city')
                    .innerText = 'Surabaya';

                document.getElementById('temp')
                    .innerText =
                    data.current_condition[0].temp_C;

                document.getElementById('desc')
                    .innerText =
                    data.current_condition[0]
                    .weatherDesc[0].value;

            } catch (error) {

                document.getElementById('weather-loading')
                    .innerText = 'Gagal mengambil data cuaca';

                console.log(error);

            }

        }

        getWeather();
    </script>
@endpush
