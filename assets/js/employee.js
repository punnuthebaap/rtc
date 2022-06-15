// const _base_url=JSON.parse(sessionStorage.getItem('base_url'));
var link=base_url+'uploads/';
var link1=window.location.origin+'/rtc/uploads/';
$(window).load(function(){
	$('#onAddEmployee').on('click',function(e){
        e.preventDefault();
        if($('#add_employee').valid()){
          $.ajax({
              type : "POST",
              url  : "Employee/saveEmployee",
              dataType : "JSON",
              data : $('#add_employee').serialize(),
              success: function(data){
                // console.log(data)
                if(data.error===false){
                  Swal.fire({
                    timer: 5000,
                    icon: 'success',
                    text: 'Successful',
                    title: 'Add Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                  });
                   $("#add_employee").trigger("reset");
                   $(location).attr("href","viewEmployeeMaster");
                }
                else if(data.error===true){
                  Swal.fire({
                    icon: 'error',
                    text: data.data,
                    title: 'Add Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

                  });
                }
                else{
                  Swal.fire({
                    icon: 'error',
                    text: 'Add Employee Failed , please try agin after sometime',
                    title: 'Add Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                  });
                }
              }
            });
            return false;
        }
      });
  $('#onEditEmployee').on('click',function(e){
        e.preventDefault();
        if($('#edit_employee').valid()){
          $.ajax({
              type : "POST",
              url  : "Employee/saveEmployeeById",
              dataType : "JSON",
              data : $('#edit_employee').serialize(),
              success: function(data){
                // console.log(data)
                if(data.error===false){
                  Swal.fire({
                    timer: 5000,
                    icon: 'success',
                    text: 'Successful',
                    title: '#Edit Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                  });
                   $("#edit_employee").trigger("reset");
                   $(location).attr("href","viewEmployeeMaster");
                }
                else if(data.error===true){
                  Swal.fire({
                    icon: 'error',
                    text: data.data,
                    title: 'Edit Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

                  });
                }
                else{
                  Swal.fire({
                    icon: 'error',
                    text: 'Edit Employee Failed , please try agin after sometime',
                    title: 'Edit Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                  });
                }
              }
            });
            return false;
        }
      });
});
$(window).load(function(){
      var ullu =   $(location).attr("pathname");
      var splitullu = ullu.split('/');
      // console.log(splitullu[2]);
      if(splitullu[2]=="viewEmployeeMaster"){
          $.ajax({
              type : "POST",
              url  : "Employee/getEmployee",
              dataType : "JSON",
              success: function(data){
                console.log(data)
                if(data.error===false){
                        $('#EmployeeTable').DataTable({
                            processing: true,
                            data:data.data,
                            searching: true,
                            initComplete: function(settings){
                                                    if(obj.authority!="admin"){
                                                      $('#EmployeeTable').DataTable().columns([5,6]).visible(false);
                                                    }
                            },
                            columns:[
                                  { data: "employee_no" },
                                  { data: "employee_name" },
                                  { data: "gender" },
                                  { data: "permanent_address" },
                                  { data: null, defaultContent: "<i id="+'empClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                      			      { data: null, defaultContent: "<i id="+'empDelTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">delete_forever</i>"},
                                  { data: null, defaultContent: "<i id="+'viewReportEmployee' +" class="+'material-icons'+" style="+'cursor:pointer'+">remove_red_eye</i>"},
                                ],
                            //     columnDefs: [
                            //          {
                            //             targets: [4,5
                            //             ],
                            //             render: function (data, type, row, meta){
                            //               var obj =JSON.parse(sessionStorage.getItem('loginCredentials'));
                            //               if(obj.authority!="admin"){
                            //                 $('#EmployeeTable').DataTable().columns([5,6]).visible(false);
                            //               }
                            //             }
                            //         },
                            // ],
                            paging:true,
                            info: true,    
                            language: {    
                                emptyTable: "No data available "   
                            },
                          });
                          $('#EmployeeTable tbody').on('click', '#viewReportEmployee', function() {
                                  var $row = $(this).closest('tr');
                                  var data = $('#EmployeeTable').DataTable().row($row).data();
                                  console.log(data);
                                  sessionStorage.setItem('employeeReport', JSON.stringify(data));
                                  $(location).attr("href", 'employeeReport');
                          });
                          $('#EmployeeTable tbody').on( 'click', '#empClickTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#EmployeeTable').DataTable().row($row).data();
                            console.log(data);
                            sessionStorage.setItem('latestEmpEdit',JSON.stringify(data));
                            $(location).attr("href",'editEmployee');
                          });
                          $('#EmployeeTable tbody').on( 'click', '#empDelTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#EmployeeTable').DataTable().row($row).data();
                            console.log(data);
                            Swal.fire({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                              if (result.isConfirmed) {
                            $.ajax({
                                type : "POST",
                                url  : "Employee/deleteEmployeeById",
                                dataType : "JSON",
                                data : data,
                                success: function(data){
                                  // console.log(data)
                                  if(data.error===false){
                                    Swal.fire({
                                      timer: 5000,
                                      icon: 'success',
                                      text: 'Successful',
                                      title: 'Delete Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                    });
                                    $(location).attr("href",'viewEmployeeMaster');
                                  }
                                  else{
                                    Swal.fire({
                                      icon: 'error',
                                      text: 'Some error occured',
                                      title: 'Delete Employee',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                    });
                                    $(location).attr("href",'viewEmployeeMaster');
                                  }
                                }
                              });
                              return false;
                              }
                            });
                          }); 
                  // Swal.close();
                }
                else{
                //   Swal.fire({
                //     timer: 2000,
                //     icon: 'error',
                //     text: 'Server Down , please try again after sometime',
                //     title: 'View Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                //     willClose: () => {clearInterval(timerInterval)}
                //   }).then((result) => {
                //   if (result.dismiss === Swal.DismissReason.timer) {
                //     $(location).attr("href","<?php echo base_url(); ?>dashboard");
                //   }
                // })
                }
              }
            });
            return false;
      }
      if(splitullu[2]=="editEmployee"){
        var user=JSON.parse(sessionStorage.getItem('latestEmpEdit'));
        console.log(user);
        var form = $('#edit_employee');
        $.each(user, function(key, value) {
          form.find("input[name='" + key + "']").val(value).focus();
          form.find("select[name='" + key + "']").val(value).change();
          form.find("textarea[name='" + key + "']").val(value).focus();
       });
        form.find("input[name=birth_date]").val(moment(user.birth_date).format('YYYY-MM-DD')).change();
        form.find("input[name=join_date]").val(moment(user.join_date).format('YYYY-MM-DD')).change();
        form.find("input[name=left_date]").val(moment(user.left_date).format('YYYY-MM-DD')).change();
        
      $('#employeePhotoFrameE').attr("src",link+user.employee_photo);
      }
      if (splitullu[2] == "employeeReport") {
                const employee=JSON.parse(sessionStorage.getItem('employeeReport'));
                if(employee!=null)
                {
                        // console.log(base_url);
                        console.table(employee);
                        _setReportData(employee);
                }
                else
                {
                        $(location).attr("href","logout");
                }
        }
});
function _setReportData(employee){
  !isNullOrEmpty(employee.employee_photo)? ($('#employeeReportSTDPIC').attr("src",link+employee.employee_photo)) : ($('#employeeReportSTDPIC').attr("src","https://source.unsplash.com/600x300/?nophoto"))
  !isNullOrEmpty(employee.employee_name)? ($('#employeeReportName').html(employee.employee_name)) : ($('#employeeReportName').html("------"))

  !isNullOrEmpty(employee.designation)? ($('#employeeReportDes').html(employee.designation)) : ($('#employeeReportDes').html("------"))
  !isNullOrEmpty(employee.contact_no)? ($('#employeeReportContact').html(employee.contact_no)) : ($('#employeeReportContact').html("------"))
  !isNullOrEmpty(employee.Aadhar_no)? ($('#employeeReportAad').html(employee.Aadhar_no)) : ($('#employeeReportAad').html("------"))
  !isNullOrEmpty(employee.gender)?  ($('#employeeReportGender').html(employee.gender == "M" ? "Male" : "Female")) : ($('#employeeReportGender').html("------"))
  !isNullOrEmpty(employee.marital_status)? ($('#employeeReportMarry').html(employee.marital_status)) : ($('#employeeReportMarry').html("------"))
  !isNullOrEmpty(employee.birth_date)? ($('#employeeReportDob').html(new Date(employee.birth_date).toLocaleDateString("en-US",Dateoptions))) : ($('#employeeReportDob').html("------"))

  !isNullOrEmpty(employee.father_name)? ($('#employeeReportFather').html(employee.father_name)) : ($('#employeeReportFather').html("------"))
  !isNullOrEmpty(employee.qualification)? ($('#employeeReportQualify').html(employee.qualification)) : ($('#employeeReportQualify').html("------"))
  !isNullOrEmpty(employee.permanent_address)? ($('#employeeReportPerm').html(employee.permanent_address)) : ($('#employeeReportPerm').html("------"))
  !isNullOrEmpty(employee.correspondence_address)? ($('#employeeReportCorres').html(employee.correspondence_address)) : ($('#employeeReportCorres').html("------"))
  !isNullOrEmpty(employee.experiance)? ($('#employeeReportExp').html(employee.experiance+" "+(employee.experiance > 1 ? "years":"year"))) : ($('#employeeReportExp').html("------"))
  !isNullOrEmpty(employee.join_date)?($('#employeeReportJoin').html(new Date(employee.join_date).toLocaleDateString("en-US",Dateoptions))) : ($('#employeeReportJoin').html("------"))
  !isNullOrEmpty(employee.tech_qualification)? ($('#employeeReportTech').html(employee.tech_qualification)) : ($('#employeeReportTech').html("------"))
  !isNullOrEmpty(employee.status)? ($('#employeeReportLeft').html(employee.status)) : ($('#employeeReportLeft').html("------"))
  !isNullOrEmpty(employee.left_date) ?($('#employeeReportTLeftDate').html(new Date(employee.left_date).toLocaleDateString("en-US",Dateoptions))) : ($('#employeeReportTLeftDate').html("------"))

  !isNullOrEmpty(employee.bank_name)? ($('#employeeReportBank').html(employee.bank_name)) : ($('#employeeReportBank').html("------"))
  !isNullOrEmpty(employee.account_no)? ($('#employeeReportAccNo').html(employee.account_no)) : ($('#employeeReportAccNo').html("------"))
  !isNullOrEmpty(employee.IFSC_code)? ($('#employeeReportIfsc').html(employee.IFSC_code)) : ($('#employeeReportIfsc').html("------"))
  !isNullOrEmpty(employee.ESI_no)? ($('#employeeReportEsi').html(employee.ESI_no)) : ($('#employeeReportEsi').html("------"))
  !isNullOrEmpty(employee.pf_no)? ($('#employeeReportPf').html(employee.pf_no)) : ($('#employeeReportPf').html("------"))
  !isNullOrEmpty(employee.pan_no)? ($('#employeeReportPan').html(employee.pan_no)) : ($('#employeeReportPan').html("------"))
}
// ---------------------------------------------------------upload employee photo--------------------------------------------------------- //
function uploadEmployeePhoto(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#add_employee')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Employee/UploadEmployee",
    cache: false,
    contentType: false,
    processData: false,
    dataType : "JSON",
    data : upload_data,
    success: function(data){
      // console.log(data)
      if(data.error===false){
        Swal.fire({
          icon:'success',
          title:'File upload',
          text:'Successful'
        });
        var src =link+data.data.file_name;
        // var src=window.location.origin+'/rtc/uploads/'+data.data.file_name;
        $('#employee_photo').val(data.data.file_name);
        $('#employeePhotoFrame').attr("src",src);
      }
      else{
        Swal.fire({
          icon:'error',
          title:'File upload',
          text:'Failed ! PLease try again'
        });
      }
    } 
  });
  return false;
}
function uploadEmployeePhotoE(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#edit_employee')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Employee/UploadEmployee",
    cache: false,
    contentType: false,
    processData: false,
    dataType : "JSON",
    data : upload_data,
    success: function(data){
      // console.log(data)
      if(data.error===false){
        Swal.fire({
          icon:'success',
          title:'File upload',
          text:'Successful'
        });
        var src =link+data.data.file_name;
        // var src=window.location.origin+'/rtc/uploads/'+data.data.file_name;
        $('#employee_photoE').val(data.data.file_name);
        $('#employeePhotoFrameE').attr("src",src);
      }
      else{
        Swal.fire({
          icon:'error',
          title:'File upload',
          text:'Failed ! PLease try again'
        });
      }
    } 
  });
  return false;
}