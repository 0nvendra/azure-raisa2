@extends('templates.header')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <span class="fonts header-style">
            <b>Statement Data</b>
        </span>
        <ol class="breadcrumb">
        <li><a href="{{url('')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Psikotes</a></li>
        <li><a href="#">CFIT</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active"><a href="{{url('statement-cfit')}}">Statement</a></li>
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
                    <h4><i class="icon fa fa-ban"></i> Failed !</h4>
                    {{ session()->get('failed') }}
                    </div>
                @endif

                <div style="margin-bottom: 20px">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAdd">
                        <span class="glyphicon glyphicon-plus"></span> Add Statement
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="tb_statement_cfit" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><center>Question of</center></th>
                                <th><center>Section</center></th>
                                <th><center>Question Image</center></th>
                                <th><center>Image</center></th>
                                <th><center>Answer</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td><center>{{$item->id_soal}}</center></td>
                                    <td><center>{{$item->id_section}}</center></td>
                                    @if($item->image_pertanyaan != null)
                                    <td><img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_pertanyaan)}}" width="50%" height="50%"></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><b>A. </b><img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_a)}}" width="30%" height="50%">
                                        <br><b>B. </b><img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_b)}}" width="30%" height="30%">
                                        <br><b>C. </b> <img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_c)}}" width="30%" height="30%">
                                        <br><b>D. </b><img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_d)}}" width="30%" height="30%">
                                        <br><b>E. </b><img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_e)}}" width="30%" height="30%">
                                        @if($item->image_f != null)
                                        <br><b>F. </b><img src="{{asset('uploads/HRD/Psikotes/images_CFIT/'.$item->image_f)}}" width="30%" height="30%">
                                        @endif
                                    </td>
                                    <td>{{$item->jawaban}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <center>
                                            <a href="" class="btn btn-warning btn-xs" id="editStatement_" data-toggle="modal" data-target="#statement_modal_" data-id="{{$item->id}}"><i class="fa fa-edit fa-1x"></i></a>
                                            <button class="btn btn-danger btn-xs delete" data-id="{{$item->id}}"><i class="fa fa-trash fa-1x"></i></button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('hrd.psikotes.CFIT.masterdata.statement.create')
    @include('hrd.psikotes.CFIT.masterdata.statement.edit')

    <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
          </div>
          <div class="modal-body" id="konfirmasi-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" data-id="" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Deleting..." id="confirm-delete">Delete</button>
          </div>
          </div>
        </div>
    </div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11/plugins/select2/select2.min.css') }}">
<script src="{{asset('AdminLTE-2.3.11/plugins/select2/select2.full.min.js')}}"></script>

<script>
    $('.select2').select2();
    $(function(){
        var mainTable = $('#tb_statement_cfit').DataTable();
        var selectedRow;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $('#tb_statement_cfit').on('click', '.delete', function (e) {
            e.preventDefault();
            selectedRow = mainTable.row( $(this).parents('tr') );

            $("#modal-konfirmasi").modal('show');

            $("#modal-konfirmasi").find("#confirm-delete").data("id", $(this).data('id'));
            $("#konfirmasi-body").text("Are you sure you delete this data?");
        });

        $('#confirm-delete').click(function(){
            var deleteButton = $(this);
            var id           = deleteButton.data("id");

            deleteButton.button('loading');
            $.ajax(
            {
                url: "statement-cfit/"+id,
                type: 'POST',
                dataType: "JSON",
                data: {
                },
                success: function (response)
                {
                    deleteButton.button('reset');
                    selectedRow.remove().draw();
                    $("#modal-konfirmasi").modal('hide');

                Swal.fire({
                    title: response.success,
                    type: 'success',
                    confirmButtonText: 'Close',
                    confirmButtonColor: '#AAA',
                    onClose: function(){
                    
                    }
                })
                },
                error: function(xhr) {
                console.log(xhr.responseText);
                }
            });
        });

        // edit data kategori 
        $('#tb_statement_cfit').on('click', '#editStatement_', function(e){
            e.preventDefault();

            var id = $(this).data('id');
            // console.log("id>>>", id);

            $.get('statement-cfit/'+id , function(data){
                $('editStatementBtn').val("edit-statement");
                $('statement_modal').modal('show');
                $('#id').val(data.data.id);
                $('#edit_jawaban').val(data.data.jawaban);
                $('#edit_id_section').val(data.data.id_section);
            })
        });

        $('#editStatementBtn').click(function(e){
                e.preventDefault();
                var id                  =  $("#id").val();
                var edit_jawaban        =  $("#edit_jawaban").val();
                var edit_id_section     =  $("#edit_id_section").val();
        
                $.ajax({
                    url:"statement-cfit/update/"+id,
                    type: "POST",
                    data: {
                        id                  : id,
                        edit_jawaban        : edit_jawaban,
                        edit_id_section     : edit_id_section
                    },
                    dataType: 'json',
                    success: function (data){
                        $('#StatementForm').trigger("reset");
                        $('#statement_modal').modal('hide');
                        window.location.reload(true);
                    }, 
                    error: function (data){
                        console.log('Error:', data);
                        $('#editStatementBtn').html('Update Changes');
                    }
                });
            })
        

    });
</script>

@endpush