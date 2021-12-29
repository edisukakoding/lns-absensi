@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jabatan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('position.index', []) }}">Jabatan</a></li>
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
                        <form action="{{ route('position.update', $position->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                              <label for="name" class="col-sm-3 col-form-label">Nama Jabatan</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama jabatan" name="name" value="{{ old('name', $position->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-3">Active</div>
                              <div class="col-sm-9">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="active" @if ($position->active == 1) checked @endif name="active">
                                  <label class="custom-control-label" for="active">centang untuk mengaktifkan jabatan</label>
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
