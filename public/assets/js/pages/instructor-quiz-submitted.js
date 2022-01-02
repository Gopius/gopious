'use strict';
// Class definition

var KTDatatableDataLocalDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {
        var dataJSONArray = JSON.parse(
        	'[{"RecordID":1,"class_title":"Ogoluwa Ojewale","start_date":"08062112993","end_date":"04-01-2020 03:20pm","class_code":"85","ShipName":"Rempel Inc","ShipAddress":"60310 Schiller Center","CompanyEmail":"cdodman0@wsj.com","CompanyAgent":"Cordi Dodman","CompanyName":"Kris-Wehner","Currency":"CNY","Notes":"sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus","Department":"Kids","Website":"tripadvisor.com","Latitude":39.952319,"Longitude":119.598195,"ShipDate":"8/27/2017","PaymentDate":"2016-09-15 22:18:06","TimeZone":"Asia/Chongqing","TotalPayment":"$336309.10","Status":6,"Type":2,"Actions":null},\n' +
            '{"RecordID":2,"class_title":"Frank Udom","start_date":"08062112993","end_date":"13-01-2020 03:20pm","class_code":"120","ShipName":"Muller, Leannon and McKenzie","ShipAddress":"26734 Mitchell Drive","CompanyEmail":"kscritch1@google.es","CompanyAgent":"Katrinka Scritch","CompanyName":"Stanton, Friesen and Grant","Currency":"PHP","Notes":"ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur","Department":"Tools","Website":"elpais.com","Latitude":13.8503992,"Longitude":123.7585154,"ShipDate":"9/3/2017","PaymentDate":"2016-09-05 16:27:07","TimeZone":"Asia/Manila","TotalPayment":"$786612.37","Status":1,"Type":2,"Actions":null},\n' +
            '{"RecordID":9,"class_title":"Shade Nixon","start_date":"08062112993","end_date":"04-01-2020 03:20pm","class_code":"90","ShipName":"O\'Kon, Heller and Flatley","ShipAddress":"960 Vahlen Avenue","CompanyEmail":"lsneddon8@hugedomains.com","CompanyAgent":"Leif Sneddon","CompanyName":"Larson Inc","Currency":"MXN","Notes":"rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut","Department":"Sports","Website":"ifeng.com","Latitude":20.0910963,"Longitude":-98.7623874,"ShipDate":"11/14/2016","PaymentDate":"2016-09-21 23:32:43","TimeZone":"America/Mexico_City","TotalPayment":"$677621.03","Status":4,"Type":2,"Actions":null},\n' +
            '{"RecordID":10,"class_title":"John Richards","start_date":"08062112993","end_date":"13-01-2020 03:20pm","class_code":"75","ShipName":"Gutkowski Group","ShipAddress":"42 Reindahl Court","CompanyEmail":"rjerrold9@ucla.edu","CompanyAgent":"Roy Jerrold","CompanyName":"Hoeger-Waelchi","Currency":"EUR","Notes":"tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed","Department":"Toys","Website":"stumbleupon.com","Latitude":36.3573462,"Longitude":25.4459308,"ShipDate":"8/2/2017","PaymentDate":"2016-10-29 23:25:04","TimeZone":"Europe/Athens","TotalPayment":"$910133.41","Status":6,"Type":1,"Actions":null}]');

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
                title: 'Student Name',
            }, {
                field: 'start_date',
                title: 'Student Mobile'
            }, {
                field: 'end_date',
                title: 'Submission Date'
            }, {
                field: 'class_code',
                title: 'Score',
                template: function(row) {
                    return '<span class="label font-weight-bold label-lg label-light-success label-inline">' + row.class_code + '</span>';
                }
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
