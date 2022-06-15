// $(window).load(function() {
//         var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
//         if(obj!=null){
//           // const student=JSON.parse(sessionStorage.getItem('studentReport'));
//                 // if(obj.authority=="student"){
//                 //         $.ajax({
//                 //                 type: "POST",
//                 //                 url: "Student/getStudentByadmno",
//                 //                 dataType: "JSON",
//                 //                 data: { admno: obj.login_id },
//                 //                 success: function(data) {
//                 //                         console.log(data)
//                 //                         if (data.error === false) {
//                 //                                 sessionStorage.setItem('studentReport', JSON.stringify(data.data[0]));
//                 //                         }
//                 //                         if (data.error === true) {}
//                 //                 },
//                 //         });
//                 // }
//         }
// });
const student = JSON.parse(sessionStorage.getItem('studentReport'));

function getsection() {
        $('#sectionAddAssign').empty();
        $.ajax({
                type: "POST",
                url: "Assignment/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('add_assignment').class.value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                appendSectionOptions(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Add Assignment',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                resetSection();
                        }
                },
        });
}

function getsubject() {
        $('#subjectAddAssign').empty();
        $.ajax({
                type: "POST",
                url: "Assignment/getSubject",
                dataType: "JSON",
                data: { class: document.getElementById('add_assignment').class.value, section: document.getElementById('add_assignment').section.value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                appendSubjectOptions(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Subject found for the selected class and section !',
                                        title: 'Add Assignment',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                resetSubject();
                        }
                },
        });
}

function appendSectionOptions(data) {
        // console.log(data);
        var $select = $('#sectionAddAssign').empty();
        data.sort(function(a, b) {
                var textA = a.section.toUpperCase();
                var textB = b.section.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
        getsubject();
}

function appendSubjectOptions(data) {
        // console.log(data)
        data.sort(function(a, b) {
                var textA = a.subject.toUpperCase();
                var textB = b.subject.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
        var $select = $('#subjectAddAssign').empty();
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].subject }).text(data[i].subject);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
        // return true;
}
// ----------------------------------------------for edit assignment---------------------------------------------- //
function resetSection() {
        var $select = $('#sectionAddAssign').empty();
        var o = $('<option/>', ).text("Select valid class");
        o.appendTo($select);
        $select.selectpicker('refresh');
        $select.invalid();
}

function resetSubject() {
        var $select = $('#subjectAddAssign').empty();
        var o = $('<option/>', ).text("Select valid class and section");
        o.appendTo($select);
        $select.selectpicker('refresh');
        $select.valid() = false;
        console.log($select.valid());
}

function getsectionedit() {
        $('#sectionAddAssign').empty();
        $.ajax({
                type: "POST",
                url: "Assignment/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('edit_assignment').class.value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                appendSectionOptionsEdit(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Add Assignment',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                resetSection();
                        }
                },
        });
}

function getsubjectedit() {
        if (document.getElementById('edit_assignment').section.value != "") {
                $('#subjectAddAssign').empty();
                $.ajax({
                        type: "POST",
                        url: "Assignment/getSubject",
                        dataType: "JSON",
                        data: { class: document.getElementById('edit_assignment').class.value, section: document.getElementById('edit_assignment').section.value },
                        success: function(data) {
                                if (data.error === false) {
                                        // console.log(data);
                                        appendSubjectOptionsEdit(data.data);
                                }
                                if (data.error === true) {
                                        Swal.fire({
                                                // timer: 5000,
                                                icon: 'error',
                                                text: 'No Subject found for the selected class and section !',
                                                title: 'Add Assignment',
                                                swaltoast: false,
                                                allowOutsideClick: false,
                                                allowEscapeKey: false
                                        });
                                        resetSubject();
                                }
                        },
                });
        }
}

