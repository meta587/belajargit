@extends('layouts.app')

@section('title', 'Edit - Employe page')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Employee page</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Employe</h4>
                </div>
                <div class="card-body">
                    
                    {{-- Menampilkan Pesan Error Validasi Jika Ada --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Input NIP --}}
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" 
                                   class="form-control @error('nip') is-invalid @enderror" 
                                   id="nip" 
                                   name="nip" 
                                   value="{{ old('nip', $employee->nip) }}" 
                                   required>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama', $employee->nama) }}" 
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Jabatan --}}
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan<small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                            <input type="text" 
                                   class="form-control @error('jabatan') is-invalid @enderror" 
                                   id="jabatan" 
                                   name="jabatan">
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update Admin</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection