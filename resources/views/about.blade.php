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
              <h5 class="card-title">Halaman About</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>


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
