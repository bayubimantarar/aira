@extends('layout.app')

@section('title')
Dasbor &raquo; Pelanggan &raquo; Form Pelanggan Baru
@endsection

@section('page-title')
<a href="/">Dasbor</a> &raquo; <a href="/pelanggan">Pelanggan</a> &raquo; Form Pelanggan Baru
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default widget">
      <div class="card-heading">
        <h3 class="card-title">Form Pelanggan Baru</h3>
      </div>
      <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/pelanggan/simpan" method="post">
          @csrf
          <div class="form-row">
            <div class="col-md-4 col-xs-12 mb-3">
              <label>Status *</label>
              <select name="status" class="form-control" id="status">
                @if(old('status') == 'Umum')
                  <option value="Umum" id="umum" selected>Umum</option>
                  <option value="Perusahaan" id="perusahaan">Perusahaan</option>
                @elseif(old('status') == 'Perusahaan')
                  <option value="Umum" id="umum">Umum</option>
                  <option value="Perusahaan" id="perusahaan" selected>Perusahaan</option>
                @else
                  <option value="Umum id="umum"">Umum</option>
                  <option value="Perusahaan" id="perusahaan">Perusahaan</option>
                @endif
              </select>
            </div>
            <div class="col-md-4 col-xs-12 mb-3" id="perusahaan-form">
              <label>Nama Perusahaan *</label>
              <input type="text" name="nama_perusahaan" class="form-control" placeholder="PT. Maju Sejahtera" id="nama_perusahaan" value="{{ old('nama_perusahaan') }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 col-xs-12 mb-3">
              <label>NIK *</label>
              <input type="text" name="nik" class="form-control" placeholder="421707250996" value="{{ old('nik') }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-2">
              <label>Panggilan</label>
              <select name="panggilan" class="form-control">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="John Doe" value="{{ old('nama') }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 col-xs-12 mb-3">
              <label>Email *</label>
              <input type="email" name="email" class="form-control" placeholder="contact@johndoe.com" value="{{ old('email') }}" />
            </div>
            <div class="col-md-4 col-xs-12 mb-3">
              <label>Nomor Telepon *</label>
              <input type="number" name="nomor_telepon" class="form-control" placeholder="0895332055486" value="{{ old('nomor_telepon') }}"/>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-8 col-xs-12 mb-3">
              <label>Alamat *</label>
              <textarea name="alamat" id="" rows="5" class="form-control" placeholder="jl. Sukamenak No.141, Bandung">{{ old('alamat') }}</textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-8 col-xs-12 mb-3">
              <p class="text-danger">PS: label yang mempunyai simbol <b>(*)</b> wajib diisi fieldnya.</p>
              <button type="submit" class="btn btn-primary"> <i class="ion ion-checkmark"></i> Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-md-12 -->
</div>
@endsection

@push('javaScript')
<script>
  $(document).ready(function(){
    if($('#nama_perusahaan').val() == null){
      $('#perusahaan-form').hide();
    }else{
      $('#perusahaan-form').show();
    }
    $('#status').change(function(){
      console.log($(this).val());
      if($(this).val() == 'Perusahaan'){
        $('#perusahaan-form').show();
      }else{
        $('#perusahaan-form').hide();
      }
    });
  });
</script>
@endpush
