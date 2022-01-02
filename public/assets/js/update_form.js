
  window.addEventListener('load', ()=>{


    $('#updateInputModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal

        var type = button.data('type')
        var title = button.data('title')
        var route = button.data('route')
        var name = button.data('name')
        var recipient = button.data('whatever') // Extract info from data-* attributes


        var modal = event.target;
        modal.querySelector('.modal-title').textContent = title
        modal.querySelector('.modal-body input').name = name;
        modal.querySelector('.modal-body input').type = type;
        modal.querySelector('form').action = route;



    })

    $('#updateEditorInputModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal

        var type = button.data('type')
        var title = button.data('title')
        var route = button.data('route')
        var name = button.data('name')
        var value = button.data('value')
        var recipient = button.data('whatever') // Extract info from data-* attributes


        var modal = event.target;
        modal.querySelector('.modal-title').textContent = title
        modal.querySelector('.modal-body input').name = name;
        modal.querySelector('.modal-body input').type = type;
        modal.querySelector('form').action = route;

        if(modal.querySelector('#kt_quil_1') && quill_update){
            quill_update.root.innerHTML = value??'';

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


  })

var quill_update = null;
var appendText = ()=>{
    if(!quill_update) return true;
    document.querySelector("input#hidden_editor").value = quill_update.root.innerHTML;
    return true;
}

