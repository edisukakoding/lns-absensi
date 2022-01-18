@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                {{-- <li class="breadcrumb-item">Karyawan</li> --}}
                <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
            </ol>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Jumlah Penduduk</h6>
                        <a href="{{ route('population.create') }}" class="btn btn-primary">Tambah Jumlah Penduduk</a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="population-table"
                            style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tahun</th>
                                    <th>Pria</th>
                                    <th>Wanita</th>
                                    <th>Anak anak</th>
                                    <th>Bayi</th>
                                    <th>Total</th>
                                    <th>Actions</th>
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
            let table = $('#population-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: `{{ route('population.index') }}`,
                columns: [{
                        data: 'year',
                        name: 'year'
                    },
                    {
                        data: 'man',
                        name: 'man'
                    },
                    {
                        data: 'woman',
                        name: 'woman'
                    },
                    {
                        data: 'child',
                        name: 'child'
                    },
                    {
                        data: 'baby',
                        name: 'baby'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

            $(document).on('click', function(e) {
                if ($(e.target).hasClass('btn-delete')) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#6777ef',
                        cancelButtonColor: '#fc544b',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        let id = $(e.target).data('id');
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `{{ url('admin/population') }}/${id}`,
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(res) {
                                    if (res) {
                                        Swal.fire(
                                            'Deleted!',
                                            'data has been deleted.',
                                            'success'
                                        )
                                    }

                                    table.ajax.reload();
                                }
                            })
                        }
                    })
                }
            })
        });
    </script>
@endpush