@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1>Detail Data Hasil Diagnosa</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('hasil.index') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <a href="{{ route('hasil.cetak', $hasil->id) }}" target="_blank" class="btn btn-success mb-4 ml-1"><i class="fas fa-print"></i> Cetak</a>
                        <a href="{{ route('hasil.edit', $hasil->id) }}" class="btn btn-warning mb-4"><i class="fas fa-arrow-down"></i> Diagnosa Ulang</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4">
                                <tr>
                                    <td width="200">Nama Konseli</td>
                                    <td>{{ $hasil->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>{{ $hasil->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $hasil->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $hasil->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Diagnosa</td>
                                    <td>{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Gejala yang dipilih</td>
                                    <td>
                                        @foreach (unserialize($hasil->gejala) as $value)
                                            {{ $value }}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td width="200">Hasil Diagnosa </td>
                                    <td>{{ $hasil->penyakit->nama_penyakit ?? 'Penyakit tidak diketahui' }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Tingkat Keyakinan </td>
                                    <td>{{ $hasil->cf > 0 ? $hasil->cf . '%' : '0' }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Solusi Penanganan </td>
                                    <td style="white-space: pre-wrap; word-wrap: break-word;">{!! $hasil->penyakit->solusi ?? '' !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" data-ordering="false">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Konseli</th>
                                <th>Hasil Diagnosa</th>
                                <th>Nilai</th>
                                <th>Tanggal Diagnosa</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    <td></td>
                                    <td>{{ $hasil->nama }}</td>
                                    <td>{{ $hasil->penyakit->nama_penyakit ?? 'Penyakit tidak diketahui' }}</td>
                                    <td>{{ $hasil->cf > 0 ? $hasil->cf . '%' : '0' }}</td>
                                    <td>{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('hasil.destroy', $hasil->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                     
                                            <button class="btn btn-danger btn-sm delete-confirm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                        
                      
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
