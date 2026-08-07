@extends('layouts.app')

@section('title', 'Employee page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 pt-3">
        <h1 class="h3 mb-0 text-gray-800">Employee page</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data Employe</h5>
            <a href="{{ route('admin.employee.create') }}" class="btn btn-primary">
                <span class="fa fa-plus-circle mr-2"></span>
                <span>Create New</span>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $employee)
                        <tr>
                            <td>{{ $employee->nip }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td>{{ $employee->jabatan }}</td>
                            <td>
                                <a href="{{ route('admin.employee.show', $employee->id) }}" class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn btn-link p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>
                               <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST" class="d-inline" onsubmit="return">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 mx-2 text-danger" style="border: none; background: none;">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" />
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('.datatable').dataTable();

    function handleDestroy(url) {
        Swal.fire({
            title: "Apakah Anda Yakin!",
            text: "Kamu Tidak Bisa Mengembalikan Data Yang telah di hapus!"
            icon: "Warning",
            showCancelButton: "Ya Hapus",
            cancelbuttonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-destroy').attr('action', url);
                $('#form-destroy').submit();
                
            }
        });
    }
    </script>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ Session::get('success')}}",
                icon: "success",
                timer: "2000",
                showConfirmButton: false
            });
        </script>
    @endif
@endpush