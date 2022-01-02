<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Learner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="learner_name" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="learner_email" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="tel" name="learner_phone" class="form-control"  autocomplete="off">
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

            var name = button.data('name')
            var email = button.data('email')
            var phone = button.data('phone')
            var route = button.data('route')


            var modal = event.target;
            modal.querySelector('input[name=learner_name]').value = name
            // modal.querySelector('input[name=learner_email]').value = email
            modal.querySelector('input[name=learner_phone]').value = phone
            modal.querySelector('form').action = route;



        })
    });
</script>
