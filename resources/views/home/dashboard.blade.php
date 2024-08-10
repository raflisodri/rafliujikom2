@extends('layout.master')
@section('content')
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">

            <h3 class="mb-0"> Hi, {{ Auth()->User()->name }} welcome back! <span
                    class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
            </h3>
            @if (session('success'))
                <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Selamat
                    datang!!</div>
            @endif
        </div>
        <div class="row">

            <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-warning">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Jumlah Transaksi</p>
                                        <h4 class="text-white">
                                            @if ($total_minggu->totalprices == null)
                                                0
                                            @else
                                                Rp. {{ number_format($total_minggu->totalprices, 0, '.', '.') }}
                                            @endif

                                            <span class="h5"></span>
                                        </h4>
                                    </div>
                                    <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                                </div>

                                <h6 class="text-white">Penhasilan (7) Hari Kebelakang</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                        <div class="card bg-danger">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Jumlah Sepatu</p>
                                        <h2 class="text-white"> {{ $jumlah_sepatu }}<span class="h5"></span>
                                        </h2>
                                    </div>
                                    <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                                </div>
                                <h6 class="text-white">Jumlah Seluruh Sepatu</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                        <div class="card bg-primary">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Jumlah User</p>
                                        <h2 class="text-white">{{ $jumlah_user }}<span class="h5"></span>
                                        </h2>
                                    </div>
                                    <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                                </div>
                                <h6 class="text-white">Jumlah user Kasir dan Admin</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                        <div class="card bg-success">
                            <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="color-card">
                                        <p class="mb-0 color-card-head">Member</p>
                                        <h2 class="text-white">{{ $jumlah_member }}</h2>
                                    </div>
                                    <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                                </div>
                                <h6 class="text-white">Jumlah Member Aktif</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3>History</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Kasir</th>
                                    <th>Member</th>
                                    <th>Tanggal</th>
                                    <th>Sepatu</th>
                                    <th>Sub Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->User->name }}</td>
                                        <td>{{ $u->Member->nama }}</td>
                                        <td>{{ $u->tanggal }}</td>
                                        <td>
                                            <a href="#" class="show-detail" data-toggle="modal"
                                                data-target="#detailModal" data-id="{{ $u->id }}">
                                                {{ $u->detailTransaksi->count() }} Sepatu
                                            </a>
                                        </td>
                                        <td>Rp.{{ number_format($u->sub_total, 0, '.', '.') }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Filter Tahun
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('dashboard.index') }}">
                    <label for="year">Select Year:</label>
                    <select name="year" id="year" onchange="this.form.submit()">
                        @for ($i = Carbon\Carbon::now()->year; $i >= 2000; $i--)
                            <option value="{{ $i }}" {{ $i == $selectedYear ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </form>
            </div>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Chart Penjualan ({{ $selectedYear }})</h3>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-6">

                <div class="card">
                    <div class="card-header">
                        <h3>Top Sepatu Paling Banyak Dibeli ({{ $selectedYear }})</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="max-width: 300px; max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Top Member Paling Banyak Melakukan Transaksi ({{ $selectedYear }})</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="max-width: 300px; max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Merk Sepatu</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="detail-table-body">
                                <!-- Detail transaksi akan dimuat di sini melalui AJAX -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load detail transaksi ketika user mengklik link
            document.querySelectorAll('.show-detail').forEach(function(element) {
                element.addEventListener('click', function() {
                    const transaksiId = this.getAttribute('data-id');

                    // Lakukan request AJAX untuk mendapatkan detail transaksi
                    fetch(`/transaksi/detail/${transaksiId}`)
                        .then(response => response.json())
                        .then(data => {
                            const detailTableBody = document.getElementById(
                                'detail-table-body');
                            detailTableBody.innerHTML =
                                ''; // Kosongkan isi modal terlebih dahulu

                            data.forEach(detail => {
                                const row = `
                                    <tr>
                                        <td>${detail.merk} - ${detail.nama}</td>
                                        <td>Rp. ${detail.harga_satuan.toLocaleString()}</td>
                                        <td>${detail.jumlah}</td>
                                        <td>Rp. ${detail.total.toLocaleString()}</td>
                                    </tr>
                                `;
                                detailTableBody.insertAdjacentHTML('beforeend', row);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });

        var ctx = document.getElementById('monthlyChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'Total Sales (Rp)',
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
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

        var ctxDonut = document.getElementById('donutChart').getContext('2d');
        var donutChart = new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($donutChartData['labels']) !!},
                datasets: [{
                    label: 'Total Sepatu Terjual',
                    data: {!! json_encode($donutChartData['data']) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';

                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += new Intl.NumberFormat().format(context.parsed);
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: {!! json_encode($pieChartData['labels']) !!},
                datasets: [{
                    label: 'Total Transactions',
                    data: {!! json_encode($pieChartData['data']) !!},
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';

                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += new Intl.NumberFormat().format(context.parsed);
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
