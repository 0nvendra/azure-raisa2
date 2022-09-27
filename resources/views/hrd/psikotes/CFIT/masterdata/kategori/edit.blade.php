 <!-- Modal -->
 <div class="modal fade" id="category_modal_" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Form Edit Category</b></h4>
        </div>
        <form role="form" name="formdata" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="nik">Skor Total</label>
                <input type="hidden" name="id" id="id" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="number" class="form-control" name="edit_skor_total" id="edit_skor_total"> </textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="nik">IQ</label>
                <input type="number" class="form-control" name="edit_iq" id="edit_iq"> </textarea>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="editCategoryBtn" value="Submit">Update</button>
        </div>
        </form>
    </div>
    </div>
</div>
