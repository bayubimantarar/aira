@extends('layout.app')

@section('title')
Dasbor &raquo; Penjualan &raquo; Form Penjualan Baru
@endsection

@section('page-title')
<a href="/">Dasbor</a> &raquo; <a href="/pelanggan">Penjualan</a> &raquo; Form Penjualan Baru
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default widget">
      <div class="card-heading">
        <h3 class="card-title">Form Penjualan Baru</h3>
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
        <form action="/penjualan/simpan" method="post">
          <h6>Detail Pelanggan</h6>
          <hr />
          @csrf
          <div class="form-row">
            <div class="col-md-4">
              <label for="validationServer01">Pelanggan</label>
              <select name="pelanggan" id="pelanggan" class="form-control">
                <option value="">--- Pilih Pelanggan ---</option>
                @foreach($pelanggan as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="">NIK</label>
              <input type="text" name="nik" class="form-control" id="nik" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Email</label>
              <input type="text" class="form-control" id="email" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Nomor Telepon</label>
              <input type="text" class="form-control" id="nomor_telepon" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Alamat</label>
              <textarea name="" rows="3" class="form-control" id="alamat" readonly></textarea>
            </div>
          </div>
          <h6>Detail Tiket</h6>
          <hr />
          <div class="form-row">
            <div class="col-md-4">
              <label for="validationServer01">Status *</label>
              <select name="status" id="" class="form-control">
                <option value="1">Sudah dikonfirmasi</option>
                <option value="2">Belum dikonfirmasi</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="validationServer01">Nomor Tiket *</label>
              <input type="number" name="nomor_tiket" class="form-control"  />
            </div>
            <div class="col-md-4 mb-3">
              <label for="">Kode Tiket</label>
              <input type="text" name="kode_tiket" class="form-control" />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Tanggal Keberangkatan *</label>
              <input type="date" name="tanggal_keberangkatan" class="form-control" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Kota Keberangkatan *</label>
              <input type="text" name="kota_keberangkatan" class="form-control" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Kota Kedatangan *</label>
              <input type="text" name="kota_kedatangan" class="form-control" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Harga Tiket *</label>
              <input type="number" name="harga_tiket" class="form-control" id="harga_tiket" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Jumlah Tiket *</label>
              <input type="number" name="jumlah_tiket" class="form-control" id="jumlah_tiket" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Total Harga *</label>
              <input type="number" name="total_harga" class="form-control" id="total_harga" readonly />
            </div>
          </div>
          <div class="form-row">
            <div class="col-md4">
              <p class="text-danger">PS: Label yang mempunyai simbol <b>(*)</b> wajib diisi.</p>
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
    $('#pelanggan').change(function(){
      var id = $('#pelanggan').val();
      console.log(id);
      $.ajax({
        url: '/pelanggan/json/single-data-pelanggan/'+id,
        type: 'get',
        dataType: 'json',
        success: function(result){
          $('#nik').val(result.data.nik);
          $('#nama').val(result.data.nama);
          $('#email').val(result.data.email);
          $('#nomor_telepon').val(result.data.nomor_telepon);
          $('#alamat').val(result.data.alamat);
        }
      });
    });

    $('#jumlah_tiket').keyup(function(){
      var harga_tiket = eval($('#harga_tiket').val());
      var jumlah_tiket = eval($('#jumlah_tiket').val());
      var temp_total = eval(harga_tiket * jumlah_tiket);
      var total_harga = $('#total_harga').val(temp_total);
    });
  });
</script>
@endpush
