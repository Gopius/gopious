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
                field: 'learner_name',
                title: 'Student Name',
            }, {
                field: 'learner_phone',
                title: 'Student Mobile',
                template: function(row) {
                    return '\
                            <span">'+row.learner_phone+'</span>\
                            \
                        ';
                },
            }, {
                field: 'submission_date',
                title: 'Submission Date'
            }, {
                field: '',
                title: 'Score',
                template: function(row) {
                    return '\
                            <label style="border-radius:0;" class="w-100 label label-lg label-light-success" >'+Math.round((row.correct_option/row.questions.length)*100, 2)+'% '+ ( (row.unattented_option>0)?'('+row.unattented_option+' unattented)' : '') +' </label>\
                            \
                        ';
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
                            <a href="'+row.view_link+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">                                <i class="flaticon-eye"></i>                            </a>\
                            \
                        ';
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
   
    getAllSubmittedAssignments();
});


var getAllSubmittedAssignments = async ()=>{
    await fetch(window.location.href+'/submissions')
    .then((resp)=>resp.json())
    .then((result)=>{
        console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}