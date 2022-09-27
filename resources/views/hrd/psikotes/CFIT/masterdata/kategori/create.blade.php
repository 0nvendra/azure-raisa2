 <!-- Modal -->
 <div class="modal fade" id="myModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Form Add Statement</b></h4>
        </div>
        <form role="form" name="formdata" enctype="multipart/form-data" method="post" action="{{url("kategori-cfit/store")}}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="skor">Skor Total</label>
                <input type="number" class="form-control" name="skor_total" id="skor_total" required>
            </div>
            <div class="form-group">
                <label for="skor">IQ</label>
                <input type="number" class="form-control" name="iq" id="iq" required>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
    </div>
</div>


