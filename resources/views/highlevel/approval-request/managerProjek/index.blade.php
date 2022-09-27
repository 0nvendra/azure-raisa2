@extends('templates.header')

@section('content')
<section class="content-header">
    <!--<span class="fonts" style="font-size:20px">-->
    <!-- <b>Approval Request Pembelian Barang</b>-->
    <!-- <small>Manager Project</small>-->
    <!--</span>-->
    <br>
    <ol class="breadcrumb">
    <li><a href="{{url('')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="{{url('approvalManager')}}">Persetujuan Pembelian Barang</a></li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            @if(session()->get('success'))
            <div class="alert alert-success alert-dismissible fade in"> {{ session()->get('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @elseif(session()->get('failed'))
            <div class="alert alert-danger alert-dismissible fade in"> 
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <h4><i class="icon fa fa-ban"></i> Pemberitahuan !</h4>
              {{ session()->get('failed') }}
            </div>
            @endif
            {{-- table data of car  --}}
            <div class="table-responsive">
                <table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th width="5%">No.</th>
                          <th>Nomor Request</th>
                          <th>Nama Karyawan</th>
                          <th>NIK</th>
                          <th>Divisi</th>
                          <th>Jenis Pembelian</th>
                          <th>Cost Code</th>
                          <th>Nama Barang</th>
                          <th>Lokasi Kebutuhan</th>
                          <th>Jumlah Pembelian(satuan)</th>
                          <th>Estimasi Harga Satuan</th>
                          <th>Estimasi Total Pembayaran</th>
                          <th>Tanggal Request</th>
                          <th>Keterangan</th>
                          <th>Status</th>
                          <th width="8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($request_barang as $k => $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @if($d->no_request != '')
                                <td>{{$d->no_request}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>{{$d->nama}}</td>
                            <td>{{$d->nik}}</td>
                            @if($d->divisi_id == 0)
                            <td> - </td>
                            @else 
                            <td>{{$d->request_divisi->nama}}</td>
                            @endif
                            <td>{{$d->masterjenisbarang->nama}}</td>
                            <td>{{$d->masterKategori->kode_kategori}}/{{$d->masterKategori->nama_kategori}}</td>
                            <td>{{$d->nama_barang}}</td>
                            <td>{{$d->lokasiProyek->nama}}</td>
                            <td>{{$d->quantity}} {{$d->quantity_satuan}}</td>
                            <td>@rupiah($d->harga),00</td>
                            <td>@rupiah($d->total),00 </td>
                            <td>{{ date('d-m-Y', strtotime($d->tanggal_pengajuan)) }}</td>
                            <td>{{$d->keterangan}}</td>
                            @if($d->status_pengajuan == 0)
                                <td>
                                <span class='label label-warning'>PROSES</span>
                                </td>
                            @elseif($d->status_pengajuan == 1)
                                <td>
                                    <span class='label label-success'>DISETUJUI</span>
                                </td>
                            @elseif($d->status_pengajuan == 4) 
                                <td>
                                    <span class='label label-danger'>DITOLAK</span>
                                </td>
                            @endif
                            <td>
                                <a href="{{route('editapprovalmanagerprojek',$d->id)}}" class="btn btn-info btn-xs"><span class='glyphicon glyphicon-pencil'></span></a>
                                {{-- <button class='btn btn-xs btn-danger delete' data-id="{{$d->id}}"><span class='glyphicon glyphicon-trash'></span></button></td> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            {{-- end of car data  --}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer"></div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>

@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
$(function(){
   var mainTable = $('#data-table').DataTable();
   var selectedRow;
});
</script>
@endpush


