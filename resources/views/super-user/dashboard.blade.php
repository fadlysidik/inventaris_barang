@extends('layout.su')

@section('content')
<main class="p-10 bg-gradient-to-r from-gray-200 via-gray-100 to-gray-300 min-h-screen flex flex-col items-center">

    <!-- Header -->
    <div class="mb-10">
        <h1 class="text-5xl font-extrabold text-red-800">📊 System Inventaris</h1>
    </div>

    <!-- Container Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">

        <!-- Statistik Kiri -->
        <div class="space-y-6">
            <!-- Total Barang -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-8 shadow-lg rounded-lg transform hover:scale-105 transition-all duration-300">
                <div class="space-y-3 text-center">
                    <h3 class="text-3xl font-bold">Jumlah Barang</h3>
                    <p class="text-6xl font-extrabold">{{ $jumlahBarang }}</p>
                </div>
            </div>

            <!-- Total Peminjaman -->
            <div class="bg-gradient-to-r from-green-500 to-green-700 text-white p-8 shadow-lg rounded-lg transform hover:scale-105 transition-all duration-300">
                <div class="space-y-3 text-center">
                    <h3 class="text-3xl font-bold">Jumlah Peminjaman</h3>
                    <p class="text-6xl font-extrabold">{{ $jumlahPeminjaman }}</p>
                </div>
            </div>
        </div>

        <!-- Grafik Peminjaman -->
        <div class="bg-white p-8 shadow-lg rounded-lg flex flex-col items-center justify-center col-span-1 md:col-span-1 lg:col-span-2">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Grafik Peminjaman</h3>
            <div class="relative w-full" style="height: 320px;">
                <canvas id="loanChart"></canvas>
            </div>
        </div>

    </div>
</main>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('loanChart').getContext('2d');
    const dataGrafik = @json($dataGrafik);

    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
    gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: dataGrafik,
                borderColor: '#1E40AF',
                backgroundColor: gradient,
                borderWidth: 3,
                tension: 0.4,
                pointBackgroundColor: '#1E40AF',
                pointRadius: 5,
                pointHoverRadius: 8,
                pointBorderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: { font: { size: 14, weight: 'bold' }, color: '#374151' }
                },
                tooltip: {
                    backgroundColor: '#1E293B',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    cornerRadius: 8
                }
            },
            scales: {
                x: { 
                    ticks: { color: '#374151', font: { size: 12 } }, 
                    grid: { color: 'rgba(209, 213, 219, 0.3)' } 
                },
                y: { 
                    beginAtZero: true, 
                    ticks: { color: '#374151', font: { size: 12 } }, 
                    grid: { color: 'rgba(209, 213, 219, 0.3)' } 
                }
            }
        }
    });
</script>
@endpush
