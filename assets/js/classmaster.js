function isNullOrEmpty (value) {
    return (!value || value == undefined || value == "" || value.length == 0);
}
$(window).load(function(){
        $('#onAddClass').on('click',function(e){
        e.preventDefault();
        if($('#add_class_master').valid()){
          $.ajax({
              type : "POST",
              url  : "ClassM/saveClassMaster",
              // contentType: "application/json; charset=utf-8",
              dataType : "JSON",
              data : $('#add_class_master').serialize(),
              success: function(data){
                // console.log(data)
                if(data.error===false){
                  Swal.fire({
                    timer: 5000,
                    icon: 'success',
                    text: 'Successful',
                    title: 'Add Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                  });
                   $("#add_class_master").trigger("reset");
                   $(location).attr("href","viewClassMaster");
                }
                else if(data.error===true){
                  Swal.fire({
                    icon: 'error',
                    text: data.data,
                    title: 'Add Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

                  });
                }
                else{
                  Swal.fire({
                    icon: 'error',
                    text: 'Add Class Failed , please try agin after sometime',
                    title: 'Add Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                  });
                }
              }
            });
            return false;
        }
        });
        $('#onEditClass').on('click',function(e){
          e.preventDefault();
          if($('#edit_class_master').valid()){
             $.ajax({
                type : "POST",
                url  : "ClassM/classById",
                // contentType: "application/json; charset=utf-8",
                dataType : "JSON",
                data : $('#edit_class_master').serialize(),
                success: function(data){
                  // console.log(data)
                  if(data.error===false){
                    Swal.fire({
                      timer: 5000,
                      icon: 'success',
                      text: 'Successful',
                      title: 'Edit Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                    });
                    $(location).attr("href",'viewClassMaster');
                  }
                  else{
                    Swal.fire({
                      icon: 'error',
                      text: data.data,
                      title: 'Edit Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                    });
                    // $(location).attr("href",'viewClassMaster');
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
      if(splitullu[2]=="viewClassMaster"){
          $.ajax({
              type : "POST",
              url  : "ClassM/getClassTable",
              dataType : "JSON",
              success: function(data){
                console.log(data)
                if(data.error===false){
                        $('#classTable').DataTable({
                            processing: true,
                            data:data.data,
                            searching: true,
                            columns:[
                                  { data: "sl_no" },
                                  { data: "class" },
                                  { data: "section" },
                                  { data: "class_teacher" },
                                  { data: "class_roman" },
                                  { data: null, defaultContent: "<i id="+'classClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                          { data: null, defaultContent: "<i id="+'classDelTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">delete_forever</i>"}
                                ],
                                columnDefs: [
                                     {
                                        targets: [5,6],
                                        render: function (data, type, row, meta){
                                          var obj =JSON.parse(sessionStorage.getItem('loginCredentials'));
                                          if(obj.authority!="admin"){
                                            $('#classTable').DataTable().columns([5,6]).visible(false);
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
                          $('#classTable tbody').on( 'click', '#classClickTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#classTable').DataTable().row($row).data();
                            console.log(data);
                            sessionStorage.setItem('latestClassEdit',JSON.stringify(data));
                            $(location).attr("href",'editClassMaster');
                          });
                          $('#classTable tbody').on( 'click', '#classDelTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#classTable').DataTable().row($row).data();
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
                                url  : "ClassM/deleteById",
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
                                      title: 'Delete Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                    });
                                    $(location).attr("href",'viewClassMaster');
                                  }
                                  else{
                                    Swal.fire({
                                      icon: 'error',
                                      text: 'Some error occured',
                                      title: 'Delete Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                    });
                                    $(location).attr("href",'viewClassMaster');
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
                    title: 'View Class',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
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
      if(splitullu[2]=="editClassMaster"){
        var user=JSON.parse(sessionStorage.getItem('latestClassEdit'));
        console.log(user);
        var form = $('#edit_class_master');
        $.each(user, function(key, value) {
          form.find("input[name='" + key + "']").val(value).focus();
          form.find("select[name='" + key + "']").val(value).change();
       });
       Swal.close();
      }
});