function appendSectionOptionsEdit(data) {
        // console.log(data);
        var user = JSON.parse(sessionStorage.getItem('latestAssignmentEdit'));
        var $select = $('#sectionAddAssign').empty();
        data.sort(function(a, b) {
                var textA = a.section.toUpperCase();
                var textB = b.section.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section).prop('selected', data[i].section == user.section);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
        getsubjectedit();
}

function appendSubjectOptionsEdit(data) {
        var user = JSON.parse(sessionStorage.getItem('latestAssignmentEdit'));
        // console.log(data)
        data.sort(function(a, b) {
                var textA = a.subject.toUpperCase();
                var textB = b.subject.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
        var $select = $('#subjectAddAssign').empty();
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].subject }).text(data[i].subject).prop('selected', data[i].subject == user.subject);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
}
// --------------------------------------------end for edit assignment-------------------------------------------- //
function uploadAssignmentFile(e) {
        Swal.fire({
                icon: 'info',
                didOpen: () => { Swal.showLoading() },
                swaltoast: false,
                allowOutsideClick: false,
                allowEscapeKey: false
        });
        let data = e.target.files[0];
        var upload_data = new FormData($('#add_assignment')[0]);
        console.log($('#add_assignment')[0])
        $.ajax({
                type: "POST",
                url: "Assignment/upload_file",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                data: upload_data,
                success: function(data) {
                        // console.log(data)
                        if (data.error === false) {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'File upload',
                                        text: 'Successful'
                                });
                                $('#fileUploadName').val(data.data.file_name);
                        } else {
                                Swal.fire({
                                        icon: 'error',
                                        title: 'File upload',
                                        text: 'Failed ! PLease try again'
                                });
                        }
                }
        });
        return false;
}

function uploadAssignmentFileEdit(e) {
        Swal.fire({
                icon: 'info',
                didOpen: () => { Swal.showLoading() },
                swaltoast: false,
                allowOutsideClick: false,
                allowEscapeKey: false
        });
        let data = e.target.files[0];
        var upload_data = new FormData($('#edit_assignment')[0]);
        // console.log(upload_data)
        $.ajax({
                type: "POST",
                url: "Assignment/upload_file",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                data: upload_data,
                success: function(data) {
                        // console.log(data)
                        if (data.error === false) {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'File upload',
                                        text: 'Successful'
                                });
                                $('#fileUploadName').val(data.data.file_name);
                        } else {
                                Swal.fire({
                                        icon: 'error',
                                        title: 'File upload',
                                        text: 'Failed ! PLease try again'
                                });
                        }
                }
        });
        return false;
}
$(window).load(function() {
        $('#onAddAssignment').on('click', function(e) {
                e.preventDefault();
                if ($('#add_assignment').valid()) {
                        $.ajax({
                                type: "POST",
                                url: "Assignment/saveAssignment",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: $('#add_assignment').serialize(),
                                success: function(data) {
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Add Assignment',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $("#add_assignment").trigger("reset");
                                                $(location).attr("href", "viewAssignment");
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: 'Add Assignment Failed , please try agin after sometime',
                                                        title: 'Add Assignment',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,

                                                });
                                        }
                                }
                        });
                        return false;
                }
        });
        // edit bstudent
        $('#onEditAssignment').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_assignment').valid()) {
                        $.ajax({
                                type: "POST",
                                url: "Assignment/updateById",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: $('#edit_assignment').serialize(),
                                success: function(data) {
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Edit Assignment',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $(location).attr("href", 'viewAssignment');
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: data.text,
                                                        title: 'Edit Assignment',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                                $(location).attr("href", 'viewAssignment');
                                        }
                                }
                        });
                        return false;
                }
        });
});

