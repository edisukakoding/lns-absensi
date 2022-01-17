@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('population.index', []) }}">Data Pendidik</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penduduk</h6>
                    </div>
                    <div class="card-body">
                        <!-- Horizontal Form -->
                        <form action="{{ route('population.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="year" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
                                        placeholder="Tahun" name="year" value="{{ old('year') }}">
                                    @error('year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="man" class="col-sm-3 col-form-label">Pria</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('man') is-invalid @enderror" id="man"
                                        placeholder="Pria" name="man" value="{{ old('man') }}">
                                    @error('man')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="woman" class="col-sm-3 col-form-label">Pria</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('woman') is-invalid @enderror"
                                        id="woman" placeholder="Wanita" name="woman" value="{{ old('woman') }}">
                                    @error('woman')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="child" class="col-sm-3 col-form-label">Anak Anak</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('child') is-invalid @enderror"
                                        id="child" placeholder="Anak Anak" name="child" value="{{ old('child') }}">
                                    @error('child')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="baby" class="col-sm-3 col-form-label">Bayi</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('baby') is-invalid @enderror" id="baby"
                                        placeholder="Bayi" name="baby" value="{{ old('baby') }}">
                                    @error('baby')
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
