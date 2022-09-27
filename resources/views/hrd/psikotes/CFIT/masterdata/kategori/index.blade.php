@extends('templates.header')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <span class="fonts header-style">
            <b>Category Data</b>
        </span>
        <ol class="breadcrumb">
        <li><a href="{{url('')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Psikotest</a></li>
        <li><a href="#">CFIT</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active"><a href="{{url('kategori-cfit')}}">Category</a></li>
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
                        <span class="glyphicon glyphicon-plus"></span> Add Category
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="tb_category_cfit" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 5%"><center>#</center></th>
                                <th><center>Skor</center></th>
                                <th><center>IQ</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($category as $item)
                                <tr>
                                    
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td><center>{{$item->skor_total}}</center></td>
                                    <td><center>{{$item->iq}}</center></td>
                                    <td>
                                        <center>
                                            <a href="" class="btn btn-warning btn-xs" id="editCategory_" data-toggle="modal" data-target="#category_modal_" data-id="{{$item->id}}"><i class="fa fa-edit fa-1x"></i></a>
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
    @include('hrd.psikotes.CFIT.masterdata.kategori.create')
    @include('hrd.psikotes.CFIT.masterdata.kategori.edit')

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

<script>
    $(function(){
        var mainTable = $('#tb_category_cfit').DataTable();
        var selectedRow;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $('#tb_category_cfit').on('click', '.delete', function (e) {
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
                url: "kategori-cfit/"+id,
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
        $('#tb_category_cfit').on('click', '#editCategory_', function(e){
            e.preventDefault();

            var id = $(this).data('id');
            console.log("id>>>", id);

            $.get('kategori-cfit/'+id , function(data){
                console.log("hasil requestmen disc");
                console.log(data);
                $('editCategoryBtn').val("edit-category");
                $('#id').val(data.data.id);
                $('category_modal').modal('show');
                $('#edit_skor_total').val(data.data.skor_total);
                $('#edit_iq').val(data.data.iq);
            })
        });

        $('#editCategoryBtn').click(function(e){
                e.preventDefault();
                var id = $("#id").val();
                var edit_skor_total =  $("#edit_skor_total").val();
                var edit_iq =  $("#edit_iq").val();
                console.log("id", id);
                $.ajax({
                    url:"kategori-cfit/update/"+id,
                    type: "POST",
                    data: {
                        id                  : id,
                        edit_skor_total     : edit_skor_total,
                        edit_iq             : edit_iq
                    },
                    dataType: 'json',
                    success: function (data){
                        $('#CategoryForm').trigger("reset");
                        $('#category_modal').modal('hide');
                        window.location.reload(true);
                    }, 
                    error: function (data){
                        console.log('Error:', data);
                        $('#editCategoryBtn').html('Update Changes');
                    }
                });
            })
        

    });
</script>

@endpush