@extends('layout.app')

@section('title')
Dasbor &raquo; Pelanggan &raquo; Form Ubah
@endsection

@section('page-title')
<a href="/">Dasbor</a> &raquo; <a href="/pelanggan">Pelanggan</a> &raquo; Form Ubah
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default widget">
      <div class="card-heading">
        <h3 class="card-title">Form Ubah</h3>
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
        <form action="/pelanggan/ubah/{{ $pelanggan->id }}" method="post">
          @csrf
          <input name="_method" type="hidden" value="put">
          <div class="form-row">
            <div class="col-md-4 col-xs-12 mb-3">
              <label>Status *</label>
              <select name="status" class="form-control" id="status">
                @if($pelanggan->status == 'Umum')
                  <option value="Umum" id="umum" selected>Umum</option>
                  <option value="Perusahaan" id="perusahaan">Perusahaan</option>
                @elseif($pelanggan->status == 'Perusahaan')
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
              <input type="text" name="nama_perusahaan" class="form-control" placeholder="PT. Maju Sejahtera" id="nama_perusahaan" value="{{ $pelanggan->nama_perusahaan }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 col-xs-12 mb-3">
              <label>NIK *</label>
              <input type="text" name="nik" class="form-control" placeholder="421707250996" value="{{ $pelanggan->nik }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-2">
              <label>Panggilan</label>
              <select name="panggilan" class="form-control">
                @if($pelanggan->panggilan == 'Mr.')
                  <option value="Mr." selected>Mr.</option>
                  <option value="Mrs.">Mrs.</option>
                @elseif($pelanggan->panggilan == 'Mrs.')
                  <option value="Mr.">Mr.</option>
                  <option value="Mrs." selected>Mrs.</option>
                @endif
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="John Doe" value="{{ $pelanggan->nama }}" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 col-xs-12 mb-3">
              <label>Email *</label>
              <input type="email" name="email" class="form-control" placeholder="contact@johndoe.com" value="{{ $pelanggan->email }}" />
            </div>
            <div class="col-md-4 col-xs-12 mb-3">
              <label>Nomor Telepon *</label>
              <input type="number" name="nomor_telepon" class="form-control" placeholder="0895332055486" value="{{ $pelanggan->nomor_telepon }}"/>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-8 col-xs-12 mb-3">
              <label>Alamat *</label>
              <textarea name="alamat" id="" rows="5" class="form-control" placeholder="jl. Sukamenak No.141, Bandung">{{ $pelanggan->alamat }}</textarea>
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
    if($('#nama_perusahaan').val() == ''){
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
