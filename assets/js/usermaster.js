// $(document).ready(function(){
//          console.log($(location).attr("href"));
// });
function AuthorityStudent(){
  if($('#login_authority').val()=="student"){
    $('#login_id_username').val('');
    $('#login_id_name').val('');
    $('#login_id_name').attr("readonly",true);
  }
  else{
    $('#login_id_name').attr("readonly",false);
  }
}
function getUserInfo(){
  var id= $('#login_id_username').val();
  if(id!="" && $('#login_authority').val()=="student"){
    console.log(id)
    $.ajax({
          type : "POST",
          url  : "User/getStudentByadmno",
          // contentType: "application/json; charset=utf-8",
          dataType : "JSON",
          data : {id:id},
          success: function(data){
            console.table(data)
            if(data.error===false){
              $('#login_id_name').val(data.data[0].name_of_student);
              // $('#login_id_name').attr("readonly",true);
            }
            else{
              Swal.fire({
                icon: 'error',
                text: 'Student with admission no. '+id+' does not exist ',
                title: 'Add User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

              });
            }
          }
        });
        return false;
  }
}
function getUserInfoE(){
  var id= $('#login_id_usernameE').val();
  if(id!="" && $('#login_authorityE').val()=="student"){
    console.log(id)
    $.ajax({
          type : "POST",
          url  : "User/getStudentByadmno",
          // contentType: "application/json; charset=utf-8",
          dataType : "JSON",
          data : {id:id},
          success: function(data){
            console.table(data)
            if(data.error===false){
              $('#login_id_nameE').val(data.data[0].name_of_student);
              // $('#login_id_nameE').attr("readonly",true);
            }
            else{
              Swal.fire({
                icon: 'error',
                text: 'Student with admission no. '+id+' does not exist ',
                title: 'Add User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

              });
            }
          }
        });
        return false;
  }
}
$(window).load(function(){
    $('#onAddUser').on('click',function(e){
    e.preventDefault();
    if($('#add_user_master').valid()){
    if(($("#add_user_master [name='password']").val() === $("#add_user_master [name='confirm_password']").val())){
          $.ajax({
          type : "POST",
          url  : "User/saveUserMaster",
          // contentType: "application/json; charset=utf-8",
          dataType : "JSON",
          data : $('#add_user_master').serialize(),
          success: function(data){
            console.log(data)
            if(data.error===false){
              Swal.fire({
                timer: 5000,
                icon: 'success',
                text: 'Successful',
                title: 'Add User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
              });
                $("#add_user_master").trigger("reset");
                $(location).attr("href",'viewUserMaster');
            }
            else{
              Swal.fire({
                icon: 'error',
                text: data.text,
                title: 'Add User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

              });
            }
          }
        });
          return false;
    }
    else{
            Swal.fire({
                icon: 'error',
                text: 'Password and confirm password donot match',
                title: 'Add User',
              }); 
    }}
    });
    $('#onEditUser').on('click',function(e){
      e.preventDefault();
      if($('#edit_user_master').valid()){
        if(($("#edit_user_master [name='password']").val() === $("#edit_user_master [name='confirm_password']").val())){
        $.ajax({
            type : "POST",
            url  : "User/userById",
            // contentType: "application/json; charset=utf-8",
            dataType : "JSON",
            data : $('#edit_user_master').serialize(),
            success: function(data){
              console.log(data)
              if(data.error===false){
                Swal.fire({
                  timer: 5000,
                  icon: 'success',
                  text: 'Successful',
                  title: 'Edit User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                });
                $(location).attr("href",'viewUserMaster');
              }
              else if(data.error===true){
                Swal.fire({
                  icon: 'error',
                  text: data.text,
                  title: 'Edit User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                });
                // $(location).attr("href",'viewUserMaster');
              }
              else{
                Swal.fire({
                  icon: 'error',
                  text: data.text,
                  title: 'Edit User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                });
                // $(location).attr("href",'viewUserMaster');
              }
            }
          });
          return false;

      }
      else{
              Swal.fire({
                  icon: 'error',
                  text: 'Password and confirm password donot match',
                  title: 'Add User',
                }); 
      }}
      });
});

$(window).load(function(){
      var ullu =   $(location).attr("pathname");
      var splitullu = ullu.split('/');
      console.log(splitullu[2]);
      if(splitullu[2]=="viewUserMaster"){
        
          $.ajax({
              type : "POST",
              url  : "User/getUserTable",
              dataType : "JSON",
              success: function(data){
                console.log(data);
                if(data.error===false){
                 $('#userTable').DataTable({
                    processing: true,
                    data:data.data,
                    searching: true,
                    columns:[
                          { data: "login_id" },
                          { data: "name" },
                          { data: "email" },
                          { data: "authority" },
                          { data: null, defaultContent: "<i id="+'userClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                          { data: null, defaultContent: "<i id="+'userDelTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">delete_forever</i>"}
                        ],
                    paging:true,
                    info: true,    
                     language: {    
                         emptyTable: "No data available "   
                     },
                  });
                  $('#userTable tbody').on( 'click', '#userClickTable', function () {
                    var $row = $(this).closest('tr');
                    var data =  $('#userTable').DataTable().row($row).data();
                    console.log(data);
                    sessionStorage.setItem('latestUserEdit',JSON.stringify(data));
                    $(location).attr("href",'editUserMaster');
                  });
                  $('#userTable tbody').on( 'click', '#userDelTable', function () {
                    var $row = $(this).closest('tr');
                    var data =  $('#userTable').DataTable().row($row).data();
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
                            url  : "User/deleteById",
                            // contentType: "application/json; charset=utf-8",
                            dataType : "JSON",
                            data : data,
                            success: function(data){
                              // console.log(data)
                              if(data.error===false){
                                Swal.fire({
                                  timer: 5000,
                                  icon: 'success',
                                  text: 'Successful',
                                  title: 'Delete User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                });
                                $(location).attr("href",'viewUserMaster');
                              }
                              else{
                                Swal.fire({
                                  icon: 'error',
                                  text: 'Some error occured',
                                  title: 'Delete User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                });
                                $(location).attr("href",'viewUserMaster');
                              }
                            }
                          });
                          return false;
                      }
                    });
                  });
                  // var dt = $('#userTable').dataTable();
                  Swal.close();
                }
                else{
                  Swal.fire({
                    timer: 2000,
                    icon: 'error',
                    text: 'Server Down , please try again after sometime',
                    title: 'View User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                    willClose: () => {clearInterval(timerInterval)}
                  }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                    // console.log('I was closed by the timer')
                    $(location).attr("href","<?php echo base_url(); ?>dashboard");
                  }
                })
                }
              }
            });
            return false;
      }
      if(splitullu[2]=="editUserMaster"){
        // Swal.fire({
        //     icon: 'info',
        //     text: 'Please wait while we are fetching details',
        //     title: 'Edit User',
        //     didOpen: () => { Swal.showLoading() },swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
        //   });
        var user=JSON.parse(sessionStorage.getItem('latestUserEdit'));
        console.log(user);
        var form = $('#edit_user_master');
        $.each(user, function(key, value) {
          form.find("input[name='" + key + "']").val(value).focus();
          form.find("select[name='" + key + "']").val(value).change();
       });
       Swal.close();
       if(user.authority=="student"){
        $('#login_id_nameE').attr("readonly",true)
       }
       else{
        $('#login_id_nameE').attr("readonly",false)
       }
      }
      if(splitullu[2]=="appliedCandidate"){
          $.ajax({
              type : "POST",
              url  : "Home/getAppliedCandidate",
              dataType : "JSON",
              success: function(data){
                console.log(data.data);
                if(data.error===false || data.error===true){
                 $('#appliedCandidateTable').DataTable({
                    processing: true,
                    data:data.data,
                    columns:[
                          { data:null, render: function(data, type, full, meta) {return meta.row+1;}},
                          { data: "st_name" },
                          { data: "exam_school_name" },
                          { data: "exam_board" },
                          { data: "father_name" },
                          { data: "mother_name" },
                          {
                                  data: "is_shortlisted",
                                  render: function(data, type, full, meta) {
                                                  if (data == "NO") {
                                                      return "<span class='label bg-red'>Not Shortlisted</span>"
                                                  }else{
                                                      return "<span class='label bg-green'>Shortlisted</span>"
                                                  }
                                  }
                          },
                          // { data: "is_shortlisted", defaultContent: "<i id="+'userClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                          {
                                  data: "is_shortlisted",
                                  render: function(data, type, full, meta) {
                                                  if (data == "NO") {
                                                      return "<i id="+'appliedSwitchApplied'+" class="+'material-icons'+" style="+'cursor:pointer'+">assignment_late</i>"
                                                  }else{
                                                      return "<i id="+'appliedSwitchShortlist'+" class="+'material-icons'+" style="+'cursor:pointer'+">assignment_turned_in</i>"
                                                  }
                                  }
                          },
                          { data: null, defaultContent: "<i id="+'appliedView'+" class="+'material-icons'+" style="+'cursor:pointer'+">remove_red_eye</i>"}
                        ],
                    paging:false,
                    info: true,
                     language: {    
                         emptyTable: "No data available "   
                     },
                  });
                 $('#appliedCandidateTable tbody').on('click', '#appliedView', function() {
                          var $row = $(this).closest('tr');
                          var data = $('#appliedCandidateTable').DataTable().row($row).data();
                          console.log(data);
                           $.ajax({
                            type : "POST",
                            url  : "Home/storeSessionAppliedCandidate",
                            dataType : "JSON",
                            data : {id: data.id},
                            success: function(data){
                              $(location).attr("href", 'CandidateReport');
                            }
                          });
                          // sessionStorage.setItem('CandidateReport', JSON.stringify(data));
                          // $(location).attr("href", 'CandidateReport');
                  });
                  $('#appliedCandidateTable tbody').on( 'click', '#appliedSwitchApplied', function () {
                    var $row = $(this).closest('tr');
                    var dataApi =  $('#appliedCandidateTable').DataTable().row($row).data();
                    console.log(data);
                    Swal.fire({
                      title: 'Shortlist Candidate?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, Shortlist!'
                    }).then((result) => {
                      Swal.fire({
                                icon: 'info',
                                text: 'We are shortlisting and sending an email',
                                // title: 'Getting Details',
                                didOpen: () => { Swal.showLoading() },
                                swaltoast: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false
                        });
                      if (result.isConfirmed) {
                        $.ajax({
                            type : "POST",
                            url  : "Home/makeShortlist",
                            dataType : "JSON",
                            data : dataApi,
                            success: function(data){
                              // console.log(data)
                              Swal.close();
                              if(data.error===false || data.error===true){
                                Swal.fire({
                                  // timer: 5000,
                                  icon: 'success',
                                  text: data.data,
                                  title: 'Shortlist Applicant',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                });
                                updateTable();
                              }
                              else{
                                Swal.fire({
                                  icon: 'error',
                                  text: data.data,
                                  title: 'Shortlist Applicant',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                });
                              }
                            }
                          });
                          return false;
                      }
                    });
                  });
                 Swal.close();
                }
                else{
                //   Swal.fire({
                //     timer: 2000,
                //     icon: 'error',
                //     text: 'Server Down , please try again after sometime',
                //     title: 'View User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                //     willClose: () => {clearInterval(timerInterval)}
                //   }).then((result) => {
                //   if (result.dismiss === Swal.DismissReason.timer) {
                //     // console.log('I was closed by the timer')
                //     $(location).attr("href","<?php echo base_url(); ?>dashboard");
                //   }
                // })
                }
              }
            });
            return false;
      }
      if(splitullu[2]=="shortlistedCandidate"){
          $.ajax({
              type : "POST",
              url  : "Home/getShortListedCandidate",
              dataType : "JSON",
              success: function(data){
                console.table(data.data);
                if(data.error===false || data.error===true){
                 $('#shortListedCandidateTable').DataTable({
                    processing: true,
                    data:data.data,
                    searching: true,
                    responsive:true,
                    columns:[
                          { data:null, render: function(data, type, full, meta) {return meta.row+1;}},
                          { data: "st_name" },
                          { data: "exam_school_name" },
                          { data: "exam_board" },
                          { data: "father_name" },
                          { data: "mother_name" },
                          {
                                  data: "isAdmissionPay",
                                  render: function(data, type, full, meta) {
                                                  if (data == "NO") {
                                                      return "<span class='label bg-red'>Payment not made</span>"
                                                  }else{
                                                      return "<span class='label bg-green'>Payment Done</span>"
                                                  }
                                  }
                          },
                          { data: null, defaultContent: "<i id="+'appliedView'+" class="+'material-icons'+" style="+'cursor:pointer'+">remove_red_eye</i>"}
                        ],
                    paging:false,
                    info: true,    
                     language: {    
                         emptyTable: "No data available "   
                     },
                  });
                 $('#shortListedCandidateTable tbody').on('click', '#appliedView', function() {
                          var $row = $(this).closest('tr');
                          var data = $('#shortListedCandidateTable').DataTable().row($row).data();
                          console.log(data);
                           $.ajax({
                            type : "POST",
                            url  : "Home/storeSessionAppliedCandidate",
                            dataType : "JSON",
                            data : {id: data.id},
                            success: function(data){
                              $(location).attr("href", 'CandidateReport');
                            }
                          });
                          // sessionStorage.setItem('CandidateReport', JSON.stringify(data));
                          // $(location).attr("href", 'CandidateReport');
                  });
                }
                else{
                  Swal.fire({
                    timer: 2000,
                    icon: 'error',
                    text: 'Server Down , please try again after sometime',
                    title: 'View User',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                    willClose: () => {clearInterval(timerInterval)}
                  }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                    // console.log('I was closed by the timer')
                    $(location).attr("href","<?php echo base_url(); ?>dashboard");
                  }
                })
                }
              }
            });
            return false;
      }
});

