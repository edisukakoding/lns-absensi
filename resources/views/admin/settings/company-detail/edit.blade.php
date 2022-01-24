@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konten Profil</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard', []) }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('companydetail.index', []) }}">Konten Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Konten Profil</h6>
                    </div>
                    <div class="card-body">
                        <!-- Horizontal Form -->
                        <form action="{{ route('companydetail.update', $companydetail->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="type">Tipe</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="CONTENT" {{$companydetail->type == 'CONTENT' ? 'selected' : ''}}>CONTENT</option>
                                    <option value="HEADLINE" {{$companydetail->type == 'HEADLINE' ? 'selected' : ''}}>HEADLINE</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="company_id">Kelurahan</label>
                                <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{$companydetail->company_id == $company->id ? 'selected' : ''}}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Judul" name="title" value="{{ old('title', $companydetail->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Isi</label>
                                <textarea name="content" id="content" class="editor">{{ old('content', $companydetail->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Cover</label>
                                <div class="input-group @error('image') is-invalid @enderror">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror"
                                            id="image" name="image"
                                            value="{{ old('image') }}">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback position-absolute"
                                        style="top: 70px; z-index: 1; display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
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

    </div>
    <!---Container Fluid-->
@endsection

@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            ClassicEditor
                .create(document.querySelector('.editor'))
                .catch(error => {
                    console.error(error);
                });
        })
    </script>
@endpush
