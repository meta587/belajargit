@extends('layouts.app')

@section('title', 'Create New - Employee page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New - Employe page</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="{{ route('admin.employee.store') }}" method="POST">
                    @csrf

                    <div class="card-header">
                        <h5 class="card-title">Create New Employe</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" name="nip" id="nip" value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror">
                        
                        @error('nip')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                        
                        @error('nama')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                        
                        @error('jabatan')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <span cllass="fa fa-save"></span>
                            Save
                        </button>

                        <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">
                            <span cllass="fa fa-cancel"></span>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection