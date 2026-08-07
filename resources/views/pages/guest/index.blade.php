@extends('layouts.app')

@section('title', 'Guest Page')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Guest List page</h1>
</div>


<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title mb-0">Guest List</h5>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>telpon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Asal Instansi</th>
                        <th>Keperluan</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($guest as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->telpon }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->asal_instansi }}</td>
                        <td>{{ $item->keperluan }}</td>
                        <td>
                            <a href="{{ route('pages.admin.show', encrypt($item->id)) }}"
                                class="btn btn-link text-secondary p-0 mx-2">
                                <span class="fa fa-search"></span>
                            </a>

                            <a href="javascript:void(0)"
                                onclick="handleDestroy('{{ route('pages.admin.destroy', $item->id) }}')"
                                class="btn btn-link text-danger p-0 mx-2">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    @endsection

    @push('styles')
    {{-- Tambahkan CSS di sini jika diperlukan --}}
    @endpush

    @push('scripts')
    @if(Session::has('success'))
    <script>
        // Tambahkan kode alert jika diperlukan
        // Contoh menggunakan SweetAlert:
        /*
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ Session::get("success") }}'
        });
        */
    </script>
    @endif
    @endpush