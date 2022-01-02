'use strict';
// Class definition
var mNetSource = [];
var KTDatatableDataLocalDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {


        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'local',
                source: mNetSource,
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                // height: 450, // datatable's body's fixed height
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'course_id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            }, {
                field: 'name',
                title: 'Full Name',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="text"
                //         data-title="New Name"
                //         data-name="${row.type == 'instructor'? 'instr_name':'learner_name'}"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.name}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'email',
                title: 'Email',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="email"
                //         data-title="New email"
                //         data-name="${row.type == 'instructor'? 'instr_email':'learner_email'}"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.email}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'phone',
                title: 'Phone'
            },  {
                field: 'type',
                title: 'Type'
            },{
                field: 'Classes',
                autoHide: false,
                title: 'Classes',
                template: (row)=>{
                    return allClasses(row.classes);
                }
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                            <a onclick="sendDetails(this)"  id = "el_'+row.id+'" class="  '+row.type+' btn btn-sm btn-clean btn-icon" title="Resend Details Mail">\
                                <i class="flaticon-email-black-circular-button "></i>\
                            </a>\
                            <a  href="'+window.location.href+'/delete/'+row.id +'/'+row.type+'" onclick="confirmDelete('+row.instr_id+');" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                <span class="svg-icon svg-icon-md">\
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                            <rect x="0" y="0" width="24" height="24"/>\
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                        </g>\
                                    </svg>\
                                </span>\
                            </a>\
                        '+
                        `
                            <a
                            data-toggle="modal" href="#updateWholeForm"
                            data-email="${row.type == 'instructor'? 'instr_email':'learner_email'}"
                            data-name="${row.type == 'instructor'? 'instr_name':'learner_name'}"
                            data-phone="${row.type == 'instructor'? 'instr_phone':'learner_phone'}"
                            data-route="${row.update_route}"
                            >
                                <i class="fa fa-edit mx-2 fs-4"></i>

                            </a>
                        `
                        ;
                },
            }],
        });

        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {

    getAllOrganizationCourses();
});


var getAllOrganizationCourses = async ()=>{
    await fetch('/organization/users-all')
    .then((resp)=>resp.json())
    .then((result)=>{
        // console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}
var sendDetails = async (target)=>{
    var id = target.id.split('_')[1];
    var m_url = `/organization/learner/${id}/mail-details/`;
    if (target.classList.contains ('instructor') ) m_url = `/organization/instructor/${id}/mail-details/`;
    KTApp.block(target.parentElement, {});
    await fetch(m_url)
    .then((resp)=>resp.json())
    .then((result)=>{
        if (result.status) {
            toastr.success(result.message);
            KTApp.unblock(target.parentElement);
        }
    });
}
var allClasses = (data)=>{
    var m_rows = '';
    // console.log(data);
    for(var row of data) m_rows +=  `<a class="dropdown-item">${row.class.cat_title}</a>`;
    return `<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ${data.length} Classes
                </button>
                <div class="dropdown-menu" >
                    ${m_rows}
                </div>
            </div>`;
}

var deleteAss = async (ass_id, type=null)=>{
    if(!confirm('are you sure?')) return false;
    KTApp.blockPage({
              overlayColor: 'red',
              opacity: 0.1,
              state: 'primary' // a bootstrap color
            });
    await fetch(window.location.href+'/delete/'+ass_id+'/'+type
        )
    .then((result)=>result.json())
    .then((data)=>{
        window.location.reload();

    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var confirmDelete = async (ass_id)=>{
    if(!confirm('are you sure?')) return false;
    return true;

}
