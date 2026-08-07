@extends('layouts.app')

@section('title', 'Detail Employe page')

@section('content')
<div class="container py 4">
    <h1>Detail Employee</h1>
     
    <table class="table table-bordered">
        <tr>
            <th>NIP</th>
            <th>{{ $employee->nip }}</th>
        </tr>
        <tr>
            <th>Nama</th>
            <th>{{ $employee->nama }}</th>
        </tr>
        <tr>
            <th>Jabatan</th>
            <th>{{ $employee->jabatan }}</th>
        </tr>
    </table>

    <a href="{{ route('admin.employee.index', $employee->id) }}" class="btn btn-primary mb-3">Back</a>
</div>
@endsection