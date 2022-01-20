@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Struktur Organisasi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('organizationalstructure.index', []) }}">Struktur Organisasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Struktur Organisasi</h6>
                    </div>
                    <div class="card-body">
                        <!-- Horizontal Form -->
                        <form action="{{ route('organizationalstructure.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="employee" class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <select name="employee" id="employee"
                                        class="form-control @error('employee') is-invalid @enderror">
                                        <option value="">- Pilih Pegawai -</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                {{ old('employee') == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('employee')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="boss" class="col-sm-3 col-form-label">Atasan</label>
                                <div class="col-sm-9">
                                    <select name="boss" id="boss" class="form-control @error('boss') is-invalid @enderror">
                                        <option value="">- Pilih Atasan -</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                {{ old('employee') == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->position->name . ' - ' . $employee->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('boss')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
