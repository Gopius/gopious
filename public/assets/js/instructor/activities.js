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

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

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
                field: 'course_title',
                autoHide: false,
                title: 'Course Title',
            }, {
                field: 'course_desc',
                title: 'Course Description'
            }, {
                field: 'cat_title',
                title: 'Class Title'
            },   {
                field: 'course_status',
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
                    return '<span class="label font-weight-bold label-lg ' + status[row.course_status].class + ' label-inline">' + status[row.course_status].title + '</span>';
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
                            <a href="'+row.learners_url+'" class="btn btn-sm btn-clean btn-icon mr-2" title="View Learners">\
                                <i class="far fa-chart-bar"></i>\
                            </a>\
                            <a onclick="editCourse('+row.course_id+');"     class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                                <span class="svg-icon svg-icon-md">\
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                            <rect x="0" y="0" width="24" height="24"/>\
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                        </g>\
                                    </svg>\
                                </span>\
                            </a>\
                            <a href="'+row.url+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Continue Building">\
                                <i class="far fa-edit"></i>\
                            </a>\
                            <a onclick="deleteCourse('+row.course_id+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Continue Building">\
                                <i class="fa fa-trash"></i>\
                            </a>\
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


var getAllOrganizationCourses = async ()=>{
    await fetch('/instructor/courses-all')
    .then((resp)=>resp.json())
    .then((result)=>{
        // console.log(result);
        mNetSource = result;
        KTDatatableDataLocalDemo.init();
    });
}
;
var course_id_input =  document.querySelector('input[name=course_id]');
var course_title_input =  document.querySelector('input[name=course_title]');
var course_cat_no =  document.querySelector('select[name=cat_no]');
var course_desc_textarea =  document.querySelector('textarea[name=course_desc]');
var editCourse = (course_id)=>{
    var m_data_index = 0;
    for(var dd of mNetSource){
        if(dd.course_id == course_id){
            // m_data = dd;
            break;
        }
        m_data_index++;
    }
    // if (m_data == null) return;
    var form_button = document.querySelector('#form_button');

    course_id_input.value = mNetSource[m_data_index].course_id;
    course_title_input.value = mNetSource[m_data_index].course_title;
    course_desc_textarea.value = mNetSource[m_data_index].course_desc;
    document.querySelector(`.${mNetSource[m_data_index].course_status==0?'closed':'open'}`).checked=true;

    form_button.click();
    // console.log(course_id);
}

var updateChange = async ()=>{
    KTApp.blockPage({
              overlayColor: 'red',
              opacity: 0.1,
              state: 'primary' // a bootstrap color
            });
    var m_status = document.querySelector('input.open').checked ? 1:0;
    await fetch(window.location.href+'/update/'+course_id_input.value,
                {
                method: 'POST',
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    course_title:course_title_input.value,
                    course_desc:course_desc_textarea.value,
                    cat_no:course_cat_no.value,
                    course_status:m_status,
                    '_token': document.querySelector('input[name=_token]').value
                    })
                }
        )
    .then((result)=>result.json())
    .then((data)=>{
        window.location.reload();
        // console.log(data);

    })
    .catch((e)=>{
        console.log(e);
        alert(e);
    })
    ;
}
var deleteCourse = async (course_id)=>{
    if(!confirm('are you sure?')) return false;
    KTApp.blockPage({
              overlayColor: 'red',
              opacity: 0.1,
              state: 'primary' // a bootstrap color
            });
    await fetch(window.location.href+'/delete/'+course_id
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
