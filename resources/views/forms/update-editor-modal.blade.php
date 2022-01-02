<div class="modal fade" id="updateEditorInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" onsubmit="return appendText()">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <input type="hidden" id="hidden_editor" class="form-control form-control-solid"  style="height: 325px">
                    <div class="card card-custom ">

                         <div class="card-body m-0 p-0">
                             <div id="kt_quil_1" style="height: 325px">
                                 Compose a message
                             </div>
                         </div>
                     </div>


                 </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>


<script src="{{ asset('assets/js/update_form.js') }}"></script>

