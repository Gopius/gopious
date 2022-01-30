<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="cat_title" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">size</label>
                    <input type="number" name="cat_max_student" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text-" name="cat_desc" class="form-control"  autocomplete="off" style="height: 80px">
                </div>
                <div class="form-group">
    <label for="">Status</label>
    <select class="form-control"name=cat_status id="exampleFormControlSelect1">
        <option value="1">Open</option>
        <option value="0">Closed</option>
      <option value="2">Canceled</option>
    </select>
  </div>

                {{-- <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" name="cat_code" class="form-control"  autocomplete="off">
                </div> --}}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>
<script>
    window.addEventListener('load', ()=>{


        $('#updateWholeForm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal

            var title = button.data('title')
            var description = button.data('description')
            var size = button.data('size')
            var code = button.data('code')
            var route = button.data('route')


            var modal = event.target;
            modal.querySelector('input[name=cat_title]').value = title
            modal.querySelector('input[name=cat_desc]').value = description
            modal.querySelector('input[name=cat_max_student]').value = size
            // modal.querySelector('input[name=cat_code]').value = code
            modal.querySelector('form').action = route;



        })
    });
</script>
