@extends('templates.header')
@section('content')
<section class="content">
    <div class="row">
            <div class="col-xs-12 col-xl-8 col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title fonts"><b>Edit Form SPD</b></h3>
                </div>
                <br>
                <div class="box-body">
                  <div id="notif" ></div>
                  <!-- form karyawan -->
                  <div class="row">
                      <!-- bilah kiri -->
                    <div class="col-xs-12 col-xl-6 col-lg-6">
                        <form role="form" name="formdata" method="post" action="{{route('update-spd', $spd->id)}}">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="tgl_keberangkatan">Form Date</label>
                            <input type="date" data-date-format="yyyy/mm/dd" class="form-control" id="form_date" name="form_date" placeholder="yyyy/mm/dd" value="{{$spd->form_date != '' ? $spd->form_date : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Name*</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{Auth::user()->user_login->nama}}" placeholder="" readonly >
                        </div>

                        <div class="form-group" id="nik">
                            <label for="nik">Employee Number*</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{Auth::user()->user_login->nik}}" placeholder="" readonly >
                        </div>

                        <div class="form-group">
                            <label for="divisi_nama">Position*</label>
                        <input type="text" class="form-control" id="divisi_nama" name="divisi_nama" value="{{Auth::user()->user_login->divisi_id != 0 ? Auth::user()->user_login->divisi->nama : '-'}}" placeholder="" readonly >
                        <input type="hidden" class="form-control" id="divisi_id" name="divisi_id" value="{{Auth::user()->user_login->divisi_id}}">
                        </div>

                        <div class="form-group">
                            <label for="travel_type"> Travel Type*</label>
                            <select class="form-control select2" name="travel_type" id="travel_type" style="width: 100%;" required>
                            <option selected disabled>-- Travel Type -- </option>
                            <option value='Domestic' {{$spd->travel_type == 'Domestic' ? 'selected' : ''  }}>Domestic</option>
                            <option value='International' {{$spd->travel_type == 'International' ? 'selected' : ''  }}>International</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="assignment_type"> Assignment Type*</label>
                            <select class="form-control select2" name="assignment_type" id="assignment_type" style="width: 100%;" value="{{$spd->assignment_type}}" required>
                            <option selected disabled>-- Assignment Type -- </option>

                            <option value='Normal' {{$spd->assignment_type == 'Normal' ? 'selected' : ''  }}>Normal</option>
                            <option value='On Duty 24 Hours' {{$spd->assignment_type == 'On Duty 24 Hours' ? 'selected' : ''  }}>On Duty 24 Hours</option>
                            <option value='Visit' {{$spd->assignment_type == 'Visit' ? 'selected' : ''  }}>Visit</option>
                            </select>
                        </div>

                        <div class="form-group" id="purpose">
                            <label for="purpose">Purpose*</label>
                            <textarea id="purpose" name="purpose" rows="4" cols="50" class="form-control" required>{{$spd->purpose}}</textarea>
                        </div>

                        <div class="form-group" id="asal">
                            <label for="asal">From*</label>
                            <input type="text" id="asal" name="asal" rows="4" cols="50" class="form-control" value="{{$spd->asal}}" required>
                        </div>

                        <div class="form-group" id="tujuan">
                            <label for="tujuan">Destination*</label>
                            <input type="text" id="tujuan" name="tujuan" rows="4" cols="50" class="form-control" value="{{$spd->tujuan}}" required>
                        </div>
                    </div>

                    <div class="col-xs-12 col-xl-6 col-lg-6">
                        <div class="form-group" id="tgl_keberangkatan">
                            <label for="tgl_keberangkatan">Date Departure*</label>
                            <input type="date" data-date-format="yyyy/mm/dd" class="form-control" id="tgl_keberangkatan" name="tgl_keberangkatan"  placeholder="yyyy/mm/dd"  value="{{$spd->tgl_keberangkatan != '' ? $spd->tgl_keberangkatan : '' }}" required >
                        </div>

                        <div class="form-group" id="tgl_pulang">
                            <label for="tgl_pulang">Date Return*</label>
                            <input type="date" data-date-format="yyyy/mm/dd" class="form-control" id="tgl_pulang" name="tgl_pulang"  placeholder="yyyy/mm/dd"  value="{{$spd->tgl_pulang != '' ? $spd->tgl_pulang : '' }}" required >
                        </div>

                        <div class="form-group" id="travel_by">
                            <label for="travel_by">Travel By*</label>
                            <input type="tavel_by" name="travel_by" rows="4" cols="50" class="form-control" value="{{$spd->travel_by}}" required>
                        </div>

                        <div class="form-group">
                            <label for="advance_payment"> Advance Payment*</label>
                            <select class="form-control select2" name="advance_payment" id="advance_payment" style="width: 100%;"  value="{{$spd->advance_payment}}" required>
                            <option selected disabled>--Advance Payment -- </option>
                            <option value='Yes' {{$spd->advance_payment == 'Yes' ? 'selected' : ''  }}>Yes</option>
                            <option value='No' {{$spd->advance_payment == 'No' ? 'selected' : ''  }}>No</option>
                            </select>
                        </div>

                        <div class="form-group" id="idr">
                            <label for="idr">IDR</label>
                            <input type="idr" name="idr" rows="4" cols="50" class="form-control" value="{{$spd->idr}}">
                        </div>

                        <div class="form-group" id="sign_received">
                            <label for="sign_received">Sign Received</label>
                            <input type="sign_received" name="sign_received" rows="4" cols="50" class="form-control" value="{{$spd->sign_received}}">
                        </div>

                        <div class="form-group" id="note">
                            <label for="note">Note</label>
                            <textarea id="note" name="note" rows="4" cols="50" class="form-control"> {{$spd->note}}</textarea>
                        </div>
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                            <a href="{{url("pengajuan-spd")}}" class="btn btn-danger">Batal</a>
                    </div>
            </form>
                </div>
              </div>
            </div>
          </div>
          </div>
          </section>

        @endsection
        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        @endpush