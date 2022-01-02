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
                field: 'cat_title',
                title: 'Class Title',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="text"
                //         data-title="New Title"
                //         data-name="cat_title"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.cat_title}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'cat_desc',
                autoHide: true,
                title: 'Class Description',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="text"
                //         data-title="New Description"
                //         data-name="cat_desc"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.cat_desc}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'cat_max_student',
                title: 'Class Size',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="number"
                //         data-title="New Max Class Size"
                //         data-name="cat_max_student"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.cat_max_student}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'cat_code',
                title: 'Class Code'
            },{
                field: 'cat_status',
                autoHide: false,
                title: 'Instructors',
                template: (row)=>{
                    return allInstructors(row.instructors);
                }
            },   {
                field: 'cat_id',

                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        0: {
                            'title': 'Close',
                            'class': ' label-light-danger'
                        },
                        1: {
                            'title': 'Open',
                            'class': ' label-light-success'
                        },
                        2: {
                            'title': 'Canceled',
                            'class': ' label-light-primary'
                        },
                        3: {
                            'title': 'Open',
                            'class': ' label-light-success'
                        },
                        4: {
                            'title': 'Info',
                            'class': ' label-light-info'
                        },
                        5: {
                            'title': 'Closed',
                            'class': ' label-light-danger'
                        },
                        6: {
                            'title': 'Warning',
                            'class': ' label-light-warning'
                        },
                    };
                    return '<span class="label font-weight-bold label-lg ' + status[row.cat_status].class + ' label-inline">' + status[row.cat_status].title + '</span>';
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return`
                    <a
                    data-toggle="modal" href="#updateWholeForm"
                    data-title="${row.cat_title}"
                    data-description="${row.cat_desc}"
                    data-size="${row.cat_max_student}"
                    data-code="${row.cat_code}"
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
    await fetch('/organization/classes-all')
    .then((resp)=>resp.json())
    .then((result)=>{
        // console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}

var allInstructors = (data)=>{
    var m_rows = '';
    for(var row of data) m_rows +=  `<a class="dropdown-item">${row.instr_name}</a>`;
    return `<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ${data.length} Instructors
                </button>
                <div class="dropdown-menu" >
                    ${m_rows}
                </div>
            </div>`;
}
