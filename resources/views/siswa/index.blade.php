@extends('template.index')

@section('title', 'Homepage')

@section('css')
  <link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">
  <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
  </div><!-- End Page Title -->
  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Siswa</h5>
              <a href="{{ url('siswa/create') }}">
                  <button type="button" class="btn btn-primary">Tambah Data Siswa</button>
              </a>
              @if(!empty($siswa))
              
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($siswa as $val)
                  <tr>
                    <td>{{ $val->nisn }}</td>
                    <td>{{ $val->nama }}</td>
                    <td>{{ $val->tempat_lahir }}</td>
                    <td>{{ $val->tanggal_lahir }}</td>
                    <td>{{ $val->jenis_kelamin }}</td>
                    <td>{{ $val->telepon->no_telepon }}</td>
                    <td>{{ !empty($val->kelas->nama_kelas) ? $val->kelas->nama_kelas : '-' }}</td>
                    <td>
                        <a href="{{ url('siswa/'.$val->id) }}">
                            <button type="button" class="btn btn-primary">Detail</button>
                        </a>
                        <a href="{{ url('siswa/'.$val->id.'/edit') }}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form method="post" action="{{ url('siswa/'.$val->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                  @endforeach
                  
                </tbody>
              </table>
              @else
                <p>Tidak ada data siswa yang ditampilkan</p>
              @endif
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
