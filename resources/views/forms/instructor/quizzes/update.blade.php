<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" onsubmit="return appendText()">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="quiz_title" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="date" name="start_date" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input type="date" name="end_date" class="form-control"  autocomplete="off">
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
    var appendText = ()=>{
        if(!quill_update) return true;
        document.querySelector("input#hidden_editor").value = quill_update.root.innerHTML;
        return true;
    }
    window.addEventListener('load', ()=>{


        $('#updateWholeForm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal

            var title = button.data('title')
            var content = button.data('content')
            var start_date = button.data('start_date')
            var end_date = button.data('end_date')
            var route = button.data('route')


            var modal = event.target;
            modal.querySelector('input[name=quiz_title]').value = title

            modal.querySelector('input[name=start_date]').value = start_date
            modal.querySelector('input[name=end_date]').value = end_date;
            modal.querySelector('form').action = route;

            if(modal.querySelector('#kt_quil_1') && quill_update){
                quill_update.root.innerHTML = content??'';

            }


        })

        if(document.querySelector('#kt_quil_1')){
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
