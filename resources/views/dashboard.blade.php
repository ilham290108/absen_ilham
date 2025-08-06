@extends('layouts.main')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap');

        .overlay {
            min-height: 100vh;
            background-image: url("{{ asset('template/dist/img/smk.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .chart-container {
            width: 60%;
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        h2 {
            color: #ffffff;
            font-size: 36px;
            font-weight: 600;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
        }

        .chart-title {
            margin-top: 10px;
            color: #ffffff;
            font-size: 20px;
            font-weight: 300;
        }

        canvas {
            margin-top: 30px;
        }
    </style>

    <div class="overlay">
        <div class="chart-container">
            <h2>Dashboard Sekolah</h2>
            <div class="chart-title">Statistik Daftar Siswa dan Absensi</div>
            <canvas id="dataChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('dataChart').getContext('2d');
const dataChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jumlah Absen','Siswa Terdaftar'],
        datasets: [{
            label: 'Total',
            data: [{{ $jumlahSiswa }}, {{ $jumlahAbsen }}],
            borderColor: 'rgba(153, 102, 255, 1)',
            backgroundColor: 'rgba(153, 102, 255, 0.3)',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#fff',
            pointBorderColor: 'rgba(153, 102, 255, 1)',
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: {
                    color: '#ffffff'
                }
            }
        },
        scales: {
            x: {
                ticks: { color: '#fff' },
                grid: { color: 'rgba(255, 255, 255, 0.1)' }
            },
            y: {
                beginAtZero: true,
                ticks: { color: '#fff' },
                grid: { color: 'rgba(255, 255, 255, 0.1)' }
            }
        }
    }
});

    </script>
@endsection