$(window).load(function() {
        var urlApi="";var dataApi;
        var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
        if (obj == null) {
                $(location).href = "logout";
        }
        var ullu = $(location).attr("pathname");
        var splitullu = ullu.split('/');
        // console.log(splitullu[2]);
        if (splitullu[2] == "viewAssignment") {
                
                if(obj.authority=="student"){
                        urlApi="Assignment/getAssignmentByClassSection";
                        dataApi={class:student.class,section:student.section};
                        // console.log(student.class+""+student.section)
                }
                else{
                        urlApi="Assignment/getAssignment";
                        dataApi={};
                }
                $('#AssignmentUploadTable').val("");
                $.ajax({
                        type: "POST",
                        url: urlApi,
                        dataType: "JSON",
                        data:dataApi,
                        success: function(data) {
                                // console.log(data)
                                if (data.error === false||data.error ===true) {
                                        $('#AssignmentTable').DataTable({
                                                processing: true,
                                                data: data.data,
                                                searching: true,
                                                responsive: true,
                                                initComplete: function(settings){
                                                                        if(obj.authority!="student"){
                                                                                 $('#AssignmentTable').DataTable().columns([10]).visible(false);
                                                                        }
                                                },
                                                columns: [
                                                        { data: "class" },
                                                        { data: "section" },
                                                        { data: "subject" },
                                                        { data: "teacher" },
                                                        { data: "chapter" },
                                                        { data: "assign_name" },
                                                        // { data: "description" },
                                                        {
                                                                data: "submit_date",
                                                                render: function(data, type, full, meta) {
                                                                        return new Date(data).toLocaleDateString("en-US",Dateoptions)
                                                                }
                                                        },
                                                        { data: null, defaultContent: "<i id=" + 'AssignmentViewFile' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">remove_red_eye</i>" },
                                                        { data: null, defaultContent: "<i id=" + 'AssignmentClickTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">edit</i>" },
                                                        { data: null, defaultContent: "<i id=" + 'AssignmentDelTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">delete_forever</i>" },
                                                        {
                                                                data: "id",
                                                                render: function(data, type, full, meta) {
                                                                                if (timeDiff(full.submit_date) < 0) {
                                                                                    return "<input id=" + 'AssignmentUploadTable' + data + " type=" + 'file' + " class='btn btn-primary text-center subAssign' name=" + 'submitAssign' + data + " onChange=''></button>"
                                                                                }else{
                                                                                    return "<p style="+'color:red'+">Deadline Expired</p>"
                                                                                }
                                                                }
                                                        },
                                                ],
                                                columnDefs: [{
                                                        targets: [8, 9],
                                                        render: function(data, type, row, meta) {
                                                                if (obj.authority != "admin") {
                                                                        $('#AssignmentTable').DataTable().columns([8, 9]).visible(false);
                                                              }
                                                            }
                                                    },
                                                    // {
                                                    //     targets: 10,
                                                    //     render: function(data, type, row, meta) {
                                                    //             if (obj.authority != "student") {
                                                    //                     console.log(obj.authority);
                                                    //                     $('#AssignmentTable').DataTable().columns([10]).visible(false);
                                                    //             }
                                                    //           }
                                                    //   }
                                                 ],
                                                // rowCallback: function(row, data, displayIndex) {
                                                //         // console.log(row)
                                                //         if(obj.authority == "student"){
                                                //           if (data.class != student.class && data.section != student.section) {
                                                //                   $(row).hide()
                                                //           }
                                                //         }
                                                // },
                                                paging: false,
                                                info: true,
                                                language: {
                                                        emptyTable: "No Assignments available ",
                                                        zeroRecords: "No Assignments available",
                                                        infoEmpty: "No Assignments available"
                                                },
                                        });
                                        $('#AssignmentTable tbody').on('change', '.subAssign', function(event) {
                                                var $row = $(this).closest('tr');
                                                var data = $('#AssignmentTable').DataTable().row($row).data();
                                                // console.log(data);
                                                // console.log(event.target.files[0])
                                                assignmentSubmitUpload(event, data)
                                        });
                                        $('#AssignmentTable tbody').on('click', '#AssignmentViewFile', function() {
                                                // var url="'<?php echo base_url();?>'";
                                                // console.log(url)
                                                var $row = $(this).closest('tr');
                                                var data = $('#AssignmentTable').DataTable().row($row).data();
                                                // console.log(data.filepath);
                                                // var file_path=window.location.origin+'/rtc/uploads/'+data.filepath;
                                                var file_path = window.location.origin + '/admin/uploads/' + data.filepath;
                                                // var file_path=window.location.origin+'/nihaltest/uploads/'+data.filepath;
                                                window.open(file_path, "_blank");
                                        });
                                        $('#AssignmentTable tbody').on('click', '#AssignmentClickTable', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#AssignmentTable').DataTable().row($row).data();
                                                // console.log(data);
                                                sessionStorage.setItem('latestAssignmentEdit', JSON.stringify(data));
                                                $(location).attr("href", 'editAssignment');
                                        });

                                        $('#AssignmentTable tbody').on('click', '#AssignmentDelTable', function() {
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
                                                                var $row = $(this).closest('tr');
                                                                var data = $('#AssignmentTable').DataTable().row($row).data();
                                                                // console.log(data);
                                                                $.ajax({
                                                                        type: "POST",
                                                                        url: "Assignment/deleteById",
                                                                        // contentType: "application/json; charset=utf-8",
                                                                        dataType: "JSON",
                                                                        data: data,
                                                                        success: function(data) {
                                                                                // console.log(data)
                                                                                if (data.error === false) {
                                                                                        Swal.fire({
                                                                                                timer: 5000,
                                                                                                icon: 'success',
                                                                                                text: 'Successful',
                                                                                                title: 'Delete Assignment',
                                                                                                swaltoast: false,
                                                                                                allowOutsideClick: false,
                                                                                                allowEscapeKey: false
                                                                                        });
                                                                                        $(location).attr("href", 'viewAssignment');
                                                                                } else {
                                                                                        Swal.fire({
                                                                                                icon: 'error',
                                                                                                text: 'Some error occured',
                                                                                                title: 'Delete Assignment',
                                                                                                swaltoast: false,
                                                                                                allowOutsideClick: false,
                                                                                                allowEscapeKey: false,
                                                                                        });
                                                                                        $(location).attr("href", 'viewAssignment');
                                                                                }
                                                                        }
                                                                });
                                                                return false;
                                                        }
                                                });
                                        });
                                        Swal.close();
                                } else {
                                        Swal.fire({
                                                timer: 2000,
                                                icon: 'error',
                                                text: 'Server Down , please try again after sometime',
                                                title: 'View Assignment',
                                                swaltoast: false,
                                                allowOutsideClick: false,
                                                allowEscapeKey: false,
                                                willClose: () => { clearInterval(timerInterval) }
                                        }).then((result) => {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                        // console.log('I was closed by the timer')
                                                        $(location).attr("href", "<?php echo base_url(); ?>dashboard");
                                                }
                                        })
                                }
                        }
                });
                return false;
        }
        if (splitullu[2] == "viewAssignmentSubmission") {
                $.ajax({
                        type: "POST",
                        url: "Assignment/getAssignmentSubmission",
                        dataType: "JSON",
                        success: function(data) {
                                console.log(data)
                                if (data.error === false) {
                                        $('#AssignmentSubTable').DataTable({
                                                processing: true,
                                                data: data.data,
                                                searching: true,
                                                responsive: true,
                                                columns: [
                                                        { data: "class" },
                                                        { data: "section" },
                                                        { data: "subject" },
                                                        { data: "teacher" },
                                                        { data: "assign_name" },
                                                        { data: null, defaultContent: "<i id=" + 'checkAssignmentQ' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">remove_red_eye</i>" },
                                                        { data: null, defaultContent: "<i id=" + 'checkAssignmentS' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">assignment_turned_in</i>" },
                                                        // { data: "description" },
                                                        {
                                                                data: "submit_date",
                                                                render: function(data, type, full, meta) {
                                                                        return new Date(data).toLocaleDateString("en-US",Dateoptions)
                                                                }
                                                        },
                                                ],
                                                paging: true,
                                                info: true,
                                                language: {
                                                        emptyTable: "No Assignments available ",
                                                        zeroRecords: "No Assignments available",
                                                        infoEmpty: "No Assignments available"
                                                },
                                        });
                                        // $('#AssignmentSubTable tbody').on('change', '.subAssign', function(event) {
                                        //         var $row = $(this).closest('tr');
                                        //         var data = $('#AssignmentSubTable').DataTable().row($row).data();
                                        //         // console.log(data);
                                        //         // console.log(event.target.files[0])
                                        //         assignmentSubmitUpload(event, data)
                                        // });
                                        $('#AssignmentSubTable tbody').on('click', '#checkAssignmentQ', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#AssignmentSubTable').DataTable().row($row).data();
                                                var file_path = link + data.file_assignment;
                                                if(data.file_assignment==""){
                                                        alert("The file is corrupted");
                                                }
                                                else{
                                                        window.open(file_path, "_blank");       
                                                }
                                        });
                                        $('#AssignmentSubTable tbody').on('click', '#checkAssignmentS', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#AssignmentSubTable').DataTable().row($row).data();
                                                var file_path = link + 'Assignments/' + data.file_solution;
                                                if(data.file_solution==""){
                                                        alert("The file is corrupted");
                                                }
                                                else{
                                                        window.open(file_path, "_blank");       
                                                }
                                        });
                                        Swal.close();
                                } else {
                                        Swal.fire({
                                                timer: 2000,
                                                icon: 'error',
                                                text: 'Server Down , please try again after sometime',
                                                title: 'View Assignment',
                                                swaltoast: false,
                                                allowOutsideClick: false,
                                                allowEscapeKey: false,
                                                willClose: () => { clearInterval(timerInterval) }
                                        }).then((result) => {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                        // console.log('I was closed by the timer')
                                                        $(location).attr("href", "<?php echo base_url(); ?>dashboard");
                                                }
                                        })
                                }
                        }
                });
                return false;
        }
        if (splitullu[2] == "editAssignment") {
                var user = JSON.parse(sessionStorage.getItem('latestAssignmentEdit'));
                console.log(user);
                var form = $('#edit_assignment');
                form.find("select[name='class']").val(user.class).change();
                $.each(user, function(key, value) {
                        form.find("input[name='" + key + "']").val(value).focus();
                        form.find("textarea[name='" + key + "']").val(value).focus();
                        // form.find("select[name='" + key + "']").val(value).focus();
                });

                user.submit_date = moment(user.submit_date).format('YYYY-MM-DD');
                console.log(user.submit_date);
                $('#edit_assignment').find("select[name=teacher]").val(user.teacher).change();
                $('#edit_assignment').find("input[type=date]").val(user.submit_date).change();
                $('#edit_assignment').find("input[type=file]").val(user.filepath);
        }
});

