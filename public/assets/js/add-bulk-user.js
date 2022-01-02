"use strict";
// Class definition



KTUtil.ready(function() {
     $('#kt_dropzone_3').dropzone({
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: ".xls,.xlsx",
            accept: function(file, done) {
                // console.log(file);
                var reader = new FileReader();

                // Ready The Event For When A File Gets Selected
                reader.onload = function(e) {
                    var data = e.target.result;
                    // console.log(data);
                    var cfb = XLSX.read(data, {type: 'binary'});
                    // console.log(cfb);
                    cfb.SheetNames.forEach(function(sheetName) {
                        // Obtain The Current Row As CSV
                        var sCSV = XLS.utils.make_csv(cfb.Sheets[sheetName]);   
                        var oJS = XLS.utils.sheet_to_json(cfb.Sheets[sheetName]);   
                        oJS.forEach((row)=>{
                            appendNewData(row)
                            setTimeout( 2000)

                        });
                        // $("#my_file_output").html(sCSV);
                        console.log(oJS)
                        // $scope.oJS = oJS
                    });
                };

                // Tell JS To Start Reading The File.. You could delay this if desired
                reader.readAsBinaryString(file);
                done("Uploaded");
                
            }
        });
});

var data_row = document.querySelector('tr.init_row').innerHTML;
document.querySelector('tr.init_row').parentElement.removeChild(document.querySelector('tr.init_row'));
$('#kt_select2_3').select2({
   placeholder: "Select atleast a class",
});
var appendNewData = (data)=>{
    var m_node = document.createElement('tr');
    
    m_node.innerHTML = data_row.replace('_%%%_', (Math.random()+"").replaceAll(".", "") );
    
    document.querySelector("#m_tbody").append(m_node);


    m_node.querySelector('.f_name').value = data['First Name'];
    m_node.querySelector('.l_name').value = data['Last Name'];
    m_node.querySelector('.email').value = data['Email'];
    if (data['User Type'].toLowerCase() == 'learner') {
        m_node.querySelector('.user_type').selectedIndex = 1;
    }
    if (data['User Type'].toLowerCase() == 'instructor') {
        m_node.querySelector('.user_type').selectedIndex = 2;   
    }
    // m_node.querySelector('.phone').value = data['Phone Number'];

    // init_Select(m_node.querySelector('.select2'));

    
}

var init_Select = async (node)=>{
    $(node).select2({
       placeholder: "Select atleast a class",
    });
}

var removeRow = (target)=>{
    document.querySelector("#m_tbody").removeChild(target.parentElement.parentElement);
}
