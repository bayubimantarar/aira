@extends('layout.app')

@section('title')
Dasbor &raquo; Penjualan
@endsection

@section('page-title')
<a href="/">Dasbor</a> &raquo; Penjualan
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default widget">
      <div class="card-heading">
        <div class="card-controls">
          <a href="/penjualan/form-tambah" class="btn btn-info"> <i class="ion-compose"></i> Tambah data penjualan</a>
        </div>
        <h3 class="card-title">Data Penjualan</h3>
      </div>
      <div class="card-body">
        @if(session('notification'))
        <div id="notification" class="alert alert-success alert-dismisable" role="alert"> <strong>{{ session('notification') }}</strong></div>
        @endif
        <div class="table-responsive">
          <table id="penjualan-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Status</th>
                <th>Nama Lengkap</th>
                <th>Opsi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div><!-- /.col-md-12 -->
</div>
@endsection

@push('javaScript')
<script>
  var pelanggan_table = $('#penjualan-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/penjualan/data-penjualan',
      columns: [
          {data: 'status'},
          {data: 'nama'},
          {data: 'action', orderable: false, searchable: false}
      ]
  });

  function destroy(id)
  {
    var confirmation = confirm("Yakin akan menghapus data ini?");
    if (confirmation) {
        $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pelanggan/hapus/'+id,
            type: 'delete',
            dataType: 'json',
            success: function(result){
                alert('Data berhasil dihapus!');
                pelanggan_table.ajax.reload();
            }
        });
    }
  }
  $('#notification').show(0).delay(5000).hide(0);
</script>
@endpush
