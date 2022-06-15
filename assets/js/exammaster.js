var marksArray=[];
const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      // timer: 3000,
                      // timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })
function getsectionExamType(){
  $.ajax({
                type: "POST",
                url: "Exam/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('add_exam_type').class.value },
                success: function(data) {
                        if (data.error === false) {
                                console.log(data);
                                appendSection(data.data);
                        }
                        else if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Get Section',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getsectionExamTypeEdit(){
  // console.log("into edit")
  $.ajax({
                type: "POST",
                url: "Exam/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('edit_exam_type').class.value },//it is class in local but classes in live
                success: function(data) {
                        if (data.error === false) {
                                console.log(data);
                                appendSectionE(data.data);
                        }
                        else if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Get Section',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getSectionExamMaster(){
  $.ajax({
                type: "POST",
                url: "Exam/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('add_exam_master').class.value },//it is class in local but classes in live
                success: function(data) {
                        if (data.error === false) {
                                console.log(data);
                                appendSectionMas(data.data);
                        }
                        else if (data.error) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Get Section',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getSectionExamMasterE(){
  $.ajax({
                type: "POST",
                url: "Exam/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('edit_exam_master').class.value },//it is class in local but classes in live
                success: function(data) {
                        if (data.error === false) {
                                console.log(data);
                                appendSectionMasE(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Get Section',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getExamType(){
  $.ajax({
                type: "POST",
                url: "Exam/getExamTypeByClassSection",
                dataType: "JSON",
                data: { class: document.getElementById('classExamMaster').value,section:document.getElementById('ExamMasterSection1').value },
                success: function(data) {
                        if (data.error === false) {
                                console.log(data);
                                appendExamTypes(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Get Section',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getExamTypeE(){
  var user=JSON.parse(sessionStorage.getItem('latestExamMasterEdit'));
  if(user==null){
    $(location).attr("href","logout");
  }
  var CLASS=user.class;
  var SECTION=user.section;
  $.ajax({
                type: "POST",
                url: "Exam/getExamTypeByClassSection",
                dataType: "JSON",
                data: { class: CLASS, section:SECTION },
                success: function(data) {
                        if (data.error === false) {
                                console.log(data);
                                appendExamTypesE(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Exam Type Found for the selected class ! Please add a Exam Type for the selected class to continue',
                                        title: 'Get Exam Type',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getSub() {
  $.ajax({
                type: "POST",
                url: "Exam/getSubjectExamMaster",
                dataType: "JSON",
                data: { class: document.getElementById('add_exam_master').class.value, section:document.getElementById('add_exam_master').section.value },
                success: function(data) {
                        if (data.error === false) {
                                var $select = $('#subjectExamMas').empty();
                                data.data.sort(function(a, b) {
                                  var textA = a.section.toUpperCase();
                                  var textB = b.section.toUpperCase();
                                  return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                              });
                                ($('<option/>').text("Select a subject *")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                        var o = $('<option/>', { value: data.data[i].subject }).text(data.data[i].subject);
                                        o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Subject Found for the selected class ! Please add a Subject for the selected class to continue',
                                        title: 'Get Subject',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function getSubE() {
  var user=JSON.parse(sessionStorage.getItem('latestExamMasterEdit'));
  if(user==null){
    $(location).attr("href","logout");
  }
  var CLASS=user.class;
  var SECTION=user.section;
  $.ajax({
                type: "POST",
                url: "Exam/getSubjectExamMaster",
                dataType: "JSON",
                data: { class: CLASS, section:SECTION },
                success: function(data) {
                  console.log(data);
                        if (data.error === false) {
                                var $select = $('#subjectExamMasE').empty();
                                data.data.sort(function(a, b) {
                                      var textA = a.subject.toUpperCase();
                                      var textB = b.subject.toUpperCase();
                                      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                                  });
                                var user=JSON.parse(sessionStorage.getItem('latestExamMasterEdit'));
                                if(user==null){
                                    $(location).attr("href","logout");
                                  }
                                for (var i = 0; i < data.data.length; i++) {
                                        var o = $('<option/>', { value: data.data[i].subject }).text(data.data[i].subject).prop('selected', data.data[i].subject == user.subject);
                                        o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        timer: 5000,
                                        icon: 'error',
                                        text: 'No Subject Found for the selected class ! Please add a Subject for the selected class to continue',
                                        title: 'Get Subject',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                        }
                },
        });
}
function appendSection(data) {
        // console.log(data);
        var $select = $('#ExamTypeSection1').empty();
        data.sort(function(a, b) {
              var textA = a.section.toUpperCase();
              var textB = b.section.toUpperCase();
              return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
        ($('<option/>').text("Select a section")).appendTo($select);
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
}
function appendSectionMas(data) {
        // console.log(data);
        data.sort(function(a, b) {
              var textA = a.section.toUpperCase();
              var textB = b.section.toUpperCase();
              return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
        var $select = $('#ExamMasterSection1').empty();
        ($('<option/>').text("Select a section")).appendTo($select);
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
}
function appendSectionMasE(data) {
        // console.log(data);
        data.sort(function(a, b) {
              var textA = a.section.toUpperCase();
              var textB = b.section.toUpperCase();
              return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
        var $select = $('#ExamMasterSectionE').empty();
        var user=JSON.parse(sessionStorage.getItem('latestExamMasterEdit'));
        if(user==null){
            $(location).attr("href","logout");
          }
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section).prop('selected', data[i].section == user.section);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
}
function appendSectionE(data) {
        // console.log(data);
        data.sort(function(a, b) {
              var textA = a.section.toUpperCase();
              var textB = b.section.toUpperCase();
              return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
        var user=JSON.parse(sessionStorage.getItem('latestExamTypeEdit'));
        if(user==null){
            $(location).attr("href","logout");
          }
        var $select = $('#ExamTypeSectionE').empty();

        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section).prop('selected', data[i].section == user.section);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
}
function appendExamTypes(data){
        var $select = $('#examType1').empty();
        data.sort(function(a, b) {
              var textA = a.exam_names.toUpperCase();
              var textB = b.exam_names.toUpperCase();
              return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
        ($('<option/>').text("Select an exam type")).appendTo($select);
          for (var i = 0; i < data.length; i++) {
                  var o = $('<option/>', { value: data[i].exam_names }).text(data[i].exam_names);
                  o.appendTo($select);
          }
          $select.selectpicker('refresh');
}
function appendExamTypesE(data){
        var $select = $('#examTypeE').empty();
        data.sort(function(a, b) {
              var textA = a.exam_names.toUpperCase();
              var textB = b.exam_names.toUpperCase();
              return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
        var user=JSON.parse(sessionStorage.getItem('latestExamMasterEdit'));
        if(user==null){
            $(location).attr("href","logout");
          }
          for (var i = 0; i < data.length; i++) {
                  var o = $('<option/>', { value: data[i].exam_names }).text(data[i].exam_names).prop('selected', data[i].exam_names == user.exam_type);
                  o.appendTo($select);
          }
          $select.selectpicker('refresh');
}
$(window).load(function(){
  $('#onAddExamType').on('click',function(e){
  e.preventDefault();
  if($('#add_exam_type').valid()){
    $.ajax({
        type : "POST",
        url  : "Exam/saveExamType",
        // contentType: "application/json; charset=utf-8",
        dataType : "JSON",
        data : $('#add_exam_type').serialize(),
        success: function(data){
          // console.log(data)
          if(data.error===false){
            Swal.fire({
              // timer: 5000,
              icon: 'success',
              text: 'Successful',
              title: 'Add Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
            });
             $("#add_exam_type").trigger("reset");
             $(location).attr("href","viewExamType");
          }
          else{
            Swal.fire({
              icon: 'error',
              text: 'Add Exam Type Failed , please try agin after sometime',
              title: 'Add Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

            });
          }
        }
      });
      return false;
  }
  });
  // exammaster add
  $('#onAddExamMaster').on('click',function(e){
  e.preventDefault();
  if($('#add_exam_master').valid()){
     $.ajax({
        type : "POST",
        url  : "Exam/saveExamMaster",
        // contentType: "application/json; charset=utf-8",
        dataType : "JSON",
        data : $('#add_exam_master').serialize(),
        success: function(data){
          // console.log(data)
          if(data.error===false){
            Swal.fire({
              // timer: 5000,
              icon: 'success',
              text: 'Successful',
              title: 'Add Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
            });
             $("#add_exam_master").trigger("reset");
             $(location).attr("href","viewExamMaster");
          }
          else{
            Swal.fire({
              icon: 'error',
              text: 'Add Exam Master Failed , please try agin after sometime',
              title: 'Add Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

            });
          }
        }
      });
      return false;
  }
  });
  // edit exam type
  $('#onEditExamType').on('click',function(e){
    e.preventDefault();
    // console.log($('#edit_exam_type').serialize());
    if($('#edit_exam_type').valid()){
       $.ajax({
          type : "POST",
          url  : "Exam/examTypeById",
          // contentType: "application/json; charset=utf-8",
          dataType : "JSON",
          data : $('#edit_exam_type').serialize(),
          success: function(data){
            // console.log(data)
            if(data.error===false){
              Swal.fire({
                // timer: 5000,
                icon: 'success',
                text: data.text,
                title: 'Edit Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
              });
              $(location).attr("href",'viewExamType');
            }
            else if(data.error===true){
              Swal.fire({
                // timer: 5000,
                icon: 'error',
                text: data.text,
                title: 'Edit Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
              });
            }
            else{
              Swal.fire({
                icon: 'error',
                text: data.text,
                title: 'Edit Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
              });
              $(location).attr("href",'viewExamType');
            }
          }
        });
        return false;
    }
    });
  // edit exam master
  $('#onEditExamMaster').on('click',function(e){
    e.preventDefault();
    // console.log($('#edit_exam_master').serialize())
    if($('#edit_exam_master').valid()){
       $.ajax({
          type : "POST",
          url  : "Exam/examMasterById",
          // contentType: "application/json; charset=utf-8",
          dataType : "JSON",
          data : $('#edit_exam_master').serialize(),
          success: function(data){
            // console.log(data)
            if(data.error===false){
              Swal.fire({
                // timer: 5000,
                icon: 'success',
                text: data.text,
                title: 'Edit Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
              });
              $(location).attr("href",'viewExamMaster');
            }
            else if(data.error===true){
              Swal.fire({
                // timer: 5000,
                icon: 'error',
                text: data.text,
                title: 'Edit Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
              });
            }
            else{
              Swal.fire({
                icon: 'error',
                text: data.text,
                title: 'Edit Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
              });
              $(location).attr("href",'viewExamMaster');
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
      console.log(splitullu[2]);
      if(splitullu[2]=="viewExamType"){
          $.ajax({
              type : "POST",
              url  : "Exam/getExamType",
              dataType : "JSON",
              success: function(data){
                console.log(data)
                if(data.error===false){
                        $('#examTypeTable').DataTable({
                            processing: true,
                            data:data.data,
                            searching: true,
                            columns:[
                                  // { data: "exam_id" },
                                  { data: "exam_names" },
                                  { data: "exam_order" },
                                  { data: "class" },//online it is classes so please change it whenever you are uploading
                                  { data: "section" },
                                  { data: null, defaultContent: "<i id="+'examTypeClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                                  { data: null, defaultContent: "<i id="+'examTypeDelTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">delete_forever</i>"}
                                ],
                                  columnDefs: [
                                       {
                                          targets: [4,5],
                                          render: function (data, type, row, meta){
                                            var obj =JSON.parse(sessionStorage.getItem('loginCredentials'));
                                            if(obj==null){
                                                $(location).attr("href","logout");
                                              }
                                            if(obj.authority!="admin"){
                                              $('#examTypeTable').DataTable().columns([4,5]).visible(false);
                                            }
                                          }
                                      },
                              ],
                                paging:true,
                                info: true,    
                                language: {    
                                    emptyTable: "No data available "   
                                },
                          });
                          $('#examTypeTable tbody').on( 'click', '#examTypeClickTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#examTypeTable').DataTable().row($row).data();
                            console.log(data);
                            sessionStorage.setItem('latestExamTypeEdit',JSON.stringify(data));
                            $(location).attr("href",'editExamType');
                          });
                          $('#examTypeTable tbody').on( 'click', '#examTypeDelTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#examTypeTable').DataTable().row($row).data();
                            // console.log(data);
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
                                url  : "Exam/deleteByIdexamType",
                                // contentType: "application/json; charset=utf-8",
                                dataType : "JSON",
                                data : data,
                                success: function(data){
                                  // console.log(data)
                                  if(data.error===false){
                                    Swal.fire({
                                      // timer: 5000,
                                      icon: 'success',
                                      text: 'Successful',
                                      title: 'Delete Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                    });
                                    $(location).attr("href",'viewExamType');
                                  }
                                  else{
                                    Swal.fire({
                                      icon: 'error',
                                      text: 'Some error occured',
                                      title: 'Delete Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                    });
                                    $(location).attr("href",'viewExamType');
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
                  Swal.fire({
                    timer: 2000,
                    icon: 'error',
                    text: 'Server Down , please try again after sometime',
                    title: 'View Exam Type',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
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
      if(splitullu[2]=="viewExamMaster"){
          $.ajax({
              type : "GET",
              url  : "Exam/getExamMaster",
              dataType : "JSON",
              success: function(data){
                console.log(data)
                if(data.error===false){
                        $('#examMasterTable').DataTable({
                            processing: true,
                            data:data.data,
                            searching: true,
                            initComplete: function(settings){
                                                if(obj.authority!="admin"){
                                              $('#examMasterTable').DataTable().columns([8,9]).visible(false);
                                            }
                                },
                            columns:[
                                  { data: "exam_type" },
                                  { data: "subject" },
                                  { data: "theory_F_marks" },
                                  { data: "theory_P_marks" },
                                  { data: "practical_F_marks" },
                                  { data: "practical_P_marks" },
                                  { data: "class" },
                                  { data: "section" },
                                  { data: null, defaultContent: "<i id="+'examMasterClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                                  { data: null, defaultContent: "<i id="+'examMasterDelTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">delete_forever</i>"}
                                ],
                              //   columnDefs: [
                              //          {
                              //             targets: [8,9],
                              //             render: function (data, type, row, meta){
                              //               // var obj =JSON.parse(sessionStorage.getItem('loginCredentials'));
                              //               // if(obj==null){
                              //               //     $(location).attr("href","logout");
                              //               //   }
                              //               if(obj.authority!="admin"){
                              //                 $('#examMasterTable').DataTable().columns([8,9]).visible(false);
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
                          $('#examMasterTable tbody').on( 'click', '#examMasterClickTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#examMasterTable').DataTable().row($row).data();
                            console.log(data);
                            sessionStorage.setItem('latestExamMasterEdit',JSON.stringify(data));
                            $(location).attr("href",'editExamMaster');
                          });
                          $('#examMasterTable tbody').on( 'click', '#examMasterDelTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#examMasterTable').DataTable().row($row).data();
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
                                url  : "Exam/deleteByIdexamMaster",
                                // contentType: "application/json; charset=utf-8",
                                dataType : "JSON",
                                data : data,
                                success: function(data){
                                  // console.log(data)
                                  if(data.error===false){
                                    Swal.fire({
                                      // timer: 5000,
                                      icon: 'success',
                                      text: 'Successful',
                                      title: 'Delete Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                    });
                                    $(location).attr("href",'viewExamMaster');
                                  }
                                  else{
                                    Swal.fire({
                                      icon: 'error',
                                      text: 'Some error occured',
                                      title: 'Delete Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                    });
                                    $(location).attr("href",'viewExamMaster');
                                  }
                                }
                              });
                              return false;
                                }
                              })
                          }); 
                  Swal.close();
                }
                else{
                  Swal.fire({
                    timer: 2000,
                    icon: 'error',
                    text: 'Server Down , please try again after sometime',
                    title: 'View Exam Master',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
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
      if(splitullu[2]=="editExamType"){
        // Swal.fire({
        //     icon: 'info',
        //     text: 'Please wait while we are fetching details',
        //     title: 'Edit Exam Type',
        //     didOpen: () => { Swal.showLoading() },swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
        //   });
        var user=JSON.parse(sessionStorage.getItem('latestExamTypeEdit'));
        if(user==null){
            $(location).attr("href","logout");
          }
        console.log(user);
        var form = $('#edit_exam_type');
        $.each(user, function(key, value) {
          form.find("input[name='" + key + "']").val(value).focus();
          form.find("select[name='" + key + "']").val(value).change();
       });

        
       Swal.close();
      }
      if(splitullu[2]=="editExamMaster"){
        // Swal.fire({
        //     icon: 'info',
        //     text: 'Please wait while we are fetching details',
        //     title: 'Edit Exam Master',
        //     didOpen: () => { Swal.showLoading() },swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
        //   });
        var user=JSON.parse(sessionStorage.getItem('latestExamMasterEdit'));
        if(user==null){
            $(location).attr("href","logout");
          }
        console.log(user);
        var form = $('#edit_exam_master');
        $.each(user, function(key, value) {
          form.find("input[name='" + key + "']").val(value).focus();
          form.find("select[name='" + key + "']").val(value).change();
       });
       Swal.close();
      }
});
// ==========================================================MARKS ENTRY========================================================== //
$('#classMarkEntry').change(function(){
  $.ajax({
                type: "POST",
                url: "Exam/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('classMarkEntry').value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                // appendSection(data.data);
                                var $select = $('#sectionMarkEntry').empty();
                                ($('<option/>').text("Select a section")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                  var o = $('<option/>', { value: data.data[i].section }).text(data.data[i].section);
                                  o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Get Section',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                var $select = $('#sectionMarkEntry').empty();
                                $select.selectpicker('refresh');
                                ($('<option/>').text("No Section Found for the selected class")).appendTo($select);
                                $select.selectpicker('refresh');
                        }
                },
        });
});
$('#sectionMarkEntry').change(function(){
  $.ajax({
                type: "POST",
                url: "Exam/getExamTypeByClassSection",
                dataType: "JSON",
                data: { class: document.getElementById('classMarkEntry').value,section:document.getElementById('sectionMarkEntry').value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                // appendExamTypes(data.data);
                                var $select = $('#examTypeMarkEntry').empty();
                                ($('<option/>').text("Select Exam Type")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                  var o = $('<option/>', { value: data.data[i].exam_names }).text(data.data[i].exam_names);
                                  o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No ExamType Found for the selected class ! Please add a ExamType for the selected class to continue',
                                        title: 'Get Exam Type',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                var $select = $('#examTypeMarkEntry').empty();
                                $select.selectpicker('refresh');
                                ($('<option/>').text("No ExamType Found for the selected section")).appendTo($select);
                                $select.selectpicker('refresh');
                        }
                },
        });
});
$('#examTypeMarkEntry').change(function(){
  var classEntry=document.getElementById('classMarkEntry').value;
  var sectionEntry=document.getElementById('sectionMarkEntry').value;
  var examEntry=document.getElementById('examTypeMarkEntry').value;
  if((classEntry!="")&&(sectionEntry!="")&&(examEntry!="")){
    $.ajax({
                type: "POST",
                url: "Exam/getMarksheet",
                dataType: "JSON",
                data: { class: classEntry,section:sectionEntry,examType:examEntry },
                success: function(data) {
                  // console.log(data);
                        if (data.error === false) {
                            ViewMarksheet(data,classEntry,sectionEntry,examEntry);
                        }
                        if (data.error === true) {
                        }
                },
        });
  }
});
function _clearTableMarks(){
        var tableId = "#markEntryTable";
            // var tableObj = $('#markEntryTable').DataTable( {
            //     destroy:true,
            //     retrieve:true,
            //               columns: [
            //                 null,
            //                 null,
            //                 null,
            //                 {
            //                   "data": "first_name", // can be null or undefined
            //                   "defaultContent": "<i>Not set</i>"
            //                 }
            //               ]
            //             } );
            // if (tableObj != null) {
            //         tableObj.clear();
            //         tableObj.destroy();
            // }
            $('#markEntryTable thead tr').empty();
            $('#markEntryTable tbody').empty();
    }

function ViewMarksheet(data,classEntry,sectionEntry,examEntry){
    // console.log(data);
    if(!data.isMarksheet){
            // to reinitialize the table //
            _clearTableMarks();
            // end to reinitialize the table //
            // creating object to generate the table //
            var source=createNewMarksArray(data,classEntry,sectionEntry,examEntry);
            // end creating object to generate the table //
            // console.table(source);
            const obj = {...source};
            var header=[];
            columnNames = Object.keys(source[0]);
            // console.log(columnNames)
            // console.log(source)
            for (var i in columnNames) {
                if(columnNames[i]=="admisstion_no"){
                  header.push({data: columnNames[i],title: "Admission No."});
                }
                else if(columnNames[i]=="name_of_student"){
                    header.push({data: columnNames[i],title: "Student Name"});
                }
                else{
                    header.push({data: columnNames[i],title: capitalizeFirstLetter(columnNames[i])});
                }
            }
            // console.log(header)
            // var editable=[];
            // for (var i in columnNames) {
            //     // if(columnNames[i]!=="admisstion_no"&&columnNames[i]!=="name_of_student"){
            //     //     editable.push([i,columnNames[i]]);
            //     // }
            //     editable.push([i,columnNames[i]]);
            // }
            // console.table(editable);
            const theader = $('#markEntryTable thead tr');
                 const tbody = $('#markEntryTable tbody');
            for(var i in columnNames){
                theader.append("<th>"+header[i].title+"</th>");
            }
            for(var i=0;i<=source.length-1;i++){
                var tr = $('<tr id='+i+'></tr>');
                for(var j=0;j<=header.length-1;j++){
                    if(header[j].data!="admisstion_no"&&header[j].data!="name_of_student"){
                        var str=header[j].data;
                        str = str.replace(/ /g, "_");
                        // console.log(str)
                        tr.append("<td class='rowDataInput'><input type='number' id="+str+"-"+i+" class='form-control' placeholder='Enter Marks' onblur='saveMarks()'></td>");
                    }
                    else{
                        tr.append("<td class='rowData'>"+source[i][header[j].data]+"</td>");
                    }
                }
                 // var $tr = $('<tr></tr>');
                 //    for (var j = 0; j < 4; j++) {
                 //        $tr.append('<td class="square"></td>');
                 //    }
                tbody.append(tr);
            }
            $('#markEntryTable').css("width", "100%");
            $('#viewMarkEntryTable').css("display", "block");
            $('#clickModal').click();
        }  
}
function createNewMarksArray(data,classEntry,sectionEntry,examEntry){
    var sourceArray=[];const main=data;
    for(var i=0;i<=main.student.length-1;i++)
    {
        sourceArray.push({'admisstion_no':main.student[i].admisstion_no , 'name_of_student':main.student[i].name_of_student});
    }
    for(var i=0;i<=main.student.length-1;i++)
    {
        for(var j=0;j<=main.subject.length-1;j++){
            sourceArray[i][main.subject[j].subject]='';
        }
    }
    // for(var i=0;i<=main.student.length-1;i++)
    // {
    //     sourceArray[i]['class']=classEntry;
    //     sourceArray[i]['section']=sectionEntry;
    //     sourceArray[i]['examType']=examEntry;
    // }
    return sourceArray;
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function convertFormToJSON(form) {
  const array = form; 
  const json = {};
  $.each(array, function () {
    json[this.name] = this.value || "";
  });
  return json;
}
function saveMarks(){
    var rowId = event.target.parentNode.parentNode.id;
    var data = document.getElementById(rowId).querySelectorAll(".rowData");
    var inputData = document.getElementById(rowId).querySelectorAll(".form-control");
    var marks={};
    for(var i=0;i<=data.length-1;i++){
        if(i==0){
            marks['admisstion_no']=data[i].innerHTML;
        }
        if(i==1){
            marks['name_of_student']=data[i].innerHTML;
        }
    }
    for(var i=0;i<=inputData.length-1;i++){
        // console.clear();
        // console.log(inputData[i].id)
        if(Number(document.getElementById(inputData[i].id).value) != 0){
            var newMark;
            var sub=inputData[i].id.split('-')[0];
            sub=sub.split("_").join(' ');
            newMark={class:document.getElementById('classMarkEntry').value ,
                    section:document.getElementById('sectionMarkEntry').value,
                    exam_type: document.getElementById('examTypeMarkEntry').value,
                    admisstion_no:marks['admisstion_no'],
                    name_of_student:marks['name_of_student'], 
                    subject:sub, 
                    mark:document.getElementById(inputData[i].id).value};
            getMarksArray(newMark);
        }
        if(document.getElementById(inputData[i].id).value==""){
            var removeObj;
            var sub=inputData[i].id.split('-')[0];
            sub=sub.split("_").join(' ');
            console.log(sub)
            removeObj={class:document.getElementById('classMarkEntry').value ,
                        section:document.getElementById('sectionMarkEntry').value,
                        exam_type: document.getElementById('examTypeMarkEntry').value,
                        admisstion_no:marks['admisstion_no'],
                        name_of_student:marks['name_of_student'], 
                        subject:sub, 
                        mark:document.getElementById(inputData[i].id).value};
            removeMarksArray(removeObj);
        }
    }
    // console.log(marksArray)
}  
function getMarksArray(currentObj){
    console.clear();
    // console.table(currentObj);
    if(marksArray.length===0){
        marksArray.push(currentObj);
    }
    else{
        const index=isMarksArrayHasCurrentObj(currentObj);
        if(index===-1){
            marksArray.push(currentObj);
        }
        else{
            marksArray[index].mark=currentObj.mark;
        }
    }
    console.table(marksArray);
}
function removeMarksArray(removeObj){
    console.clear();
    // console.table(removeObj)
    const index=isMarksArrayHasCurrentObj(removeObj);
    // console.log(index!=-1)
    if(index!=-1){
            marksArray.splice(index, 1);
    }
    console.table(marksArray)
}
function isMarksArrayHasCurrentObj(currentObj){
    const index = marksArray.findIndex(element => {
      if (element.admisstion_no === currentObj.admisstion_no && element.subject === currentObj.subject && element.exam_type === currentObj.exam_type) {
        return true;
      }
      return false;
    });
    return index;
}
function insertMarks(){
    // console.clear();
    console.log(marksArray);
    var classEntry=document.getElementById('classMarkEntry').value;
    var sectionEntry=document.getElementById('sectionMarkEntry').value;
    var examEntry=document.getElementById('examTypeMarkEntry').value;
    if(marksArray.length!==0){
        $.ajax({
                    type: "POST",
                    url: "Exam/marksEntryData",
                    dataType: "JSON",
                    data: { data:marksArray ,
                            class:document.getElementById('classMarkEntry').value ,
                            section:document.getElementById('sectionMarkEntry').value,
                            exam_type: document.getElementById('examTypeMarkEntry').value},
                    success: function(data) {
                      // console.log(data);
                            if (data.error === false) {
                                 Toast.fire({
                                  icon: 'success',
                                  title: 'Marks Entry',
                                  text: data.text
                                })
                            }
                            if (data.error === true) {
                                Toast.fire({
                                  icon: 'error',
                                  title: 'Marks Entry',
                                  text: data.text
                                })
                            }
                    },
            });
    }
    else{
        Swal.fire({icon:'error',title:'Marks Entry',text:'Enter marks to continue'});
    }
}
function resetMarks(){
    marksArray=[];
}
// ========================================================END MARKS ENTRY======================================================== //