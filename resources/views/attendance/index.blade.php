@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                {{-- <li class="breadcrumb-item">Karyawan</li> --}}
                <li class="breadcrumb-item active" aria-current="page">Absensi</li>
            </ol>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Absen</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                {{-- {{ dd(\Illuminate\Support\Facades\Storage::url($employee->image)) }} --}}
                                <div class="card">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($employee->image) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text text-center" id="jam"></p>
                                        <button class="btn btn-block {{ $last_absen ? 'btn-danger' : 'btn-warning' }}"
                                            id="btn-absen"
                                            {{ time() <= strtotime($work_hours->break) && $last_absen ? 'disabled' : '' }}>{{ $last_absen ? 'Checkout' : 'Checkin' }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $employee->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $employee->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>{{ $employee->position->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $employee->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Masih Bekerja</th>
                                        <td><span
                                                class="fas {{ $employee->active ? 'fa-check text-success' : 'fa-times text-danger' }}"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{!! $employee->address !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Absensi</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="attendance-table"
                            style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('ruang-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('ruang-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ruang-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            let table = $('#attendance-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: `{{ route('attendance.index') }}`,
                },
                columns: [{
                        data: 'attendance_date',
                        name: 'attendance_date',
                        render: function(data, type, row, meta) {
                            if (row.checkin_time > row.checkin_limit) {
                                console.log(meta)
                                $(`#${meta.settings.sTableId} tbody tr:nth-child(${meta.row+1})`)
                                    .addClass(
                                        'bg-warning text-white')
                            }
                            return moment(data).locale('id').format('LLL');
                        }
                    },
                    {
                        data: 'checkin_time',
                        name: 'checkin_time'
                    },
                    {
                        data: 'checkout_time',
                        name: 'checkout_time'
                    },
                ]
            });

            setInterval(function() {
                var date = new Date();
                $('#jam').html(
                    '[ ' + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + ' ]'
                );
            }, 1000);

            $("#btn-absen").on('click', function() {
                let btn = $(this);
                btn.attr('disabled', true).html('Loading...');

                $.ajax({
                    url: `{{ route('attendance.store') }}`,
                    type: 'POST',
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        _token: `{{ csrf_token() }}`,
                        employee_id: `{{ $employee->id }}`
                    }),
                    success: function(res) {
                        console.log(res)
                        table.ajax.reload();
                        btn
                            .attr('disabled', true)
                            .html('Checkout')
                            .removeClass('btn-warning')
                            .addClass('btn-danger')
                    }
                })
            })
        });
    </script>
@endpush
