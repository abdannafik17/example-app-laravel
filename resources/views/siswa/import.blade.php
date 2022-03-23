@extends('template.index')

@section('title', 'Halaman Import Excel Data Siswa')

@section('css')
<link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Import Excel Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('siswa') }}" >Siswa </a></li>
          <li class="breadcrumb-item active">Import Excel Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Import Excel Data Siswa</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ url('siswa/storeImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <label for="myfile">Select a file:</label>
                    <input type="file" id="file" name="file">
                    <br>
                    @if($errors->has('file'))
                      <span style="color:red">{{ $errors->first('file') }}</span>
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