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
                field: 'learner_id',
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
                title: 'Name',
            }, {
                field: 'learner_email',
                title: 'Email'
            },{
                field: 'Classes',
                title: 'Classes',
                template: function(row) {
                    return `
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ${(row.learner?row.learner.classes:[]).length} classes
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    ${getDropDownItem(row.learner?row.learner.classes:[])}
                                </div>
                            </div>
                    `;
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
                            <a href="'+row.url+'" class="btn btn-sm btn-clean btn-icon mr-2" title="View Reports">\
                                <i class="far fa-chart-bar"></i>\
                            </a>\
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

    getAllOrganizationCourses();
});

let getDropDownItem =  (arr = [])=>{
    let strC = '';
    arr.forEach(element => {
        strC += `<a class="dropdown-item">${element.cat_title}</a>`
    });
    return strC;
}

var getAllOrganizationCourses = async ()=>{
    await fetch('/instructor/learners-all')
    .then((resp)=>resp.json())
    .then((result)=>{
        console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}
