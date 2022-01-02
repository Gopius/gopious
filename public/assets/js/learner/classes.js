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
            }, {
                field: 'class.cat_desc',
                title: 'Class Description'
            }, {
                field: 'class.cat_max_student',
                title: 'Max number of Student'
            }, {
                field: 'class.id',
                title: 'View Timeline',
                template: (row)=>`<a href="${row.m_route}"><span class="label font-weight-bold label-lg label-light-success label-inline"> Open Timeline </span></a>`,
            },  {
                field: 'class.cat_code',
                title: 'Class Code'
            },   {
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
                            'class': ' '
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
    await fetch('/learner/classes-all')
    .then((resp)=>resp.json())
    .then((result)=>{
        // console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}