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
                field: 'quiz_title',
                autoHide: false,
                title: 'Quiz Title',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="text"
                //         data-title="New Title"
                //         data-name="quiz_title"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.quiz_title}
                //             <i class="fa fa-pen mx-2 fs-4"></i>

                //         </a>
                //     `
                // },
            }, {
                field: 'm_start_date',
                title: 'Start Date',
                // template: (row)=> {
                //     return `
                //         <a
                //         data-toggle="modal" href="#updateInputModal"
                //         data-type="date"
                //         data-title="New Start date"
                //         data-name="start_date"
                //         data-route="${row.update_route}"
                //         >
                //             ${row.m_start_date}
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
            }, {

                field: 'alway_open',
                title: 'Status',
                template: (row) => {
                    return `
            
                    <a href="${row.update_route}?alway_open=${row.alway_open?'0':'1'}">
                        <i class="${row.alway_open?'fas fa-toggle-on':'fas fa-toggle-off'} fa-2x"></i>

                        </a>
                  
                    `
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: true,
                template: function(row) {

                    return '\
                            <a href="' + row.view_link + '" class="btn btn-sm btn-clean btn-icon mr-2" title="View Submissions">                            <i class="far fa-chart-bar"></i>                          </a>\
                            \
                            <a onclick="deleteQuiz(' + row.quiz_id + ');" class="btn btn-sm btn-clean btn-icon mr-2">                                <i class="fa fa-trash"></i>                           </a>\
                            \
                            <a href="' + row.view_route + '" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit Content">                            <i class="fa fa-pen-alt"></i>                          </a>\
                            \
                        ' +
                        `
                            <a
                            data-toggle="modal" href="#updateWholeForm"
                            data-course_id="${row.course.course_id}"
                            data-alway_open="${row.alway_open}"
                            data-duration="${row.duration}"
                            data-title="${row.quiz_title}"
                            data-start_date="${row.m_start_date}"
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


var getAllOrganizationCourses = async() => {
    await fetch('/instructor/quizzes-all')
        .then((resp) => resp.json())
        .then((result) => {
            // console.log(result);
            mNetSource = result;
            KTDatatableDataLocalDemo.init();
        });
}
var deleteQuiz = async(ass_id) => {
    if (!confirm('are you sure?')) return false;
    KTApp.blockPage({
        overlayColor: 'red',
        opacity: 0.1,
        state: 'primary' // a bootstrap color
    });
    await fetch(window.location.href + '/delete/' + ass_id)
        .then((result) => result.json())
        .then((data) => {
            window.location.reload();

        })
        .catch((e) => {
            console.log(e);
            alert(e);
        });
}