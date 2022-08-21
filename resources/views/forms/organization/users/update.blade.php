<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-pane fade show active" id="pills-persanol" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <form method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input autocomplete="false" type="email" name="email" class="form-control"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="tel" name="phone" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Clsses</label>
                            <select class="form-control select2" name="cat_class[]" id="exampleFormControlSelect1" multiple="multiple">
                                @php
                                $org_no=auth('organization')->user()->org_id;
                               
                                    $categories = App\Models\Category::where('cat_status', 1)->where('org_no',$org_no)->get();
                                @endphp

                                <option value="none" disabled selected>Select Class</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->cat_id }}">{{ $category->cat_title }}</option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Save changes</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', () => {


        $('#updateWholeForm').on('show.bs.modal', function(event) {
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
