@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1>Tambah Data Aturan</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <form action="{{ route('aturan.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="penyakit_id">Penyakit</label>
                                <select name="penyakit_id" id="penyakit_id" class="form-control select2 @error('penyakit_id') is-invalid @enderror" required>
                                    <option value="">- Pilih -</option>
                                    @foreach ($penyakit as $row)
                                        <option value="{{ $row->id }}" {{ old('penyakit_id') == $row->id ? 'selected' : '' }}>
                                            {{ $row->kode_penyakit . ' - ' . $row->nama_penyakit }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('penyakit_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gejala_id">Gejala</label>
                                <select name="gejala_id" id="gejala_id" class="form-control select2 @error('gejala_id') is-invalid @enderror" required>
                                    <option value="">- Pilih -</option>
                                    @foreach ($gejala as $row)
                                        <option value="{{ $row->id }}" {{ old('gejala_id') == $row->id ? 'selected' : '' }}>
                                            {{ $row->kode_gejala . ' - ' . $row->nama_gejala }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('gejala_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cf_pakar">CF Pakar</label>
                                <input type="number" step="0.1" class="form-control @error('cf_pakar') is-invalid @enderror" name="cf_pakar" id="cf_pakar" value="{{ old('cf_pakar') }}" required>
                                <div class="invalid-feedback">
                                    @error('cf_pakar')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('aturan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
