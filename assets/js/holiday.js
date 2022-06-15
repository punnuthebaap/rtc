$(window).load(function() {
        $('#onAddHoliday').on('click', function(e) {
                e.preventDefault();
                if ($('#add_holiday_form').valid()) {
                        $.ajax({
                                type: "POST",
                                url: "Holiday/saveHoliday",
                                dataType: "JSON",
                                data: $('#add_holiday_form').serialize(),
                                success: function(data) {
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Add Holiday Master',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $("#add_exam_master").trigger("reset");
                                                $(location).attr("href", "viewHoliday");
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: 'Add Holiday Master Failed , please try agin after sometime',
                                                        title: 'Add Holiday Master',
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
        $('#onEditHoliday').on('click', function(e) {
                e.preventDefault();
                console.log($('#edit_holiday_form').serialize())
                if ($('#edit_holiday_form').valid()) {
                        $.ajax({
                                type: "POST",
                                url: "Holiday/UpdateById",
                                dataType: "JSON",
                                data: $('#edit_holiday_form').serialize(),
                                success: function(data) {
                                        console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Edit Holiday Master',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $("#edit_exam_master").trigger("reset");
                                                $(location).attr("href", "viewHoliday");
                                        } else if (data.error === true) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'error',
                                                        text: data.text,
                                                        title: 'Edit Holiday Master',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: 'Edit Holiday Master Failed , please try agin after sometime',
                                                        title: 'Edit Holiday Master',
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
});
$(window).load(function() {
        var ullu = $(location).attr("pathname");
        var splitullu = ullu.split('/');
        // console.log(splitullu[2]);
        if (splitullu[2] == "viewHoliday") {
                $.ajax({
                        type: "POST",
                        url: "Holiday/getHolidayList",
                        dataType: "JSON",
                        success: function(data) {
                                console.log(data)
                                if (data.error === false) {
                                        $('#holidayTable').DataTable({
                                                processing: true,
                                                data: data.data,
                                                searching: true,
                                                columns: [{
                                                                data: "start_date",
                                                                render: function(data, type, full, meta) {
                                                                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                                                                        return new Date(data).toLocaleDateString("en-US", options)
                                                                }
                                                        },
                                                        {
                                                                data: "end_date",
                                                                render: function(data, type, full, meta) {
                                                                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                                                                        return new Date(data).toLocaleDateString("en-US", options)
                                                                }
                                                        },
                                                        { data: "details" },
                                                        { data: "total_days" },
                                                        { data: null, defaultContent: "<i id=" + 'holidayClickTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">edit</i>" },
                                                        { data: null, defaultContent: "<i id=" + 'holidayDelTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">delete_forever</i>" }
                                                ],
                                                columnDefs: [{
                                                        targets: [4, 5],
                                                        render: function(data, type, row, meta) {
                                                                var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
                                                                if (obj.authority != "admin") {
                                                                        $('#holidayTable').DataTable().columns([4,5]).visible(false);
                                                                }
                                                        }
                                                }, ],
                                                paging: false,
                                                info: true,
                                                responsive: true,
                                                language: {
                                                        emptyTable: "No data available "
                                                },
                                        });
                                        $('#holidayTable tbody').on('click', '#holidayClickTable', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#holidayTable').DataTable().row($row).data();
                                                console.log(data);
                                                sessionStorage.setItem('latestHolidayEdit', JSON.stringify(data));
                                                $(location).attr("href", 'editHoliday');
                                        });
                                        $('#holidayTable tbody').on('click', '#holidayDelTable', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#holidayTable').DataTable().row($row).data();
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
                                                                        url: "Holiday/deleteById",
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
                                                                                                title: 'Delete Holiday Master',
                                                                                                swaltoast: false,
                                                                                                allowOutsideClick: false,
                                                                                                allowEscapeKey: false
                                                                                        });
                                                                                        $(location).attr("href", 'viewHoliday');
                                                                                } else {
                                                                                        Swal.fire({
                                                                                                icon: 'error',
                                                                                                text: 'Some error occured',
                                                                                                title: 'Delete Holiday Master',
                                                                                                swaltoast: false,
                                                                                                allowOutsideClick: false,
                                                                                                allowEscapeKey: false,
                                                                                        });
                                                                                        $(location).attr("href", 'viewHoliday');
                                                                                }
                                                                        }
                                                                });
                                                                return false;
                                                        }
                                                });
                                        });
                                } else {
                                        $('#holidayTable').DataTable({
                                                processing: true,
                                                data: data.data,
                                                searching: true,
                                                columns: [{
                                                                data: "start_date",
                                                                render: function(data, type, full, meta) {
                                                                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                                                                        return new Date(data).toLocaleDateString("en-US", options)
                                                                }
                                                        },
                                                        {
                                                                data: "end_date",
                                                                render: function(data, type, full, meta) {
                                                                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                                                                        return new Date(data).toLocaleDateString("en-US", options)
                                                                }
                                                        },
                                                        { data: "details" },
                                                        { data: "total_days" },
                                                        { data: null, defaultContent: "<i id=" + 'holidayClickTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">edit</i>" },
                                                        { data: null, defaultContent: "<i id=" + 'holidayDelTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">delete_forever</i>" }
                                                ],
                                                columnDefs: [{
                                                        targets: [4, 5],
                                                        render: function(data, type, row, meta) {
                                                                var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
                                                                if (obj.authority != "admin") {
                                                                        $('#holidayTable').DataTable().columns([4,5]).visible(false);
                                                                }
                                                        }
                                                }, ],
                                                paging: false,
                                                info: true,
                                                responsive: true,
                                                language: {
                                                        emptyTable: "No data available "
                                                },
                                        });
                                }
                        }
                });
                return false;
        }
        if (splitullu[2] == "editHoliday") {
                var user = JSON.parse(sessionStorage.getItem('latestHolidayEdit'));
                console.log(user);
                var form = $('#edit_holiday_form');
                $.each(user, function(key, value) {
                        form.find("input[name='" + key + "']").val(value).focus();
                });
                user.start_date = moment(user.start_date).format('YYYY-MM-DD');
                user.end_date = moment(user.end_date).format('YYYY-MM-DD');
                // console.log(user.submit_date);
                $('#edit_holiday_form').find("input[name='start_date']").val(user.start_date).change();
                $('#edit_holiday_form').find("input[name='end_date']").val(user.end_date).change();
        }
});