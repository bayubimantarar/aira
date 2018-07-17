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
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">NIK</label>
            <div class="col-4">
              <input name="nik" class="form-control" type="number" value="{{ $pelanggan->nik }}" id="example-text-input" readonly />
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>
            <div class="col-5">
              <input name="nama" class="form-control" type="text" value="{{ $pelanggan->nama }}" id="example-text-input" />
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-2 col-form-label">Email</label>
            <div class="col-5">
              <input name="email" class="form-control" type="email" value="{{ $pelanggan->email }}" id="example-email-input" />
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nomor Telepon</label>
            <div class="col-5">
              <input name="nomor_telepon" class="form-control" type="number" value="{{ $pelanggan->nomor_telepon }}" id="example-text-input" />
            </div>
          </div>
          <div class="form-group row">
            <label for="example-tel-input" class="col-2 col-form-label">Alamat</label>
            <div class="col-6">
              <textarea name="alamat" id="" rows="5" class="form-control">{{ $pelanggan->alamat }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-tel-input" class="col-2 col-form-label"></label>
            <div class="col-6">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-md-12 -->
</div>
@endsection
