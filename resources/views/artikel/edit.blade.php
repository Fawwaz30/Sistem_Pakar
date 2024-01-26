@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1>Ubah Artikel</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <form action="{{ route('artikel.update', $artikel->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul Artikel</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}">
                                <div class="invalid-feedback">
                                    @error('judul')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Artikel</label>
                                @if (empty($artikel->gambar))
                                    <p>Tidak ada gambar</p>
                                @else
                                    <p><img src="{{ Storage::url($artikel->gambar) }}" class="img-thumbnail" width="250"></p>
                                @endif
                                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                <small>*Kosongkan jika gambar tidak diubah</small>
                                <div class="invalid-feedback">
                                    @error('gambar')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi Artikel</label>
                                <textarea class="form-control tinymce @error('isi') is-invalid @enderror" name="isi" id="isi" rows="6">{{ old('isi', $artikel->isi) }}</textarea>
                                <div class="invalid-feedback">
                                    @error('isi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
