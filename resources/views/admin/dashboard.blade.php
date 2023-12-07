@extends('admin.layouts.main')

@php
    use Carbon\Carbon;
    $now = Carbon::now();
@endphp

@section('container')
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="me-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard</h1>
                <div class="small">
                    <span class="fw-500 text-primary">{{ $now->format('D') }}</span>
                    · {{ $now->format('F d, Y') }} · {{ $now->format('g:i A') }}
                </div>
            </div>
        </div>
        <!-- Illustration dashboard card example-->
        <div class="card card-waves mb-4 mt-5">
            <div class="card-body p-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <h2 class="text-primary">Selamat Datang, {{ Auth::user()->nama }}!</h2>
                        <p class="text-gray-700">Selamat datang di tempat kerja! Semoga hari ini menjadi hari yang produktif dan sukses bagi Anda. </p>
                        <a class="btn btn-primary p-3" href="{{ route('transaction.index') }}">
                            Transaksi
                            <i class="ms-1" data-feather="arrow-right"></i>
                        </a>
                    </div>
                    <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="{{ ('templates/sb-admin-pro/assets/img/illustrations/statistics.svg') }}" /></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-start-lg border-start-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-primary mb-1">Jumlah Order (perbulan)</div>
                                <div class="h5">{{ $order }}</div>
                            </div>
                            <div class="ms-2"><i class="fas fa-hand-holding-hand fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-start-lg border-start-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-info mb-1">Jumlah Menu</div>
                                <div class="h5">{{ count($menu) }}</div>
                            </div>
                            <div class="ms-2"><i class="fas fa-bars fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-start-lg border-start-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-success mb-1">Pendapatan (perbulan)</div>
                                <div class="h5">{{ $pendapatan }}</div>
                            </div>
                            <div class="ms-2"><i class="fas fa-sack-dollar fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card mb-4">
                    <div class="card-body text-center p-5">
                        <h6 class="mb-5">Produk Terlaris Bulan Ini</h6>
                        @if ($terlaris == null)
                            <img class="img-fluid mb-5" src="{{ ('templates/sb-admin-pro/assets/img/illustrations/data-report.svg') }}" />
                            <h4>Tidak Ada</h4>
                            <p class="mb-4">Tidak ada barang terlaris saat ini</p>
                        @else
                            <img class="img-fluid mb-5" src="{{ ('templates/sb-admin-pro/assets/img/illustrations/data-report.svg') }}" />
                            <h4>{{ $terlaris->nama_menu }}</h4>
                            <p class="mb-4">Produk terlaris pada bulan ini adalah {{ $terlaris->nama_menu }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4">
                <!-- Area chart example-->
                <div class="card mb-4">
                    <div class="card-header">Pendapatan perbulan</div>
                    <div class="card-body">
                        <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-6">
                        <!-- Bar chart example-->
                        <div class="card h-100">
                            <div class="card-header">Sales Reporting</div>
                            <div class="card-body d-flex flex-column justify-content-center">
                                <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                            </div>
                            <div class="card-footer position-relative">
                                <a class="stretched-link" href="#!">
                                    <div class="text-xs d-flex align-items-center justify-content-between">
                                        View More Reports
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Pie chart example-->
                        <div class="card h-100">
                            <div class="card-header">Traffic Sources</div>
                            <div class="card-body">
                                <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                        <div class="me-3">
                                            <i class="fas fa-circle fa-sm me-1 text-blue"></i>
                                            Direct
                                        </div>
                                        <div class="fw-500 text-dark">55%</div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                        <div class="me-3">
                                            <i class="fas fa-circle fa-sm me-1 text-purple"></i>
                                            Social
                                        </div>
                                        <div class="fw-500 text-dark">15%</div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                        <div class="me-3">
                                            <i class="fas fa-circle fa-sm me-1 text-green"></i>
                                            Referral
                                        </div>
                                        <div class="fw-500 text-dark">30%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
@endsection
