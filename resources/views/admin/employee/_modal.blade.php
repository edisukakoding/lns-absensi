<!-- Modal Center -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Detail pegawai {{ $employee->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        {{-- {{ dd(\Illuminate\Support\Facades\Storage::url($employee->image)) }} --}}
                        <div class="card">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($employee->image) }}"
                                class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#modal").modal('show');
</script>
