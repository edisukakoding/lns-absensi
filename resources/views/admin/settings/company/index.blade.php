@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan Kelurahan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                <li class="breadcrumb-item">Setting</li>
                <li class="breadcrumb-item active" aria-current="page">Kelurahan</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">Profil Kelurahan</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="uid">UID</label>
                                <input type="text" class="form-control @error('uid') is-invalid @enderror" id="uid"
                                    name="uid" value="{{ old('uid', $company->uid) }}" readonly>
                                @error('uid')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $company->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <input type="text" class="form-control @error('visi') is-invalid @enderror" id="visi"
                                    name="visi" value="{{ old('visi', $company->visi) }}">
                                @error('visi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="visi_desc">Deskripsi Visi</label>
                                <textarea name="visi_desc" class="editor"
                                    id="visi_desc">{{ old('visi_desc', $company->visi_desc) }}</textarea>
                                @error('visi_desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="misi">Deskripsi Visi</label>
                                <textarea name="misi" class="editor"
                                    id="misi">{{ old('misi', $company->misi) }}</textarea>
                                @error('misi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" name="location" value="{{ old('location', $company->location) }}">
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email', $company->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telepon</label>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone" value="{{ old('telephone', $company->telephone) }}">
                                @error('telephone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="map">Map</label>
                                <input type="text" class="form-control @error('map') is-invalid @enderror" id="map"
                                    name="map" value="{{ old('map', $company->map) }}">
                                <small id="emailHelp" class="form-text text-muted">diambil dari google map -> share ->
                                    embeded</small>
                                @error('map')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="logo">Logo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                                                id="logo" name="logo" value="{{ old('logo', $company->logo) }}">
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                        </div>
                                        @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}"
                                            class="img-thumbnail" style="height: 80px; cursor: pointer" data-toggle="modal"
                                            data-target="#modal-logo">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="background">Background Profil</label>
                                        <div class="input-group @error('background') is-invalid @enderror">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('background') is-invalid @enderror"
                                                    id="background" name="background"
                                                    value="{{ old('background', $company->background) }}">
                                                <label class="custom-file-label" for="background">Choose file</label>
                                            </div>
                                        </div>
                                        @error('background')
                                            <div class="invalid-feedback position-absolute" style="top: 70px; z-index: 1; display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ Storage::url($company->background) }}" alt="{{ $company->name }}"
                                            class="img-thumbnail" style="height: 80px; cursor: pointer" data-toggle="modal"
                                            data-target="#modal-background">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
        <div class="modal fade" id="modal-logo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}">
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-background" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <img src="{{ Storage::url($company->background) }}" alt="{{ $company->name }}">
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection

@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 200px;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            ClassicEditor
                .create(document.getElementById('visi_desc'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.getElementById('misi'))
                .catch(error => {
                    console.error(error);
                });
        })
    </script>
@endpush