function updateTable(){
  clearTable("#appliedCandidateTable");
  $.ajax({
              type : "POST",
              url  : "Home/getAppliedCandidate",
              dataType : "JSON",
              success: function(data){
                console.table(data.data);
                if(data.error===false || data.error===true){
                 $('#appliedCandidateTable').DataTable({
                    processing: true,
                    data:data.data,
                    columns:[
                          { data:null, render: function(data, type, full, meta) {return meta.row+1;}},
                          { data: "st_name" },
                          { data: "exam_school_name" },
                          { data: "exam_board" },
                          { data: "father_name" },
                          { data: "mother_name" },
                          {
                                  data: "is_shortlisted",
                                  render: function(data, type, full, meta) {
                                                  if (data == "NO") {
                                                      return "<span class='label bg-red'>Not Shortlisted</span>"
                                                  }else{
                                                      return "<span class='label bg-green'>Shortlisted</span>"
                                                  }
                                  }
                          },
                          // { data: "is_shortlisted", defaultContent: "<i id="+'userClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                          {
                                  data: "is_shortlisted",
                                  render: function(data, type, full, meta) {
                                                  if (data == "NO") {
                                                      return "<i id="+'appliedSwitchApplied'+" class="+'material-icons'+" style="+'cursor:pointer'+">assignment_late</i>"
                                                  }else{
                                                      return "<i id="+'appliedSwitchShortlist'+" class="+'material-icons'+" style="+'cursor:pointer'+">assignment_turned_in</i>"
                                                  }
                                  }
                          },
                          { data: null, defaultContent: "<i id="+'appliedView'+" class="+'material-icons'+" style="+'cursor:pointer'+">remove_red_eye</i>"}
                        ],
                    paging:false,
                    info: true,
                     language: {    
                         emptyTable: "No data available "   
                     },
                  });
}}})}
  function clearTable(tableName){
        var tableId = ""+tableName+"";
        var tableObj = $(""+tableName+"").DataTable();
        if (tableObj != null) {
                tableObj.clear();
                tableObj.destroy();
                $('#fees_pay_form').trigger("reset");
        }
        $(tableId + " tbody").empty();
}
function shortListFromReport(id){
  // console.log(id)
  Swal.fire({
          title: 'Shortlist Candidate?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Shortlist!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type : "POST",
                url  : "Home/makeShortlist",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                  // console.log(data)
                  if(data.error===false || data.error===true){
                    Swal.fire({
                      // timer: 5000,
                      icon: 'success',
                      text: data.data,
                      title: 'Shortlist Applicant',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                    });
                    location.reload();
                  }
                  else{
                    Swal.fire({
                      icon: 'error',
                      text: data.data,
                      title: 'Shortlist Applicant',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                    });
                  }
                }
              });
              return false;
          }
        });
}
// if(key == "password" || key == "confirm_password"){
//             var val = <?php echo $this->encryption->decrypt(?> value <?php) ?>;
//             form.find("input[name='" + key + "']").val(val).focus();
//           }
//           else{
//             form.find("input[name='" + key + "']").val(value).focus();
//             form.find("select[name='" + key + "']").val(value).change();
//           }