@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1>Data Pengguna</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('pengguna.create') }}" class="btn btn-primary">Tambah Pengguna</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" data-ordering="false">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $row)
                                <tr>
                                    <td></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->role->name }}</td>
                                    <td>
                                        <form action="{{ route('pengguna.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('pengguna.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"> </i></a>
                                            @if (auth()->user()->username != $row->username)
                                                <button class="btn btn-danger btn-sm delete-confirm" type="submit"><i class="fas fa-eraser"> </i></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').on('click', '.delete-confirm', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: "Konfirmasi",
                        text: "Anda yakin data ini mau dihapus?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        });

        @if (session()->has('success'))
            toastr.success('{{ session('success') }}');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}');
        @endif
    </script>
@endsection
