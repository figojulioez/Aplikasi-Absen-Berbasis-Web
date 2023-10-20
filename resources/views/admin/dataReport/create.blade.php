  @extends('admin.template.main')

  @section('content')

<title>Absensi - Buat Laporan</title>
  <!-- Icons font CSS-->
  <link href="{{ asset('css/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">


  <!-- Vendor CSS-->
  <link href="{{ asset('css/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('css/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">

  <div class="wrapper wrapper--w680">
  @if ( session()->has('error') ) 
  @include('admin.partials.alert')
  @endif
    <div class="card card-1">
      <div class="card-body">
        <h2 class="title">Buat Laporan</h2>
        <form method="POST" action="/data-laporan">
          @csrf
          <div class="input-group">
            <input class="input--style-1" type="number" placeholder="ID KARYAWAN" id="id" name="id">
          </div>
          <div class="input-group">
            <input class="input--style-1" disabled type="text" placeholder="NAME" id="nama">
            <input type="hidden"  name="nama" id="hidden">
          </div>  
          <div class="row row-space">
            <div class="col-2">
              <div class="input-group">
                <input class="input--style-1 js-datepicker" type="text" placeholder="TANGGAL" name="tanggal">
                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
              </div>
            </div>
            <div class="col-2">
              <div class="input-group">
                <div class="rs-select2 js-select-simple select--no-search">
                  <select name="keterangan">
                    <option disabled="disabled" selected="selected">KETERANGAN</option>
                    <option>Sakit</option>
                    <option>Ijin</option>
                    <option>Alpha</option>
                  </select>
                  <div class="select-dropdown"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="p-t-20">
            <button class="btn btn--radius btn--green" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Jquery JS-->
  <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
  <!-- Vendor JS-->
  <script src="{{ asset('css/vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('css/vendor/datepicker/moment.min.js') }}"></script>
  <script src="{{ asset('css/vendor/datepicker/daterangepicker.js') }}"></script>

  <!-- Main JS-->
  <script src="{{ asset('js/global.js') }}"></script>
  <script type="text/javascript">
    document.getElementById('id').addEventListener('keyup', async function () {
      $fetch = await fetch('/api/karyawan/edit?id=' + this.value).then( (e) => { 
        if ( e.ok ) { return e.json() } else { return false }; } ).then( (e) => { return e.data[0]; });
      $nama = '';
      if ( $fetch ) {
        $nama = $fetch.nama;
      }
      console.log($nama);
      document.getElementById('nama').value = $nama;
      document.getElementById('hidden').value = $nama;
    });

  </script>

  @endsection