 <!-- Modal -->
 <div class="modal fade" id="statement_modal_" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel"><b>Form Edit Statement</b></h4>
             </div>
             <form role="form" name="formdata" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-body">
                     <hr>
                     <input type="hidden" name="id" id="id" />
                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <div class="form-group">
                         <label for="nik">Answer</label>
                         <textarea class="form-control" id="edit_jawaban" name="edit_jawaban" rows="6" value=""> </textarea>
                     </div>
                     <div class="form-group">
                         <label for="nik">Section</label>
                         <textarea class="form-control" id="edit_id_section" name="edit_id_section" rows="6" value=""> </textarea>
                     </div>
                     <hr>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="editStatementBtn" value="Submit">Update</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
