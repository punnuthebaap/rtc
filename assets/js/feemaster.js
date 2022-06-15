// $(document).ready(function(){
//          console.log($(location).attr("href"));
// });
$(window).load(function(){
  $('#onAddFeeHead').on('click',function(e){
  e.preventDefault();
  console.log("Hello  errors")
  if($('#add_fee_head').valid()){
    console.log("Hello without errors")
    $.ajax({
        type : "POST",
        url  : "Fee/saveFeeHead",
        // contentType: "application/json; charset=utf-8",
        dataType : "JSON",
        data : $('#add_fee_head').serialize(),
        success: function(data){
          // console.log(data)
          if(data.error===false){
            Swal.fire({
              timer: 5000,
              icon: 'success',
              text: 'Successful',
              title: 'Add Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
            });
             $("#add_fee_head").trigger("reset");
             $(location).attr("href","add-feeHead");
          }
          else{
            Swal.fire({
              icon: 'error',
              text: 'Add Fee Head Failed , please try agin after sometime',
              title: 'Add Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

            });
          }
        }
      });
      return false;
  }
  });
  $('#onEditFeeHead').on('click',function(e){
    e.preventDefault();
    if($('#edit_fee_head').valid()){
      $.ajax({
          type : "POST",
          url  : "Fee/feeHeadById",
          // contentType: "application/json; charset=utf-8",
          dataType : "JSON",
          data : $('#edit_fee_head').serialize(),
          success: function(data){
            // console.log(data)
            if(data.error===false){
              Swal.fire({
                timer: 5000,
                icon: 'success',
                text: 'Successful',
                title: 'Edit Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
              });
              $(location).attr("href",'viewFeeHead');
            }
            else{
              Swal.fire({
                icon: 'error',
                text: data.text,
                title: 'Edit Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
              });
              $(location).attr("href",'viewFeeHead');
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
      if(splitullu[2]=="viewFeeHead"){
          $.ajax({
              type : "POST",
              url  : "Fee/getFeeHead",
              dataType : "JSON",
              success: function(data){
                console.log(data)
                if(data.error===false){
                        $('#feeTable').DataTable({
                            processing: true,
                            data:data.data,
                            searching: true,
                            paging:false,
                            columns:[
                                  { data: "fee_id" },
                                  { data: "fee_head1" },
                                  { data: "fee_type" },
                                  { data: null, defaultContent: "<i id="+'feeHeadClickTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">edit</i>"},
                                  { data: null, defaultContent: "<i id="+'feeHeadDelTable'+" class="+'material-icons'+" style="+'cursor:pointer'+">delete_forever</i>"}
                                ],
                                columnDefs: [
                                     {
                                        targets: [3,4],
                                        render: function (data, type, row, meta){
                                          var obj =JSON.parse(sessionStorage.getItem('loginCredentials'));
                                          if(obj.authority!="admin"){
                                            $('#feeTable').DataTable().columns([3,4]).visible(false);
                                          }
                                        }
                                    },
                            ],
                            info: true,    
                            language: {    
                                emptyTable: "No data available "   
                            },
                          }); 
                          $('#feeTable tbody').on( 'click', '#feeHeadClickTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#feeTable').DataTable().row($row).data();
                            console.log(data);
                            sessionStorage.setItem('latestFeeHeadEdit',JSON.stringify(data));
                            $(location).attr("href",'editFeeHead');
                          });
                          $('#feeTable tbody').on( 'click', '#feeHeadDelTable', function () {
                            var $row = $(this).closest('tr');
                            var data =  $('#feeTable').DataTable().row($row).data();
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
                                url  : "Fee/deleteById",
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
                                      title: 'Delete Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                                    });
                                    $(location).attr("href",'viewFeeHead');
                                  }
                                  else{
                                    Swal.fire({
                                      icon: 'error',
                                      text: 'Some error occured',
                                      title: 'Delete Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
                                    });
                                    $(location).attr("href",'viewFeeHead');
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
                    title: 'View Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
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
      if(splitullu[2]=="viewFeeStructure"){
        var urlApi="";var dataApi;var cl="";
        if(obj.authority=="student"){
                  urlApi="Fee/getFeeStructureByClassSection";
                  dataApi={class:student.class,section:student.section};
                  cl="class";
                  // console.log(student.class+""+student.section)
          }
          else{
                  urlApi="Fee/getFeeStructure";
                  dataApi={};
                  cl="class_roman";
          }
          $.ajax({
              type : "POST",
              url  : urlApi,
              dataType : "JSON",
              data:dataApi,
              success: function(data){
                console.log(data)
                if(data.error===false || data.error===true){
                  // var columns=[{title:'Class'}];
                  // for (var i in data.fee_head) {
                  //   columns.push({title: data.fee_head[i].fee_head1});
                  // }
                  
                  //   const classDistinct = [...new Set(data.data.map(x=>x.class))]
                  //   columns.push({class:classDistinct});
                  
                  // console.log(columns);
                        $('#feeStructureTable').DataTable({
                            processing: true,
                            responsive:true,
                            data:data.data,
                            searching: true,
                            paging:false,
                            initComplete: function(settings){
                                                    if(obj.authority=="student"){
                                                             $('#feeStructureTable').DataTable().columns([0,3]).visible(false);
                                                    }
                            },
                            columns: [
                              // {title:'fee_head.fee_head1',data:'error'}
                              {data:cl},
                              {data:'fee_head'},
                              {data:'fee'},
                              {data:'optional'},
                            ],
                            // columnDefs:[
                            //       {title:"fee_head.fee_head1"},
                            // ],
                          }); 
                  Swal.close();
                }
                else{
                  Swal.fire({
                    timer: 2000,
                    icon: 'error',
                    text: 'Server Down , please try again after sometime',
                    title: 'View Fee Head',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,
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
      if(splitullu[2]=="editFeeHead"){
        var user=JSON.parse(sessionStorage.getItem('latestFeeHeadEdit'));
        console.log(user);
        var form = $('#edit_fee_head');
        $.each(user, function(key, value) {
          form.find("input[name='" + key + "']").val(value).focus();
          form.find("select[name='" + key + "']").val(value).change();
       });
       Swal.close();
      }
});