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
                    field: 'class.cat_title',
                    title: 'Class Title',
                    autoHide: false,
                    // template: (row)=> {
                    //     return `
                    //         <a
                    //         data-toggle="modal" href="#updateInputModal"
                    //         data-type="text"
                    //         data-title="New Title"
                    //         data-name="cat_title"
                    //         data-route="${row.update_route}"
                    //         >
                    //             ${row.class.cat_title}
                    //             <i class="fa fa-pen mx-2 fs-4"></i>

                    //         </a>
                    //     `
                    // },
                }, {
                    field: 'class.cat_desc',
                    title: 'Class Description',
                    // template: (row)=> {
                    //     return `
                    //         <a
                    //         data-toggle="modal" href="#updateEditorInputModal"
                    //         data-type="hidden"
                    //         data-title="New Description"
                    //         data-name="cat_desc"
                    //         data-route="${row.update_route}"
                    //         data-value="${row.class.cat_desc}"
                    //         >
                    //             ${row.class.cat_desc}
                    //             <i class="fa fa-edit text-info mx-2 fs-4"></i>

                    //         </a>
                    //     `
                    // },
                },
                // {
                // field: 'class.cat_max_student',
                // title: 'Max number of Student',
                // // template: (row)=> {
                // //     return `
                // //         <a
                // //         data-toggle="modal" href="#updateInputModal"
                // //         data-type="text"
                // //         data-title="New Max Number of Student"
                // //         data-name="cat_max_student"
                // //         data-route="${row.update_route}"
                // //         >
                // //             ${row.class.cat_max_student}
                // //             <i class="fa fa-pen mx-2 fs-4"></i>

                // //         </a>
                // //     `
                // // },
                // },
                {
                    field: 'class.cat_code',
                    title: 'Class Code',
                    // template: (row)=> {
                    //     return `
                    //         <a
                    //         data-toggle="modal" href="#updateInputModal"
                    //         data-type="text"
                    //         data-title="New Class Code"
                    //         data-name="cat_code"
                    //         data-route="${row.update_route}"
                    //         >
                    //             ${row.class.cat_code}
                    //             <i class="fa fa-pen mx-2 fs-4"></i>

                    //         </a>
                    //     `
                    // },
                }, {
                    field: 'class.cat_status',
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
                        return '<span class="label font-weight-bold label-lg ' + status[row.class.cat_status].class + ' label-inline">' + status[row.class.cat_status].title + '</span>';
                    },
                }, {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 125,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(row) {
                        return '\
                            <a href="' + row.m_route + '" class="btn btn-sm btn-clean btn-icon mr-2" title="View details">                                <i class="flaticon-eye"></i>                            </a>\
                        ' +
                            `
                            <a
                            data-toggle="modal" href="#updateWholeForm"
                            data-title="${row.class.cat_title}"
                            data-description="${row.class.cat_desc}"
                            data-size="${row.class.cat_max_student}"
                            data-code="${row.class.cat_code}"
                            data-status="${row.class.cat_status}"
                            data-route="${row.update_route}"
                            >
                                <i class="fa fa-edit mx-2 fs-4"></i>


                            </a>
                            <a href="instructor/classes/delete/${row.class.cat_id}">
                            <i class="fa fa-trash mx-2 fs-4"></i>
                            </a>
                            </a>
                            <a href="instructor/classes/detail/${row.class.cat_id}">
                            <i class="fa  fa-info-circle mx-2 fs-4"></i>
                            </a>
                        `;
                    },
                }
            ],
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


var getAllOrganizationCourses = async() => {
    await fetch('/instructor/classes-all')
        .then((resp) => resp.json())
        .then((result) => {
            // console.log(result);
            mNetSource = result;
            KTDatatableDataLocalDemo.init();
        });
}
