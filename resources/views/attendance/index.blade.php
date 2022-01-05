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
                                <div class="card">
                                    <img src="data:image/png;base64,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"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text text-center" id="jam"></p>
                                        <button class="btn btn-warning btn-block">Checkin</button>
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
                        name: 'attendance_date'
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
        });
    </script>
@endpush
