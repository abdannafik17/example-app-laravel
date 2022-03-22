@extends('template.index')

@section('title', 'Detail Siswa')

@section('css')
  <link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">
  <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('siswa') }}">Siswa</a></li>
        </ol>
      </nav>
  </div><!-- End Page Title -->
  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Siswa</h5>
              
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NISN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nisn" value="{{ $siswa->nisn }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tanggal_lahir" value="{{ $siswa->jenis_kelamin }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_hp" value="{{ $siswa->telepon->no_telepon }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Hobi</label>
                  <div class="col-sm-10">
                    @foreach($siswa->hobi as $h)
                      <strong><span>{{$h->nama_hobi}} , </span></strong>
                    @endforeach
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>
</main>
<!-- End #main -->
@stop

@section('js')
<script src="{{ asset('sb-admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('sb-admin/assets/js/main.js') }}"></script>
@stop
