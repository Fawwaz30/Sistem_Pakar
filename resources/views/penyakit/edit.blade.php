@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1>Ubah Data Jenis Kecanduan</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <form action="{{ route('penyakit.update', $penyakit->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kode_penyakit">Kode Jenis Kecanduan</label>
                                <input type="text" class="form-control @error('kode_penyakit') is-invalid @enderror" name="kode_penyakit" id="kode_penyakit" value="{{ old('kode_penyakit', $penyakit->kode_penyakit) }}">
                                <div class="invalid-feedback">
                                    @error('kode_penyakit')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_penyakit">Jenis Kecanduan</label>
                                <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" name="nama_penyakit" id="nama_penyakit" value="{{ old('nama_penyakit', $penyakit->nama_penyakit) }}">
                                <div class="invalid-feedback">
                                    @error('nama_penyakit')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Jenis Kecanduan</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $penyakit->deskripsi) }}">
                                <div class="invalid-feedback">
                                    @error('deskripsi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="solusi">Solusi Penanganan</label>
                                <textarea class="form-control tinymce @error('solusi') is-invalid @enderror" name="solusi" id="solusi" rows="6">{{ old('solusi', $penyakit->solusi) }}</textarea>
                                <div class="invalid-feedback">
                                    @error('solusi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('penyakit.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
