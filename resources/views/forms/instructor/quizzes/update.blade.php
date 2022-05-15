<div class="modal fade" id="updateWholeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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

                    <input type="hidden" name="type" value="type2">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="quiz_title" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Duration</label>
                        <input type="number" name="duration" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Always Open</label>
                        <span class="switch">
                            <label>
                                <input type="checkbox" name="alway_open" />
                                <span></span>
                            </label>
                        </span>
                    </div>
                    <div class="form-group">
                        @php
                            $courses = App\Models\Course::get();
                        @endphp
                        <label for="">Course</label>
                        <select required="" type="text" class="form-control form-control-solid" name="course_no"
                            id="course_no">
                            <option disabled="">--select a course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->course_id }}">{{ $course->course_title }}</option>
                            @endforeach
                        </select>
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
            var content = button.data('content')
            var start_date = button.data('start_date')
            var end_date = button.data('end_date')
            var route = button.data('route')
            var duration = button.data('duration')
            var alway_open = button.data('alway_open')
            var course_id = button.data('course_id')
            console.log('course_id: ', course_id);


            var modal = event.target;
            console.log('modal: ', modal);
            modal.querySelector('input[name=quiz_title]').value = title

            modal.querySelector('input[name=duration]').value = duration
            // modal.querySelector('input[name=start_date]').value = start_date
            if (alway_open == '1') {
                modal.querySelector('input[name=alway_open]').checked = true;
            } else {
                modal.querySelector('input[name=alway_open]').checked = false;
            }
            // modal.querySelector('input[name=course_no]').value = 1;
            document.getElementById("course_no").value = `${course_id}`;

            modal.querySelector('form').action = route;

            if (modal.querySelector('#kt_quil_1') && quill_update) {
                quill_update.root.innerHTML = content ?? '';
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
