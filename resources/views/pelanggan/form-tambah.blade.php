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
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">NIK <b>*</b></label>
            <div class="col-4">
              <input name="nik" class="form-control" type="number" value="{{ old('nik') }}" id="example-text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap <b>*</b></label>
            <div class="col-5">
              <input name="nama" class="form-control" type="text" value="{{ old('nama') }}" id="example-text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-2 col-form-label">Email <b>*</b></label>
            <div class="col-5">
              <input name="email" class="form-control" type="email" value="{{ old('email') }}" id="example-email-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nomor Telepon <b>*</b></label>
            <div class="col-5">
              <input name="nomor_telepon" class="form-control" type="number" value="{{ old('nomor_telepon') }}" id="example-text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-tel-input" class="col-2 col-form-label">Alamat <b>*</b></label>
            <div class="col-6">
              <textarea name="alamat" id="" rows="5" class="form-control">{{ old('alamat') }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-tel-input" class="col-2 col-form-label"></label>
            <div class="col-6">
              <p class="text-danger">PS: label yang mempunya simbol <b>(*)</b> wajib diisi fieldnya.</p>
              <button type="submit" class="btn btn-primary"> <i class="ion ion-checkmark"></i> Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-md-12 -->
</div>
@endsection
