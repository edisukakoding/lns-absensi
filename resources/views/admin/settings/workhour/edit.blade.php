@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jam Kerja</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('workhours.index', []) }}">Jam Kerja</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Jabatan</h6>
                    </div>
                    <div class="card-body">
                        <!-- Horizontal Form -->
                        <form action="{{ route('workhours.update', $workhour->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="in" class="col-sm-6 col-form-label">Jam Berangkat</label>
                                <div class="col-sm-6">
                                    <input type="time" class="form-control @error('in') is-invalid @enderror" id="in"
                                        placeholder="Jam Berangkat" name="in" value="{{ old('in', $workhour->in) }}">
                                    @error('in')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="out" class="col-sm-6 col-form-label">Jam Pulang</label>
                                <div class="col-sm-6">
                                    <input type="time" class="form-control @error('out') is-invalid @enderror" id="out"
                                        placeholder="Jam Pulang" name="out" value="{{ old('out', $workhour->out) }}">
                                    @error('out')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="break" class="col-sm-6 col-form-label">Jam Istirahat</label>
                                <div class="col-sm-6">
                                    <input type="time" class="form-control @error('break') is-invalid @enderror" id="break"
                                        placeholder="Jam Pulang" name="break"
                                        value="{{ old('break', $workhour->break) }}">
                                    @error('break')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">Active</div>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="status"
                                            {{ $workhour->status == 'ACTIVE' ? 'checked' : '' }} name="status">
                                        <label class="custom-control-label" for="status">centang untuk mengaktifkan
                                            pengaturan jam kerja</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->
@endsection
