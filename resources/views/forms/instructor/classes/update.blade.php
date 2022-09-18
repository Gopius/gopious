<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" onsubmit="return appendText()" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="cat_title" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="hidden_editor" name="cat_desc" class="form-control form-control-solid"
                            style="height: 325px">
                        <div class="card card-custom ">

                            <div class="card-body m-0 p-0">
                                <div id="kt_quil_1" style="height: 325px">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="">size</label>
                        <input type="number" name="cat_max_student" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" name="cat_code" class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Class Thumbnil</label>
                        <input type="file" name="cover_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        {{-- <input type="checkbox" name="cat_status" class="form-control" autocomplete="off"> --}}
                        <span class="switch">
                        <label>
                            <input type="checkbox" name="cat_status">
                            <span></span>
                        </label>
                    </span>

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
<script>
    var quill_update = null;
    var appendText = () => {
        if (!quill_update) return true;
        document.querySelector("input#hidden_editor").value = quill_update.root.innerHTML;
        return true;
    }
    window.addEventListener('load', () => {


        $('#updateWholeForm').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal

            var title = button.data('title')
            var description = button.data('description')
            var size = button.data('size')
            var code = button.data('code')
            var status = button.data('status')
            var route = button.data('route')


            var modal = event.target;
            modal.querySelector('input[name=cat_title]').value = title
            // modal.querySelector('input[name=cat_desc]').value = description
            modal.querySelector('input[name=cat_max_student]').value = size
            modal.querySelector('input[name=cat_status]').checked = status ? true : false;
            modal.querySelector('form').action = route;

            if (modal.querySelector('#kt_quil_1') && quill_update) {
                quill_update.root.innerHTML = description ?? '';

            }


        })

        if (document.querySelector('#kt_quil_1')) {
            quill_update = new Quill('#kt_quil_1', {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block']
                    ]
                },
                placeholder: 'Type your text here...',
                theme: 'snow' // or 'bubble'
            });
        }

    });
</script>
