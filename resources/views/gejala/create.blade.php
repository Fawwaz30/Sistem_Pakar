@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1>Tambah Data Gejala</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('gejala.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="kode_gejala">Kode Gejala</label>
                                <input type="text" class="form-control @error('kode_gejala') is-invalid @enderror" name="kode_gejala" id="kode_gejala" value="{{ old('kode_gejala') }}">
                                <div class="invalid-feedback">
                                    @error('kode_gejala')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_gejala">Nama Gejala</label>
                                <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" name="nama_gejala" id="nama_gejala" value="{{ old('nama_gejala') }}">
                                <div class="invalid-feedback">
                                    @error('nama_gejala')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('gejala.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
