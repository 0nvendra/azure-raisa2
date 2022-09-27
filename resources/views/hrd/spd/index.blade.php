@extends('templates.header')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <span class="fonts header-style">
        <b>Official Travel Letter Data (SPD)</b>
    </span>
    <br>
      <ol class="breadcrumb">
      <li><a href="{{url('')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><a href="{{url('history-spd')}}">SPD History</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="white-space: nowrap !important;">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Reference No.</th>
                            <th>Form Date</th>
                            <th>Employee Name</th>
                            <th>Employee Number</th>
                            <th>Position</th>
                            <th>Travel Type</th>
                            <th>From</th>
                            <th>Destination</th>
                            <th>Date Departure</th>
                            <th>Date Return</th>
                            <th>Assignment Type</th>
                            <th>Purpose</th>
                            <th>Travel By</th>
                            <th>Advance Payment</th>
                            <th>IDR</th>
                            <th>Sign Received</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($spd as $k => $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->no_surat}}</td>
                            <td>{{date('d-M-Y', strtotime($d->form_date))}}</td>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->nik}}</td>
                            <td>{{$d->get_divisi->nama}}</td>
                            <td>{{$d->travel_type}}</td>
                            <td>{{$d->asal}}</td>
                            <td>{{$d->tujuan}}</td>
                            <td>{{date('d-M-Y', strtotime($d->tgl_keberangkatan))}}</td>
                            <td>{{date('d-M-Y', strtotime($d->tgl_pulang))}}</td>
                            <td>{{$d->assignment_type}}</td>
                            <td>{{$d->purpose}}</td>
                            <td>{{$d->travel_by}}</td>
                            <td>{{$d->advance_payment}}</td>
                            <td>
                                @if($d->idr == '')
                                    <span> </span>
                                @else 
                                    @rupiah($d->idr),00
                                    <!--{{$d->idr}}-->
                                @endif
                            </td>
                            <td>{{$d->sign_received}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--  end of car data  --}}
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
   $('#data-table').DataTable();
});
</script>
@endpush
