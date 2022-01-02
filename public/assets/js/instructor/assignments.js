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
                field: 'ass_title',
                autoHide: false,
                title: 'Assignments Title',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="text"
                //         data-title="New Title"
                //         data-name="ass_title"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.ass_title}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>

                //         <a
                //         data-toggle="modal" href="#updateEditorInputModal"
                //         data-type="hidden"
                //         data-title="New Content"
                //         data-name="ass_content"
                //         data-route="${row.update_route}"
                //         data-value="${row.ass_content}"
                //         >
                //             <i class="fa fa-edit text-info mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'class_title',
                title: 'Class Title',
            }, {
                field: 'm_created',
                title: 'Start Date',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="date"
                //         data-title="New Start date"
                //         data-name="created_at"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.m_created}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'm_end_date',
                title: 'End Date',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="date"
                //         data-title="New End date"
                //         data-name="end_date"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.m_end_date}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            },  {
                field: 'm_submissions',
                title: 'No of Submissions'
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                            <a href="'+row.view_link+'" class="btn btn-sm btn-clean btn-icon mr-2">                                <i class="far fa-chart-bar"></i>                           </a>\
                            \
                            \
                            <a onclick="deleteAss('+row.ass_id+');" class="btn btn-sm btn-clean btn-icon mr-2">                                <i class="fa fa-trash"></i>                           </a>\
                            \
                        '+
                        `
                            <a
                            data-toggle="modal" href="#updateWholeForm"
                            data-title="${row.ass_title}"
                            data-content="${row.ass_content}"
                            data-start_date="${row.m_created}"
                            data-end_date="${row.m_end_date}"
                            data-route="${row.update_route}"
                            >
                                <i class="fa fa-edit mx-2 fs-4"></i>

                            </a>
                        `;
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
    await fetch('/instructor/assignments-all')
    .then((resp)=>resp.json())
    .then((result)=>{
        // console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}

var deleteAss = async (ass_id)=>{
    if(!confirm('are you sure?')) return false;
    KTApp.blockPage({
              overlayColor: 'red',
              opacity: 0.1,
              state: 'primary' // a bootstrap color
            });
    await fetch(window.location.href+'/delete/'+ass_id
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
