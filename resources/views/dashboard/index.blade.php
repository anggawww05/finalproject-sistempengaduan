@extends('layout.dashboard')

@section('content')
    <div class="wrapper w-full grid grid-cols-2 gap-[20px]">
        <div class="wrapper w-full p-4 border border-[#0d1117]/[0.12] rounded-[4px]">
            <h2 class="text-[1.5rem] font-semibold text-[#0d1117] mb-[12px]">Grafik Pengajuan Berdasarkan Kategori</h2>
            <canvas id="chartReportCategory"></canvas>
        </div>
        <div class="wrapper w-full p-4 border border-[#0d1117]/[0.12] rounded-[4px]">
            <h2 class="text-[1.5rem] font-semibold text-[#0d1117] mb-[12px]">Grafik Pengajuan Tahunan</h2>
            <canvas id="chartReportYear"></canvas>
        </div>
        <div class="wrapper w-full p-4 border border-[#0d1117]/[0.12] rounded-[4px]">
            <h2 class="text-[1.5rem] font-semibold text-[#0d1117] mb-[12px]">Grafik Pengajuan Bulan Ini</h2>
            <canvas id="chartReportMonth"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const reportCategory = @json($report_category);
        const reportYear = @json($report_year);
        const reportMonth = @json($report_month);

        const ctxCategory = document.getElementById('chartReportCategory');
        const ctxYear = document.getElementById('chartReportYear');
        const ctxMonth = document.getElementById('chartReportMonth');

        const labelsCategory = Object.keys(reportCategory);
        const dataCategory = Object.values(reportCategory);

        const labelsYear = Object.keys(reportYear);
        const dataYear = Object.values(reportYear);

        const labelsMonth = Object.keys(reportMonth);
        const dataMonth = Object.values(reportMonth);

        new Chart(ctxCategory, {
            type: 'bar',
            data: {
                labels: labelsCategory,
                datasets: [{
                    label: 'Jumlah Laporan per Kategori',
                    data: dataCategory,
                    borderWidth: 1,
                    backgroundColor: '#CA3453',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctxYear, {
            type: 'bar',
            data: {
                labels: labelsYear,
                datasets: [{
                    label: 'Jumlah Laporan per Bulan (Tahun Ini)',
                    data: dataYear,
                    borderWidth: 1,
                    backgroundColor: '#3B82F6',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctxMonth, {
            type: 'bar',
            data: {
                labels: labelsMonth,
                datasets: [{
                    label: 'Jumlah Laporan Mingguan',
                    data: dataMonth,
                    borderWidth: 1,
                    backgroundColor: '#10B981',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
