@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pegawai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Employee::count() }}
                                </div>
                                {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span>Since last month</span>
                                </div> --}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pengguna</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\User::count() }}</div>
                                {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span>Since last years</span>
                                </div> --}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Terlambat ( Hari ini )
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    @php
                                        $workhour   = \App\Models\WorkHour::where('status', 'ACTIVE')->first()?->in;
                                        $terlambat  = $workhour ? \App\Models\Attendance::where('attendance_date', date('Y-m-d', time()))->where('checkin_time', '>=', $workhour)->count() : 0;
                                        echo $terlambat;
                                    @endphp
                                </div>
                                {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                    <span>Since last month</span>
                                </div> --}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                @php
                                    $people     = \App\Models\Population::orderBy('year', 'DESC')->first();
                                    $population = $people?->total ?? 0;
                                @endphp
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Penduduk ({{ $people?->year }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $population }}
                                </div>
                                {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span>Since yesterday</span>
                                </div> --}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-address-card fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($population > 0)
            <!-- Area Chart -->
            <div class="col-xl-{{ $terlambat > 0 ? '8' : '12' }} col-lg-{{ $terlambat > 0 ? '7' : '12' }}">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Penduduk / Tahun</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($terlambat > 0)
            <!-- Pie Chart -->
            <div class="col-xl-{{ $population > 0 ? '4' : '12' }} col-lg-{{ $population > 0 ? '5' : '12' }}">
                <div class="card">
                    <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Pegawai Terlambat</h6>
                    </div>
                    <div>
                        @foreach (\App\Models\Attendance::with('employee')->where('attendance_date', date('Y-m-d', time()))->where('checkin_time', '>=', \App\Models\WorkHour::where('status', 'ACTIVE')->first()?->in)->limit(5)->get() as $attendance)
                        <div class="customer-message align-items-center">
                            <a class="font-weight-bold" href="javascript:void(0)">
                                <div class="text-truncate message-title btn-show" data-id="{{$attendance->employee_id}}">{{ $attendance->employee->name }}</div>
                                <div class="small text-gray-500 message-time font-weight-bold btn-show" data-id="{{$attendance->employee_id}}">Terlambat {{ \Carbon\Carbon::createFromTimeStamp(time() - (strtotime($attendance->checkin_time) - strtotime($attendance->checkin_limit)))->diffForHumans($other = null, $absolute = true, $short = false) }}</div>
                            </a>
                        </div>
                        @if ($loop->last)
                            <div class="card-footer text-center">
                                <a class="m-0 small text-primary card-link" href="{{ route('employee.index')}}">View More <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                            
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!--Row-->
        <div id="modal-employee-wrapper"></div>
    </div>
    <!---Container Fluid-->
@endsection

@push('scripts')
    <script src="{{ asset('ruang-admin/') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('ruang-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito',
                '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function jiwa(value) {
                return `${value} jiwa`;
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: await fetch(`{{ route('population.api') }}`).then(res => res
                        .json()).then(
                        res => res.map(row => row.year)),
                    datasets: [{
                        label: "Jumlah Penduduk",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.5)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: await fetch(`{{ route('population.api') }}`).then(res => res
                            .json()).then(
                            res => res.map(row => row.total)),
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                // callback: function(value) {
                                //     return jiwa(value)
                                // }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                    '';
                                return datasetLabel + ': ' + jiwa(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });
        });

        $(document).on('click', function(e) {
            if ($(e.target).hasClass('btn-show')) {
                let id = $(e.target).data('id');
                $("#modal-employee-wrapper").load(`{{ url('admin/employee') }}/${id}`);
                
            }
        });
    </script>
@endpush
