@extends('template_backend.app')

@section('content')
    <section class="content-header mx-3">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1>Dashboard</h1>
            </div>
        </div>
    </section>

    <section class="content mx-3">

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ count($gejala) }}</h3>

                        <p>Total Gejala</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('gejala.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count($penyakit) }}</h3>

                        <p>Total Jenis Kecanduan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book-medical"></i>
                    </div>
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('penyakit.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($aturan) }}</h3>

                        <p>Total Aturan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('aturan.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ count($pengguna) }}</h3>

                        <p>Total Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('pengguna.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-down"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
        </div>
        <img src="{{ asset('assets/images/logo-lama.png') }}" alt="Logo" width="100%">
 
    </section>
@endsection
