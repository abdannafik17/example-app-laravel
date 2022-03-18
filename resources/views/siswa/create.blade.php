@extends('template.index')

@section('title', 'Halaman Tambah Data Siswa')

@section('css')
<link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('siswa') }}" >Siswa </a></li>
          <li class="breadcrumb-item active">Edit Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Siswa</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ url('siswa') }}">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NISN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nisn" value="{{ old('nisn') }}">
                    @if($errors->has('nisn'))
                      <span style="color:red">{{ $errors->first('nisn') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                    @if($errors->has('nama'))
                      <span style="color:red">{{ $errors->first('nama') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    @if($errors->has('tempat_lahir'))
                      <span style="color:red">{{ $errors->first('tempat_lahir') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @if($errors->has('tanggal_lahir'))
                      <span style="color:red">{{ $errors->first('tanggal_lahir') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="jenis_kelamin">
                      <option value="null" selected>--Pilih Jenis Kelamin--</option>
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    @if($errors->has('jenis_kelamin'))
                      <span style="color:red">{{ $errors->first('jenis_kelamin') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->
@stop

@section('js')
<script src="{{ asset('sb-admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
@stop