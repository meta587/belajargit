@extends('layouts.app')

@section('title', 'Detail page')

@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail page</h1>
    </div>

    <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{ $users->id }}</td>
            </tr>
            <tr>
                <th width="200px">Name</th>
                <td>{{ $users->name }}</td>
            </tr>
            <tr>
                <th width="200px">Email</th>
                <td>{{ $users->email }}</td>
            </tr>
            
            <tr>
                <th width="200px">Terdaftar Pada</th>
                <td>{{ \Carbon\Carbon::parse($users->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
            </tr>
            <tr>
                <th width="200px">Diperbarui Pada</th>
                <td>{{ \Carbon\Carbon::parse($users->updated_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
            </tr>
        </table>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.admin.index') }}" class="btn btn-primary">Kembali</a>
            <a href="" class="btn btn-secondary">Edit</a>
            <a href="" class="btn btn-danger">Hapus</a>
        </div>
    </div>
@endsection