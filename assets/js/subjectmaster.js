function getsectionSubject() {
        $('#sectionAddSubject').empty();
        $.ajax({
                type: "POST",
                url: "Subject/getSectionByClass",
                dataType: "JSON",
                data: { class: document.getElementById('classAddSubject').value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                _appendSectionOptions(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Add Subject',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                resetSection();
                        }
                },
        });
}

function _appendSectionOptions(data) {
        // console.log(data);
        var $select = $('#sectionAddSubject').empty();
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

function getsectionSubjectE() {
        $('#sectionAddSubject').empty();
        $.ajax({
                type: "POST",
                url: "Subject/getSectionByClass",
                dataType: "JSON",
                data: { class: document.getElementById('classAddSubjectE').value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                _appendSectionOptionsE(data.data);
                        }
                        if (data.error === true) {
                                Swal.fire({
                                        // timer: 5000,
                                        icon: 'error',
                                        text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                        title: 'Add Subject',
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                });
                                // resetSection();
                        }
                },
        });
}

function _appendSectionOptionsE(data) {
        // console.log(data);
        var user = JSON.parse(sessionStorage.getItem('latestSubjectEdit'));
        var $select = $('#sectionAddSubjectE').empty();
        data.sort(function(a, b) {
                var textA = a.section.toUpperCase();
                var textB = b.section.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
        // ($('<option/>').text("Select a section")).appendTo($select);
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i].section }).text(data[i].section).prop('selected', data[i].section == user.section);;
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
}
$(window).load(function() {
        $('#onAddSubject').on('click', function(e) {
                e.preventDefault();
                if ($('#add_subject').valid()) {
                        $.ajax({
                                type: "POST",
                                url: "Subject/saveSubject",
                                dataType: "JSON",
                                data: $('#add_subject').serialize(),
                                success: function(data) {
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Add Subject',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $("#add_subject").trigger("reset");
                                                $(location).attr("href", "viewSubject");
                                        } else if (data.error == true) {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: data.data,
                                                        title: 'Add Subject',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: data.data,
                                                        title: 'Add Subject',
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
        $('#onEditSubject').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_subject').valid()) {
                        $.ajax({
                                type: "POST",
                                url: "Subject/updateById",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: $('#edit_subject').serialize(),
                                success: function(data) {
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Edit Subject',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $(location).attr("href", 'viewSubject');
                                        } else if (data.error == true) {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: data.data,
                                                        title: 'Edit Subject',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: data.data,
                                                        title: 'Edit Subject',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                                // $(location).attr("href",'viewSubject');
                                        }
                                }
                        });
                        return false;
                }
        });
});

$(window).load(function() {
        var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
        var ullu = $(location).attr("pathname");
        var splitullu = ullu.split('/');
        // console.log(splitullu[2]);
        if (splitullu[2] == "viewSubject") {
                if (obj.authority == "student") {
                        $.ajax({
                                type: "POST",
                                url: "Subject/getSubjectByClassSection",
                                dataType: "JSON",
                                data : {class : student.class,section:student.section},
                                success: function(data) {
                                        console.log(data)
                                        if (data.error === false) {
                                                $('#subjectTable').DataTable({
                                                        // processing: true,
                                                        data: data.data,
                                                        searching: true,
                                                        columns: [
                                                                { data: "class" },
                                                                { data: "subject" },
                                                                { data: "section" },
                                                                { data: null, defaultContent: "<i id=" + 'SubjectClickTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">edit</i>" },
                                                                { data: null, defaultContent: "<i id=" + 'SubjectDelTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">delete_forever</i>" }
                                                        ],
                                                        columnDefs: [{
                                                                targets: [3, 4],
                                                                render: function(data, type, row, meta) {
                                                                        if (obj.authority != "admin") {
                                                                                $('#subjectTable').DataTable().columns([3, 4]).visible(false);
                                                                        }
                                                                }
                                                        }, ],
                                                        paging:false,
                                                        info: true,
                                                        language: {
                                                                emptyTable: "No data available "
                                                        },
                                                });
                                                $('#subjectTable tbody').on('click', '#SubjectClickTable', function() {
                                                        var $row = $(this).closest('tr');
                                                        var data = $('#subjectTable').DataTable().row($row).data();
                                                        console.log(data);
                                                        sessionStorage.setItem('latestSubjectEdit', JSON.stringify(data));
                                                        $(location).attr("href", 'editSubject');
                                                });
                                                $('#subjectTable tbody').on('click', '#SubjectDelTable', function() {
                                                        var $row = $(this).closest('tr');
                                                        var data = $('#subjectTable').DataTable().row($row).data();
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
                                                                                type: "POST",
                                                                                url: "Subject/deleteById",
                                                                                // contentType: "application/json; charset=utf-8",
                                                                                dataType: "JSON",
                                                                                data: data,
                                                                                success: function(data) {
                                                                                        console.log(data)
                                                                                        if (data.error === false) {
                                                                                                Swal.fire({
                                                                                                        timer: 5000,
                                                                                                        icon: 'success',
                                                                                                        text: 'Successful',
                                                                                                        title: 'Delete Subject',
                                                                                                        swalToast: false,
                                                                                                        allowOutsideClick: false,
                                                                                                        allowEscapeKey: false
                                                                                                });
                                                                                                $(location).attr("href", 'viewSubject');
                                                                                        } else if (data.error === true) {
                                                                                                Swal.fire({
                                                                                                        icon: 'error',
                                                                                                        text: data.data,
                                                                                                        title: 'Delete Subject',
                                                                                                        swaltoast: false,
                                                                                                        allowOutsideClick: false,
                                                                                                        allowEscapeKey: false,
                                                                                                });
                                                                                        } else {
                                                                                                Swal.fire({
                                                                                                        icon: 'error',
                                                                                                        text: 'Some error occured',
                                                                                                        title: 'Delete Subject',
                                                                                                        swaltoast: false,
                                                                                                        allowOutsideClick: false,
                                                                                                        allowEscapeKey: false,
                                                                                                });
                                                                                                // $(location).attr("href",'viewSubject');
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
                                                        title: 'View Subject',
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
                } else {
                        $.ajax({
                                type: "POST",
                                url: "Subject/getSubject",
                                dataType: "JSON",
                                success: function(data) {
                                        console.log(data)
                                        if (data.error === false) {
                                                $('#subjectTable').DataTable({
                                                        processing: true,
                                                        data: data.data,
                                                        searching: true,
                                                        columns: [
                                                                { data: "class" },
                                                                { data: "subject" },
                                                                { data: "section" },
                                                                { data: null, defaultContent: "<i id=" + 'SubjectClickTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">edit</i>" },
                                                                { data: null, defaultContent: "<i id=" + 'SubjectDelTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">delete_forever</i>" }
                                                        ],
                                                        columnDefs: [{
                                                                targets: [3, 4],
                                                                render: function(data, type, row, meta) {
                                                                        if (obj.authority != "admin") {
                                                                                $('#subjectTable').DataTable().columns([3, 4]).visible(false);
                                                                        }
                                                                }
                                                        }, ],
                                                        
                                                        info: true,
                                                        language: {
                                                                emptyTable: "No data available "
                                                        },
                                                });
                                                $('#subjectTable tbody').on('click', '#SubjectClickTable', function() {
                                                        var $row = $(this).closest('tr');
                                                        var data = $('#subjectTable').DataTable().row($row).data();
                                                        console.log(data);
                                                        sessionStorage.setItem('latestSubjectEdit', JSON.stringify(data));
                                                        $(location).attr("href", 'editSubject');
                                                });
                                                $('#subjectTable tbody').on('click', '#SubjectDelTable', function() {
                                                        var $row = $(this).closest('tr');
                                                        var data = $('#subjectTable').DataTable().row($row).data();
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
                                                                                type: "POST",
                                                                                url: "Subject/deleteById",
                                                                                // contentType: "application/json; charset=utf-8",
                                                                                dataType: "JSON",
                                                                                data: data,
                                                                                success: function(data) {
                                                                                        console.log(data)
                                                                                        if (data.error === false) {
                                                                                                Swal.fire({
                                                                                                        timer: 5000,
                                                                                                        icon: 'success',
                                                                                                        text: 'Successful',
                                                                                                        title: 'Delete Subject',
                                                                                                        swalToast: false,
                                                                                                        allowOutsideClick: false,
                                                                                                        allowEscapeKey: false
                                                                                                });
                                                                                                $(location).attr("href", 'viewSubject');
                                                                                        } else if (data.error === true) {
                                                                                                Swal.fire({
                                                                                                        icon: 'error',
                                                                                                        text: data.data,
                                                                                                        title: 'Delete Subject',
                                                                                                        swaltoast: false,
                                                                                                        allowOutsideClick: false,
                                                                                                        allowEscapeKey: false,
                                                                                                });
                                                                                        } else {
                                                                                                Swal.fire({
                                                                                                        icon: 'error',
                                                                                                        text: 'Some error occured',
                                                                                                        title: 'Delete Subject',
                                                                                                        swaltoast: false,
                                                                                                        allowOutsideClick: false,
                                                                                                        allowEscapeKey: false,
                                                                                                });
                                                                                                // $(location).attr("href",'viewSubject');
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
                                                        title: 'View Subject',
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
        }
        if (splitullu[2] == "editSubject") {
                // Swal.fire({
                //     icon: 'info',
                //     text: 'Please wait while we are fetching details',
                //     title: 'Edit Subject',
                //     didOpen: () => { Swal.showLoading() },swaltoast: false, allowOutsideClick: false, allowEscapeKey: false
                //   });
                var user = JSON.parse(sessionStorage.getItem('latestSubjectEdit'));
                console.log(user);
                var form = $('#edit_subject');
                $.each(user, function(key, value) {
                        form.find("input[name='" + key + "']").val(value).focus();
                        form.find("select[name='" + key + "']").val(value).change();
                });
                Swal.close();
        }
});