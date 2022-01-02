'use strict';
// Class definition

var KTDatatableDataLocalDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {
        var dataJSONArray = JSON.parse(
        	'[{"RecordID":1,"class_title":"Digital Literacy 01","start_date":"12-01-2020 03:20pm","end_date":"04-01-2020 03:20pm","class_code":"10/15","ShipName":"Rempel Inc","ShipAddress":"60310 Schiller Center","CompanyEmail":"cdodman0@wsj.com","CompanyAgent":"Cordi Dodman","CompanyName":"Kris-Wehner","Currency":"CNY","Notes":"sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus","Department":"Kids","Website":"tripadvisor.com","Latitude":39.952319,"Longitude":119.598195,"ShipDate":"8/27/2017","PaymentDate":"2016-09-15 22:18:06","TimeZone":"Asia/Chongqing","TotalPayment":"$336309.10","Status":6,"Type":2,"Actions":null},\n' +
            '{"RecordID":2,"class_title":"Digital Marketing","start_date":"04-01-2020 03:20pm","end_date":"13-01-2020 03:20pm","class_code":"11/20","ShipName":"Muller, Leannon and McKenzie","ShipAddress":"26734 Mitchell Drive","CompanyEmail":"kscritch1@google.es","CompanyAgent":"Katrinka Scritch","CompanyName":"Stanton, Friesen and Grant","Currency":"PHP","Notes":"ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur","Department":"Tools","Website":"elpais.com","Latitude":13.8503992,"Longitude":123.7585154,"ShipDate":"9/3/2017","PaymentDate":"2016-09-05 16:27:07","TimeZone":"Asia/Manila","TotalPayment":"$786612.37","Status":1,"Type":2,"Actions":null},\n' +
            '{"RecordID":9,"class_title":"Intro to Programming","start_date":"12-01-2020 03:20pm","end_date":"04-01-2020 03:20pm","class_code":"6/10","ShipName":"O\'Kon, Heller and Flatley","ShipAddress":"960 Vahlen Avenue","CompanyEmail":"lsneddon8@hugedomains.com","CompanyAgent":"Leif Sneddon","CompanyName":"Larson Inc","Currency":"MXN","Notes":"rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut","Department":"Sports","Website":"ifeng.com","Latitude":20.0910963,"Longitude":-98.7623874,"ShipDate":"11/14/2016","PaymentDate":"2016-09-21 23:32:43","TimeZone":"America/Mexico_City","TotalPayment":"$677621.03","Status":4,"Type":2,"Actions":null},\n' +
            '{"RecordID":10,"class_title":"Computing Basics","start_date":"07-12-2020 03:20pm","end_date":"13-01-2020 03:20pm","class_code":"15/25","ShipName":"Gutkowski Group","ShipAddress":"42 Reindahl Court","CompanyEmail":"rjerrold9@ucla.edu","CompanyAgent":"Roy Jerrold","CompanyName":"Hoeger-Waelchi","Currency":"EUR","Notes":"tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed","Department":"Toys","Website":"stumbleupon.com","Latitude":36.3573462,"Longitude":25.4459308,"ShipDate":"8/2/2017","PaymentDate":"2016-10-29 23:25:04","TimeZone":"Europe/Athens","TotalPayment":"$910133.41","Status":6,"Type":1,"Actions":null}]');

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'local',
                source: dataJSONArray,
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
                field: 'RecordID',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            }, {
                field: 'class_title',
                title: 'Poll Title',
            }, {
                field: 'start_date',
                title: 'Start Date'
            }, {
                field: 'end_date',
                title: 'End Date'
            }, {
                field: 'class_code',
                title: 'Total Students',
            }, {
                field: 'Status',
                title: 'Class Name',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Maths',
                            'class': ' label-light-success'
                        },
                        2: {
                            'title': 'Delivered',
                            'class': ' label-light-danger'
                        },
                        3: {
                            'title': 'Marketing',
                            'class': ' label-light-success'
                        },
                        4: {
                            'title': 'Maths',
                            'class': ' label-light-success'
                        },
                        5: {
                            'title': 'Info',
                            'class': ' label-light-info'
                        },
                        6: {
                            'title': 'English',
                            'class': ' label-light-danger'
                        },
                        7: {
                            'title': 'Warning',
                            'class': ' label-light-warning'
                        },
                    };
                    return '<span class="label font-weight-bold label-lg ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function() {
                    return '\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                                <i class="flaticon-eye"></i>\
                            </a>\
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
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
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
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
    KTDatatableDataLocalDemo.init();
});
