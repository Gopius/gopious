<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            @csrf
                    <div class="container">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-persanol" role="tab" aria-controls="pills-home" aria-selected="true">Persanol Detail</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-profile" aria-selected="false">CHange Password</a>
      </li>
    </ul>
        </div>
            <div class="modal-body">
      <div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-persanol" role="tabpanel" aria-labelledby="pills-home-tab">
        <form method="POST">

                <div class="form-group" >
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="tel" name="phone" class="form-control"  autocomplete="off">
                </div>
                                <div class="form-group">
    <label for="">Clsses</label>
    <select class="form-control"name="cat_class" id="exampleFormControlSelect1">
        <option value="1">Class 1</option>

    </select>
  </div>

                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
  </div>
  <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-profile-tab">
        <form method="POST">
                            <div class="form-group" >
                    <label for="">New Password</label>
                    <input type="password" name="password" class="form-control"  autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>

            </form>
  </div>
            </div>

            </div>
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
            modal.querySelector('input[name=name]').name = name
            modal.querySelector('input[name=email]').name = email
            modal.querySelector('input[name=phone]').name = phone
            modal.querySelector('form').action = route;



        })
    });
</script>
