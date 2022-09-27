 <!-- Modal -->
 <div class="modal fade" id="myModalAdd" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel"><b>Form Add Statement</b></h4>
             </div>
             <form role="form" name="formdata" enctype="multipart/form-data" method="post"
                 action="{{ url('statement-cfit/store') }}">
                 @csrf
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-md-6 col-6">
                             <div class="form-group">
                                 <label for="No_soal">Question Of</label>
                                 <input type="number" class="form-control" name="id_soal" id="id_soal" required>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="image_pertanyaan">Question Image</label>
                         <input type="file" class="form-control" name="image_pertanyaan" id="image_pertanyaan">
                     </div>
                     <div class="row">
                         <div class="form-group col-md-6 col-6">
                             <label for="image_a">Image A</label>
                             <input type="file" class="form-control" name="image_a" id="image_a" required>
                         </div>
                         <div class="form-group col-md-6 col-6">
                             <label for="image_b">Image B</label>
                             <input type="file" class="form-control" name="image_b" id="image_b" required>
                         </div>
                         <div class="form-group col-md-6 col-6">
                             <label for="image_c">Image C</label>
                             <input type="file" class="form-control" name="image_c" id="image_c" required>
                         </div>
                         <div class="form-group col-md-6 col-6">
                             <label for="image_d">Image D</label>
                             <input type="file" class="form-control" name="image_d" id="image_d" required>
                         </div>
                         <div class="form-group col-md-6 col-6">
                             <label for="image_e">Image E</label>
                             <input type="file" class="form-control" name="image_e" id="image_e" required>
                         </div>
                         <div class="form-group col-md-6 col-6">
                             <label for="image_f">Image F</label>
                             <input type="file" class="form-control" name="image_f" id="image_f" required>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6 col-6">
                             <div class="form-group">
                                 <label for="jawaban">Answer</label>
                                 <select name="jawaban" id="jawaban" class="form-control select2" style="width: 100%"
                                     required>
                                     <option value="">Select Answer</option>
                                     <option value="A">A</option>
                                     <option value="B">B</option>
                                     <option value="C">C</option>
                                     <option value="D">D</option>
                                     <option value="E">E</option>
                                     <option value="F">F</option>
                                     <option value="A,B">A,B</option>
                                     <option value="A,C">A,C</option>
                                     <option value="A,D">A,D</option>
                                     <option value="A,E">A,E</option>
                                     <option value="A,F">A,F</option>
                                     <option value="B,A">B,A</option>
                                     <option value="B,C">B,C</option>
                                     <option value="B,D">B,D</option>
                                     <option value="B,E">B,E</option>
                                     <option value="B,F">B,F</option>
                                     <option value="C,A">C,A</option>
                                     <option value="C,B">C,B</option>
                                     <option value="C,D">C,D</option>
                                     <option value="C,E">C,E</option>
                                     <option value="C,F">C,F</option>
                                     <option value="D,A">D,A</option>
                                     <option value="D,B">D,B</option>
                                     <option value="D,C">D,C</option>
                                     <option value="D,E">D,E</option>
                                     <option value="D,F">D,F</option>
                                     <option value="E,A">E,A</option>
                                     <option value="E,B">E,B</option>
                                     <option value="E,C">E,C</option>
                                     <option value="E,D">E,D</option>
                                     <option value="E,F">E,F</option>
                                     <option value="E,A">F,A</option>
                                     <option value="E,B">F,B</option>
                                     <option value="E,C">F,C</option>
                                     <option value="E,D">F,D</option>
                                     <option value="E,F">F,E</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6 col-6">
                             <div class="form-group">
                                 <label for="kategori_plus">Section</label>
                                 <select name="id_section" id="id_section" class="form-control select2"
                                     style="width: 100%" required>
                                     <option value="">Select Section</option>
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                 </select>
                             </div>
                         </div>
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