function assignmentSubmitUpload(e, data) {
        checkAssignmentExist(e, data, e.target.files[0]);
        // console.log(check)

}

function checkAssignmentExist(e, data, file) {
        // console.log(data)
        // console.table(data);
        $.ajax({
                type: "POST",
                url: "Assignment/checkAssignmentExist",
                dataType: "JSON",
                data: { assign_id: data.id, admno: student.admisstion_no },
                success: function(res) {
                        console.log(res)
                        uploadAssign(e, data, file, res);
                },
        });
}

function uploadAssign(e, dataRow, file, res) {
        if (res.error === false) {
                Swal.fire({
                        title: 'Submit Again?',
                        text: "You already have submitted this asssignment!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Submit!'
                }).then((result) => {
                        if (result.isConfirmed) {
                                console.log(res.data)
                                Swal.fire({
                                        icon: 'info',
                                        didOpen: () => { Swal.showLoading() },
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                // var form_data = new FormData();
                                // form_data.append('file', file);
                                // console.log(form_data)
                                $.ajax({
                                        type: "POST",
                                        url: "Assignment/DeleteOldAssignment",
                                        dataType: "JSON",
                                        data: {oldFilePath:res.data[0].file_solution},
                                        success: function(data) {
                                                console.log(data)
                                                if (data.error === false) {
                                                      var form_data = new FormData();
                                                      form_data.append('file', file);
                                                      console.log(form_data)
                                                      $.ajax({
                                                              type: "POST",
                                                              url: "Assignment/submitAssignmentFile",
                                                              cache: false,
                                                              contentType: false,
                                                              processData: false,
                                                              dataType: "JSON",
                                                              data: form_data,
                                                              success: function(data) {
                                                                      console.log(data)
                                                                      if (data.error === false) {
                                                                              updateAssignmentOnUploadSuccess(res , data.data.file_name , dataRow);
                                                                      } else {
                                                                              Swal.fire({
                                                                                      icon: 'error',
                                                                                      title: 'Assignment upload',
                                                                                      text: data.data
                                                                              });
                                                                      }
                                                              }
                                                      });
                                                      return false;
                                                } else {
                                                        Swal.fire({
                                                                icon: 'error',
                                                                title: 'Assignment upload',
                                                                text: data.data
                                                        });
                                                }
                                        }
                                });
                                return false;

                        }
                });
        }
        if (res.error === true) {
                Swal.fire({
                        icon: 'info',
                        didOpen: () => { Swal.showLoading() },
                        swaltoast: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                });
                var form_data = new FormData();
                form_data.append('file', file);
                console.log(form_data)
                $.ajax({
                        type: "POST",
                        url: "Assignment/submitAssignmentFile",
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        data: form_data,
                        success: function(data) {
                                console.log(data)
                                if (data.error === false) {
                                        saveAssignmentOnUploadSuccess(dataRow, data.data.file_name);
                                } else {
                                        Swal.fire({
                                                icon: 'error',
                                                title: 'Assignment upload',
                                                text: data.data
                                        });
                                }
                        }
                });
                return false;
        }
}

function saveAssignmentOnUploadSuccess(dataRow, file_name) {
        // console.log(dataRow);console.log(file_name)
        $.ajax({
                type: "POST",
                url: "Assignment/saveStudentAssignment",
                dataType: "JSON",
                data: {
                        assign_id: dataRow.id,
                        admno: student.admisstion_no,
                        class: dataRow.class,
                        section: dataRow.section,
                        subject: dataRow.subject,
                        teacher: dataRow.teacher,
                        chapter: dataRow.chapter,
                        assign_name: dataRow.assign_name,
                        description: dataRow.description,
                        assign_date: dataRow.assign_date,
                        submit_date: dataRow.submit_date,
                        file_assignment: dataRow.filepath,
                        file_solution: file_name
                },
                success: function(data) {
                        console.log(data);
                        if (data.error === false) {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'Assignment Submission',
                                        text: 'Successful'
                                });
                                $(location).href="viewAssignment"
                        } else {
                                Swal.fire({
                                        icon: 'error',
                                        title: 'Assignment Submission',
                                        text: data.data
                                });
                        }
                },
        });
}
function updateAssignmentOnUploadSuccess(res,file_name, dataRow){
    $.ajax({
                type: "POST",
                url: "Assignment/updateStudentAssignment",
                dataType: "JSON",
                data: {
                        id: res.data[0].id,
                        file_solution: file_name
                },
                success: function(data) {
                        console.log(data);
                        if (data.error === false) {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'Assignment Submission',
                                        text: data.text,
                                });
                                $(location).href="viewAssignment"
                        } else {
                                Swal.fire({
                                        icon: 'error',
                                        title: 'Assignment Submission',
                                        text: data.text,
                                });
                        }
                },
        });
}
function timeDiff(timeC){
  var todayDate = moment(new Date(), 'DD-MM-YYYY');
  var pastDate = moment(timeC, 'DD-MM-YYYY');
  return todayDate.diff(pastDate);
}