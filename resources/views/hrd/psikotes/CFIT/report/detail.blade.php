@extends('templates.header')

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Report</li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="box" style="border-top: none !important;">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <center>
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>CFIT REPORT</b></h4>
                            </center>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6 col-xs-12 col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-size: 17px !important;"><b>CANDIDATE
                                            INFORMATION</b></h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table width="100%">
                                        <tr>
                                            <td>Full Name </td>
                                            <td>: &nbsp; {{ $candidate->full_name }} </td>
                                        </tr>

                                        <tr>
                                            <td>Last Education </td>
                                            <td>: &nbsp; {{ $candidate->last_education }} </td>
                                        </tr>

                                        <tr>
                                            <td>Job Applied </td>
                                            <td>: &nbsp; {{ $candidate->job_applied }} </td>
                                        </tr>

                                        <tr>
                                            <td>Test Schedule</td>
                                            <td>: &nbsp; {{ date('d M Y H:i', strtotime($candidate->test_schedule)) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Test Status</td>
                                            <td>: &nbsp;
                                                @if ($candidate->status_psikotes5 == 0)
                                                    <span>No</span>
                                                @else
                                                    <span>Yes</span>
                                                @endif
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>
                                <center><b>SKOR TOTAL</b></center>
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <td></td>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($candidate->status_psikotes5 == 1)
                                                <th>
                                                    <center>{{ $hasil }} </center>
                                                </th>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <center><b>IQ</b></center>
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <td></td>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($candidate->status_psikotes5 == 1)
                                                @foreach ($category as $item)
                                                    <th>
                                                        <center>{{ $item->iq }} </center>
                                                    </th>
                                                @endforeach
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <center><b>RESULT</b></center>
                            </h4>
                            <hr>
                            @if ($candidate->status_psikotes5 == 1)
                                @if ($hasil >= 0 && $hasil < 12)
                                    <span style="font-size: 20px;color:red">
                                        <center><b>
                                                Intellectual deficient
                                            </b></center>
                                    </span>
                                @endif
                                @if ($hasil >= 12 && $hasil < 16)
                                    <span style="font-size: 20px;color:red">
                                        <center><b>
                                                Borderline
                                            </b></center>
                                    </span>
                                @endif
                                @if ($hasil >= 16 && $hasil < 19)
                                    <span style="font-size: 20px;color:red">
                                        <center><b>
                                                Di bawah rata-rata
                                            </b></center>
                                    </span>
                                @endif
                                @if ($hasil >= 19 && $hasil < 26)
                                    <span style="font-size: 20px;color:green">
                                        <center><b>
                                                Rata-rata
                                            </b></center>
                                    </span>
                                @endif
                                @if ($hasil >= 26 && $hasil < 29)
                                    <span style="font-size: 20px;color:green">
                                        <center><b>
                                                Di atas rata-rata
                                            </b></center>
                                    </span>
                                @endif
                                @if ($hasil >= 29 && $hasil < 32)
                                    <span style="font-size: 20px;color:green">
                                        <center><b>
                                                Superior
                                            </b></center>
                                    </span>
                                @endif
                                @if ($hasil >= 32)
                                    <span style="font-size: 20px;color:green">
                                        <center><b>
                                                Sangat Superior
                                            </b></center>
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endpush
