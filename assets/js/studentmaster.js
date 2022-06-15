var studentFormData;
const base_url=JSON.parse(sessionStorage.getItem('base_url'));
var link=base_url+'uploads/';
const Dateoptions = { year: 'numeric', month: 'long', day: 'numeric' };
// var link1=window.location.origin+'/rtc/uploads/';
$(window).load(function() {
        var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
        if(obj!=null){
                if(obj.authority=="student"){
                        $.ajax({
                                type: "POST",
                                url: "Student/getStudentByadmno",
                                dataType: "JSON",
                                data: { admno: obj.login_id },
                                success: function(data) {
                                        console.log(data)
                                        if (data.error === false) {
                                                sessionStorage.setItem('studentReport', JSON.stringify(data.data[0]));
                                        }
                                        if (data.error === true) {}
                                },
                        });
                }
        }
        else{
                alert("Your session has been expired , log in again to continue !");
                $(location).attr("href","logout");
        }
        // $('.mainLinkEditStudent').click(function(event){
        //     event.preventDefault();
        // });
});
function preV(event){
        event.preventDefault();
}
function calcAge(dob){
        if(dob!=null || dob!=""){
                $('#studentAddAge').val(moment().diff(moment(dob, 'YYYYMMDD'), 'years')).focus();
        }
        else{
                return true;
        }

}
function calcAgeE(dob){
        if(dob!=null || dob!=""){
                $('#studentAddAgeE').val(moment().diff(moment(dob, 'YYYYMMDD'), 'years')).focus();
        }
        else{
                return true;
        }

}
function getsectionStu() {
        // console.log(document.getElementById('add_student_master').class.value);
        $.ajax({
                type: "POST",
                url: "Student/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('add_student_info').class.value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                // appendSection(data.data);
                                // var $select = $('#studentAddSection1').empty();
                                data.data.sort(function(a, b) {
                                      var textA = a.section.toUpperCase();
                                      var textB = b.section.toUpperCase();
                                      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                                  });
                                var $select = $('#studentAddSection1').empty();
                                ($('<option/>').text("Select a section")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                  var o = $('<option/>', { value: data.data[i].section }).text(data.data[i].section);
                                  o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                console.log(data.error)
                                // Swal.fire({
                                //         timer: 5000,
                                //         icon: 'error',
                                //         text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                //         title: 'Get Section',
                                //         swaltoast: false,
                                //         allowOutsideClick: false,
                                //         allowEscapeKey: false
                                // });
                        }
                },
        });
}
function getsectionStuSib() {
        // console.log(document.getElementById('add_student_master').class.value);
        $.ajax({
                type: "POST",
                url: "Student/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('add_student_previous_detail').sibling_class.value },
                success: function(data) {
                        if (data.error === false) {
                                // console.log(data);
                                data.data.sort(function(a, b) {
                                      var textA = a.section.toUpperCase();
                                      var textB = b.section.toUpperCase();
                                      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                                  });
                                var $select = $('#sibling_section').empty();
                                ($('<option/>').text("Select a section")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                  var o = $('<option/>', { value: data.data[i].section }).text(data.data[i].section);
                                  o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                console.log(data.error)
                                // Swal.fire({
                                //         timer: 5000,
                                //         icon: 'error',
                                //         text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                //         title: 'Get Section',
                                //         swaltoast: false,
                                //         allowOutsideClick: false,
                                //         allowEscapeKey: false
                                // });
                        }
                },
        });
}
function getsectionStuSibE() {
        // console.log(document.getElementById('add_student_master').class.value);
        $.ajax({
                type: "POST",
                url: "Student/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('edit_student_previous_detail').sibling_class.value },
                success: function(data) {
                        if (data.error === false) {
                                data.data.sort(function(a, b) {
                                      var textA = a.section.toUpperCase();
                                      var textB = b.section.toUpperCase();
                                      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                                  });
                                var user=JSON.parse(sessionStorage.getItem('latestStudentEdit'));
                                var $select = $('#sibling_sectionE').empty();
                                // ($('<option/>').text("Select a section")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                  var o = $('<option/>', { value: data.data[i].section }).text(data.data[i].section).prop('selected', data.data[i].section == user.sibling_section);
                                  o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                console.log(data.error)
                                // Swal.fire({
                                //         timer: 5000,
                                //         icon: 'error',
                                //         text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                //         title: 'Get Section',
                                //         swaltoast: false,
                                //         allowOutsideClick: false,
                                //         allowEscapeKey: false
                                // });
                        }
                },
        });
}
function getsectionStuE(){
  $.ajax({
                type: "POST",
                url: "Student/getSection",
                dataType: "JSON",
                data: { class: document.getElementById('edit_student_info').class.value },
                success: function(data) {
                        // console.log(data);
                        if (data.error === false) {
                                data.data.sort(function(a, b) {
                                      var textA = a.section.toUpperCase();
                                      var textB = b.section.toUpperCase();
                                      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
                                  });
                                var user=JSON.parse(sessionStorage.getItem('latestStudentEdit'));
                                var $select = $('#studentAddSectionE1').empty();
                                // ($('<option/>').text("Select a section")).appendTo($select);
                                for (var i = 0; i < data.data.length; i++) {
                                  var o = $('<option/>', { value: data.data[i].section }).text(data.data[i].section).prop('selected', data.data[i].section == user.section);;
                                  o.appendTo($select);
                                }
                                $select.selectpicker('refresh');
                        }
                        if (data.error === true) {
                                console.log(data.error)
                                // Swal.fire({
                                //         // timer: 5000,
                                //         icon: 'error',
                                //         text: 'No Section Found for the selected class ! Please add a section for the selected class to continue',
                                //         title: 'Get Section',
                                //         swaltoast: false,
                                //         allowOutsideClick: false,
                                //         allowEscapeKey: false
                                // });
                        }
                },
        });
}
function appendSectionSib(data){
  var $select = $('#sibling_section').empty();
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
}
function appendSectionSibE(data){
  var $select = $('#sibling_sectionE').empty();
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
}
function appendSectionSibE(data){
  var $select = $('#sibling_section').empty();
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
}
function appendSection(data) {
        console.log(data);
        var $select = $('#studentAddSection1').empty();
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
}
function appendSectionE(data) {
        console.log(data);
        var $select = $('#studentAddSectionE1').empty();
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
}

function sameAsRes() {
        var form = $('#add_student_address');
        if (document.getElementById('add_student_address').same_as_residential.value == "on") {
                form.find("textarea[name='corres_address']").val(document.getElementById('add_student_address').res_address.value).focus();
                form.find("input[name='corres_landmark']").val(document.getElementById('add_student_address').res_landmark.value).focus();
                form.find("input[name='corres_state']").val(document.getElementById('add_student_address').res_state.value).focus();
                form.find("input[name='corres_ciry']").val(document.getElementById('add_student_address').res_city.value).focus();
                form.find("input[name='corres_pin_code']").val(document.getElementById('add_student_address').res_pin_code.value).focus();
                form.find("input[name='corres_distance']").val(document.getElementById('add_student_address').res_distance.value).focus();
        } else {
                form.find("textarea[name='corres_address']").removeAttr('value');
                form.find("input[name='corres_landmark']").removeAttr('value');
                form.find("input[name='corres_state']").removeAttr('value');
                form.find("input[name='corres_ciry']").removeAttr('value');
                form.find("input[name='corres_pin_code']").removeAttr('value');
                form.find("input[name='corres_distance']").removeAttr('value');
        }
}
$(window).keydown(function(event){
    if(event.keyCode == 37 || event.keyCode == 39) {
    event.preventDefault();
    return false;
    }
});
$(window).load(function() {
        $('#smartwizard').smartWizard({
                selected: 0, // Initial selected step, 0 = first step
                theme: 'default', // theme for the wizard, related css need to include for other than default theme
                justified: true, // Nav menu justification. true/false
                darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
                autoAdjustHeight: true, // Automatically adjust content height
                cycleSteps: false, // Allows to cycle the navigation of steps
                backButtonSupport: true, // Enable the back button support
                enableURLhash: true, // Enable selection of the step based on url hash
                transition: {
                        animation: 'slide-vertical', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                        speed: '400', // Transion animation speed
                        easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
                },
                toolbarSettings: {
                        toolbarPosition: 'bottom', // none, top, bottom, both
                        toolbarButtonPosition: 'right', // left, right, center
                        showNextButton: false, // show/hide a Next button
                        showPreviousButton: false, // show/hide a Previous button
                        toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
                },
                anchorSettings: {
                        anchorClickable: true, // Enable/Disable anchor navigation
                        enableAllAnchors: false, // Activates all anchors clickable all times
                        markDoneStep: true, // Add done state on navigation
                        markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                        removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                        enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                },
                keyboardSettings: {
                        keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                        // keyLeft: [37], // Left key code
                        // keyRight: [39] // Right key code
                },
                lang: { // Language variables for button
                        next: 'Next',
                        previous: 'Previous',
                        finish: 'Finish'
                },
                disabledSteps: [], // Array Steps disabled
                errorSteps: [], // Highlight step with errors
                hiddenSteps: [] // Hidden steps
        });
        $('#smartwizardEdit').smartWizard({
                selected: 0, // Initial selected step, 0 = first step
                theme: 'default', // theme for the wizard, related css need to include for other than default theme
                justified: true, // Nav menu justification. true/false
                darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
                autoAdjustHeight: true, // Automatically adjust content height
                cycleSteps: false, // Allows to cycle the navigation of steps
                backButtonSupport: true, // Enable the back button support
                enableURLhash: true, // Enable selection of the step based on url hash
                transition: {
                        animation: 'slide-vertical', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                        speed: '400', // Transion animation speed
                        easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
                },
                toolbarSettings: {
                        toolbarPosition: 'bottom', // none, top, bottom, both
                        toolbarButtonPosition: 'right', // left, right, center
                        showNextButton: false, // show/hide a Next button
                        showPreviousButton: false, // show/hide a Previous button
                        toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
                },
                anchorSettings: {
                        anchorClickable: true, // Enable/Disable anchor navigation
                        enableAllAnchors: true, // Activates all anchors clickable all times
                        markDoneStep: true, // Add done state on navigation
                        markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                        removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                        enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                },
                keyboardSettings: {
                        keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                        keyLeft: [37], // Left key code
                        keyRight: [39] // Right key code
                },
                lang: { // Language variables for button
                        next: 'Next',
                        previous: 'Previous',
                        finish: 'Finish'
                },
                disabledSteps: [], // Array Steps disabled
                errorSteps: [], // Highlight step with errors
                hiddenSteps: [] // Hidden steps
        });
        $('#saveStudentInfo').on('click', function(e) {
                e.preventDefault();
                if ($('#add_student_info').valid()) {
                        $('#smartwizard').smartWizard("loader", "show");
                        var objData = {}
                        $("#add_student_info").serializeArray().map(function(x) {
                                // console.log(x)
                                if (x.name == "doc_submitted_birth_certificate" || x.name == "doc_submitted_transfer_certifiucate" || x.name == "doc_submitted_aadhar_card" || x.name == "doc_submitted_aadhar_Other") {
                                        if (x.value == "on") { objData[x.name] = "Yes" } else { objData[x.name] = "No" }
                                } else {
                                        objData[x.name] = x.value
                                }
                        });
                        console.log(objData);
                        console.log($('#add_student_info').serialize());
                        $.ajax({
                                type: "POST",
                                url: "Student/isadmissionExist",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: objData,
                                success: function(data) {
                                        console.log(data)
                                        $('#smartwizard').smartWizard("loader", "hide");
                                        // console.log(data)
                                        if (data.error === true) {
                                                $('#smartwizard').smartWizard("next");
                                        } else if (data.error === false) {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: 'This admission no already exist',
                                                        title: 'Add Student',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,

                                                });
                                        }
                                }
                        });
                        return false;
                } else {
                        $('#smartwizard').smartWizard({
                                errorSteps: [1] // Highlight step with errors
                        });
                }
        });
        $('#savePreviousDetail').on('click', function(e) {
                e.preventDefault();
                if ($('#add_student_previous_detail').valid()) {
                        // studentFormData.previousDetail=$('#add_student_previous_detail').serialize();
                        // console.log(studentFormData);
                        $('#smartwizard').smartWizard("next");
                } else {
                        $('#smartwizard').smartWizard({
                                errorSteps: [2] // Highlight step with errors
                        });
                }
        });
        $('#saveStudentAddress').on('click', function(e) {
                e.preventDefault();
                if ($('#add_student_address').valid()) {
                        // studentFormData.previousDetail=$('#add_student_previous_detail').serialize();
                        // console.log(studentFormData);
                        $('#smartwizard').smartWizard("next");
                } else {
                        $('#smartwizard').smartWizard({
                                errorSteps: [3] // Highlight step with errors
                        });
                }
        });
        $('#saveStudentParents').on('click', function(e) {
                e.preventDefault();
                if ($('#add_student_parents_details').valid()) {
                        // studentFormData.previousDetail=$('#add_student_previous_detail').serialize();
                        // console.log(studentFormData);
                        $('#smartwizard').smartWizard("next");
                } else {
                        $('#smartwizard').smartWizard({
                                errorSteps: [4] // Highlight step with errors
                        });
                }
        });
        $('#saveStudentOptional').on('click', function(e) {
                e.preventDefault();
                if ($('#add_student_optional').valid()) {
                        $('#smartwizard').smartWizard("loader", "show");
                        var objData = {}
                        $("#add_student_info").serializeArray().map(function(x) {
                                // console.log(x)
                                if (x.name == "doc_submitted_birth_certificate" || x.name == "doc_submitted_transfer_certifiucate" || x.name == "doc_submitted_aadhar_card" || x.name == "doc_submitted_aadhar_Other") {
                                        if (x.value == "on") { objData[x.name] = "Yes" } else { objData[x.name] = "No" }
                                } else {
                                        objData[x.name] = x.value
                                }
                        });
                        $("#add_student_previous_detail").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        $("#add_student_address").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        $("#add_student_parents_details").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        $("#add_student_optional").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        console.log(objData);
                        $.ajax({
                                type: "POST",
                                url: "Student/saveStudentMaster",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: objData,
                                success: function(data) {
                                        console.log(data)
                                        $('#smartwizard').smartWizard("loader", "hide");
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Add Student',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                // $(location).attr("href", 'add-student');
                                                $("#add_student_info").trigger('reset');
                                                $("#add_student_previous_detail").trigger('reset');
                                                $("#add_student_address").trigger('reset');
                                                $("#add_student_parents_details").trigger('reset');
                                                $("#add_student_optional").trigger('reset');
                                                $('#smartwizard').smartWizard("reset");
                                                // $(location).attr("href", 'viewStudentMaster');
                                        } else if (data.error === true) {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: 'Failed ! Try again later',
                                                        title: 'Add Student',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                                $("#add_student_info").trigger('reset');
                                                $("#add_student_previous_detail").trigger('reset');
                                                $("#add_student_address").trigger('reset');
                                                $("#add_student_parents_details").trigger('reset');
                                                $("#add_student_optional").trigger('reset');
                                                $('#smartwizard').smartWizard("reset");
                                        }
                                }
                        });
                        return false;
                } 
                else 
                {
                  $('#smartwizard').smartWizard({
                          errorSteps: [5] // Highlight step with errors
                  });
                }
        });
        // edit bstudent------------------------------------------------//
        $('#editStudentInfo').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_student_info').valid()) {
                    $('#smartwizardEdit').smartWizard("next");
                } else {
                        $('#smartwizardEdit').smartWizard({
                                errorSteps: [1] // Highlight step with errors
                        });
                }
        });
        $('#editPreviousDetail').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_student_previous_detail').valid()) {
                        $('#smartwizardEdit').smartWizard("next");
                } else {
                        $('#smartwizardEdit').smartWizard({
                                errorSteps: [2] // Highlight step with errors
                        });
                }
        });
        $('#editStudentAddress').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_student_address').valid()) {
                        // studentFormData.previousDetail=$('#edit_student_previous_detail').serialize();
                        // console.log(studentFormData);
                        $('#smartwizardEdit').smartWizard("next");
                } else {
                        $('#smartwizardEdit').smartWizard({
                                errorSteps: [3] // Highlight step with errors
                        });
                }
        });
        $('#editStudentParents').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_student_parents_details').valid()) {
                        $('#smartwizardEdit').smartWizard("next");
                } else {
                        $('#smartwizardEdit').smartWizard({
                                errorSteps: [4] // Highlight step with errors
                        });
                }
        });
        $('#editStudentOptional').on('click', function(e) {
                e.preventDefault();
                if ($('#edit_student_optional').valid()) {
                        $('#smartwizardEdit').smartWizard("loader", "show");
                        var objData = {}
                        $("#edit_student_info").serializeArray().map(function(x) {
                                // console.log(x)
                                if (x.name == "doc_submitted_birth_certificate" || x.name == "doc_submitted_transfer_certifiucate" || x.name == "doc_submitted_aadhar_card" || x.name == "doc_submitted_aadhar_Other") {
                                        if (x.value == "on") { objData[x.name] = "Yes" } else { objData[x.name] = "No" }
                                } else {
                                        objData[x.name] = x.value
                                }
                        });
                        $("#edit_student_previous_detail").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        $("#edit_student_address").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        $("#edit_student_parents_details").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        $("#edit_student_optional").serializeArray().map(function(x) {
                                objData[x.name] = x.value
                        });
                        console.log(objData);
                        $.ajax({
                                type: "POST",
                                url: "Student/updateById",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: objData,
                                success: function(data) {
                                        console.log(data)
                                        $('#smartwizardEdit').smartWizard("loader", "hide");
                                        // console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Edit Student',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $(location).attr("href", 'viewStudentMaster');
                                        } else if (data.error === true) {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: 'Failed ! Try again later',
                                                        title: 'Add Student',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                                $("#edit_student_info").trigger('reset');
                                                $("#edit_student_previous_detail").trigger('reset');
                                                $("#edit_student_address").trigger('reset');
                                                $("#edit_student_parents_details").trigger('reset');
                                                $("#edit_student_optional").trigger('reset');
                                                $('#smartwizardEdit').smartWizard("reset");
                                                $(location).attr("href", 'viewStudentMaster');
                                        }
                                }
                        });
                        return false;
                } 
                else 
                {
                  $('#smartwizardEdit').smartWizard({
                          errorSteps: [5] // Highlight step with errors
                  });
                }
        });
        $('#onEditStudent').on('click', function(e) {
                e.preventDefault();
                console.log($('#edit_student_master').valid())
                if ($('#edit_student_master').valid()) {
                        // console.log($('#edit_student_master').serialize())
                        $.ajax({
                                type: "POST",
                                url: "Student/updateById",
                                // contentType: "application/json; charset=utf-8",
                                dataType: "JSON",
                                data: $('#edit_student_master').serialize(),
                                success: function(data) {
                                        console.log(data)
                                        if (data.error === false) {
                                                Swal.fire({
                                                        timer: 5000,
                                                        icon: 'success',
                                                        text: 'Successful',
                                                        title: 'Edit Student Master',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false
                                                });
                                                $(location).attr("href", 'viewStudentMaster');
                                        } else {
                                                Swal.fire({
                                                        icon: 'error',
                                                        text: data.text,
                                                        title: 'Edit Student Master',
                                                        swaltoast: false,
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                });
                                                $(location).attr("href", 'viewStudentMaster');
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
        console.log(splitullu[2]);
        var obj = JSON.parse(sessionStorage.getItem('loginCredentials'));
        if(obj==null){
                $(location).attr("href","logout");
        }
        if (splitullu[2] == "viewStudentMaster") {
                $.ajax({
                        type: "POST",
                        url: "Student/getStudentTable",
                        dataType: "JSON",
                        success: function(data) {
                                console.log(data)
                                if (data.error === false) {
                                        $('#StudentTable').DataTable({
                                                processing: true,
                                                data: data.data,
                                                searching: true,
                                                initComplete: function(settings){
                                                                        if (obj.authority != "admin") {
                                                                                $('#StudentTable').DataTable().columns([5, 6]).visible(false);
                                                                        }
                                                },
                                                columns: [
                                                        { data: "admisstion_no" },
                                                        { data: "name_of_student" },
                                                        { data: "class" },
                                                        { data: "section" },
                                                        { data: "roll_no" },
                                                        { data: null, defaultContent: "<i id=" + 'studentClickTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">edit</i>" },
                                                        { data: null, defaultContent: "<i id=" + 'studentDelTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">delete_forever</i>" },
                                                        { data: null, defaultContent: "<i id="+ 'viewReportStudent' +" class="+'material-icons'+" style="+'cursor:pointer'+">remove_red_eye</i>"},
                                                ],
                                                // columnDefs: [{
                                                //         targets: [5, 6],
                                                //         render: function(data, type, row, meta) {
                                                //                 if (obj.authority != "admin") {
                                                //                         $('#StudentTable').DataTable().columns([5, 6]).visible(false);
                                                //                 }
                                                //         }
                                                // }, ],
                                                paging: true,
                                                info: true,
                                                language: {
                                                        emptyTable: "No data available "
                                                },
                                        });

                                        $('#StudentTable tbody').on('click', '#viewReportStudent', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#StudentTable').DataTable().row($row).data();
                                                console.log(data);
                                                sessionStorage.setItem('studentReport', JSON.stringify(data));
                                                $(location).attr("href", 'studentReport');
                                        });
                                        $('#StudentTable tbody').on('click', '#studentClickTable', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#StudentTable').DataTable().row($row).data();
                                                console.log(data);
                                                sessionStorage.setItem('latestStudentEdit', JSON.stringify(data));
                                                $(location).attr("href", 'editStudent');
                                        });
                                        $('#StudentTable tbody').on('click', '#studentDelTable', function() {
                                                var $row = $(this).closest('tr');
                                                var data = $('#StudentTable').DataTable().row($row).data();
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
                                                                        type: "POST",
                                                                        url: "Student/deleteById",
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
                                                                                                title: 'Delete Fee Head',
                                                                                                swaltoast: false,
                                                                                                allowOutsideClick: false,
                                                                                                allowEscapeKey: false
                                                                                        });
                                                                                        $(location).attr("href", 'viewStudentMaster');
                                                                                } else {
                                                                                        Swal.fire({
                                                                                                icon: 'error',
                                                                                                text: 'Some error occured',
                                                                                                title: 'Delete Fee Head',
                                                                                                swaltoast: false,
                                                                                                allowOutsideClick: false,
                                                                                                allowEscapeKey: false,
                                                                                        });
                                                                                        $(location).attr("href", 'viewStudentMaster');
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
                                                title: 'View Student',
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
        if (splitullu[2] == "editStudent") {
          $('#smartwizardEdit').smartWizard("loader","show");
                var user = JSON.parse(sessionStorage.getItem('latestStudentEdit'));
                // console.clear();
                console.table(user);
                var form1 = $('#edit_student_info');
                var form2 = $('#edit_student_previous_detail');
                var form3 = $('#edit_student_address');
                var form4 = $('#edit_student_parents_details');
                var form5 = $('#edit_student_optional');
                $.each(user, function(key, value) {
                        form1.find("input[name='" + key + "']").val(value).focus();
                        form1.find("select[name='" + key + "']").val(value).change();
                        form1.find("textarea[name='" + key + "']").val(value).focus();
                        // form1.find("input[name='" + key + "']").val(value).focus();
                        
                        form2.find("input[name='" + key + "']").val(value).focus();
                        form2.find("select[name='" + key + "']").val(value).change();
                        form2.find("textarea[name='" + key + "']").val(value).focus();

                        form3.find("input[name='" + key + "']").val(value).focus();
                        form3.find("select[name='" + key + "']").val(value).change();
                        form3.find("textarea[name='" + key + "']").val(value).focus();

                        form4.find("input[name='" + key + "']").val(value).focus();
                        form4.find("select[name='" + key + "']").val(value).change();
                        form4.find("textarea[name='" + key + "']").val(value).focus();

                        form5.find("input[name='" + key + "']").val(value).focus();
                        form5.find("select[name='" + key + "']").val(value).change();
                        form5.find("textarea[name='" + key + "']").val(value).focus();
                });

                if(user.doc_submitted_birth_certificate=="Yes"){
                  $('#md_checkbox_1').prop('checked', true);
                }
                if(user.doc_submitted_transfer_certifiucate=="Yes"){
                 $('#md_checkbox_2').prop('checked', true);
                }
                if(user.doc_submitted_aadhar_card=="Yes"){
                  $('#md_checkbox_3').prop('checked', true);
                }
                if(user.doc_submitted_aadhar_Other=="Yes"){
                  $('#md_checkbox_4').prop('checked', true);
                }
                form1.find("input[name=dob]").val(moment(user.dob).format('YYYY-MM-DD')).change();
                form1.find("input[name=addmition_date]").val(moment(user.addmition_date).format('YYYY-MM-DD')).change();

                form2.find("input[name=date_of_issue_certificate]").val(moment(user.date_of_issue_certificate).format('YYYY-MM-DD')).change();
                form2.find("input[name=school_left_date]").val(moment(user.school_left_date).format('YYYY-MM-DD')).change();
                form2.find("input[name=date_of_issue_of_left_cert]").val(moment(user.date_of_issue_of_left_cert).format('YYYY-MM-DD')).change();
                // image src //
                // var src=window.location.origin+'/admin/uploads/';
                // var src =window.location.origin+'/rtc/uploads/';
                if(user.student_photo!=""||user.student_photo!=null){$('#studentPhotoFrameE').attr("src",link+user.student_photo);}
                if(user.father_photo!=""||user.father_photo!=null){$('#fatherPhotoFrameE').attr("src",link+user.father_photo);}
                if(user.mother_photo!=""||user.mother_photo!=null){$('#motherPhotoFrameE').attr("src",link+user.mother_photo);}
                if(user.gurdian_photo!=""||user.gurdian_photo!=null){$('#guardianPhotoFrameE').attr("src",link+user.gurdian_photo);}
                $('#smartwizardEdit').smartWizard("loader","hide");
        }
        if (splitullu[2] == "studentReport") {
                const student=JSON.parse(sessionStorage.getItem('studentReport'));
                if(student!=null)
                {
                        // console.log(base_url);
                        console.table(student);
                        setReportData(student);
                }
                else
                {
                        alert("Your session has been expired , please log in again to continue !")
                        $(location).attr("href","logout");
                }
        }
});
// -----------------------------------------assigning student report data----------------------------------------- //
function setReportData(student){
        student.name_of_student != null ? ($('#studentReportName').html(student.name_of_student)) : ($('#studentReportName').html("------"))
        student.student_photo != "" || null ? ($('#studentReportSTDPIC').attr("src",link+student.student_photo)) : ($('#studentReportSTDPIC').attr("src","https://source.unsplash.com/600x300/?nophoto"))
        student.admisstion_no != "" || null ? ($('#studentReportAdmno').html(student.admisstion_no)) : ($('#studentReportAdmno').html("------"))
        student.class != "" || null ? ($('#studentReportClass').html(student.class)) : ($('#studentReportClass').html("------"))
        student.section != "" || null ? ($('#studentReportSection').html(student.section)) : ($('#studentReportSection').html("------"))
        student.student_contact_no != "" || null ? ($('#studentReportContact').html(student.student_contact_no)) : ($('#studentReportContact').html("------"))
        student.student_email != "" || null ? ($('#studentReportEmail').html(student.student_email)) : ($('#studentReportEmail').html("------"))
        student.blood_group != "" || null ? ($('#studentReportBlood').html(student.blood_group)) : ($('#studentReportBlood').html("------"))

        student.addmition_date != "" || null ? ($('#studentReportAdmDate').html(new Date(student.addmition_date).toLocaleDateString("en-US",Dateoptions))) : ($('#studentReportAdmDate').html("------"))
        student.dob != "" || null ? ($('#studentReportAge').html(moment().diff(moment(student.dob, 'YYYYMMDD'), 'years')).focus()) : ($('#studentReportAge').html("------"))
        student.dob != "" || null ? ($('#studentReportDob').html(new Date(student.dob).toLocaleDateString("en-US",Dateoptions))) : ($('#studentReportDob').html("------"))
        student.sex != "" || null ? ($('#studentReportSex').html(student.sex)) : ($('#studentReportSex').html("------"))
        student.religion != "" || null ? ($('#studentReportReligion').html(student.religion)) : ($('#studentReportReligion').html("------"))
        student.house != "" || null ? ($('#studentReportHouse').html(student.house)) : ($('#studentReportHouse').html("------"))
        student.address != "" || null ? ($('#studentReportAddress').html(student.address)) : ($('#studentReportAddress').html("------"))
        student.std_cast != "" || null ? ($('#studentReportStdCast').html(student.std_cast)) : ($('#studentReportStdCast').html("------"))
        student.identi_mark != "" || null ? ($('#studentReportIdenMark').html(student.identi_mark)) : ($('#studentReportIdenMark').html("------"))
        student.uid_no != "" || null ? ($('#studentReportUidNo').html(student.uid_no)) : ($('#studentReportUidNo').html("------"))

        student.res_address != "" || null ? ($('#studentReportResiAdd').html(student.res_address)) : ($('#studentReportResiAdd').html("------"))
        student.res_landmark != "" || null ? ($('#studentReportResiLand').html(student.res_landmark)) : ($('#studentReportResiLand').html("------"))
        student.res_state != "" || null ? ($('#studentReportResiState').html(student.res_state)) : ($('#studentReportResiState').html("------"))
        student.res_city != "" || null ? ($('#studentReportResiCity').html(student.res_city)) : ($('#studentReportResiCity').html("------"))
        student.res_pin_code != "" || null ? ($('#studentReportResiPincode').html(student.res_pin_code)) : ($('#studentReportResiPincode').html("------"))
        student.res_distance != "" || null ? ($('#studentReportResiApprox').html(student.res_distance)) : ($('#studentReportResiApprox').html("------"))
        student.corres_address != "" || null ? ($('#studentReportCorresAdd').html(student.corres_address)) : ($('#studentReportCorresAdd').html("------"))
        student.corres_landmark != "" || null ? ($('#studentReportCorresLand').html(student.corres_landmark)) : ($('#studentReportCorresLand').html("------"))
        student.corres_state != "" || null ? ($('#studentReportCorresState').html(student.corres_state)) : ($('#studentReportCorresState').html("------"))
        student.corres_ciry != "" || null ? ($('#studentReportCorresCity').html(student.corres_ciry)) : ($('#studentReportCorresCity').html("------"))
        student.corres_pin_code != "" || null ? ($('#studentReportCorresPincode').html(student.corres_pin_code)) : ($('#studentReportCorresPincode').html("------"))
        student.corres_distance != "" || null ? ($('#studentReportCorresApprox').html(student.corres_distance)) : ($('#studentReportCorresApprox').html("------"))

        student.father_name != "" || null ? ($('#studentReportFName').html(student.father_name)) : ($('#studentReportFName').html("Father's Name :---------"))
        student.mother_name != "" || null ? ($('#studentReportMName').html(student.mother_name)) : ($('#studentReportMName').html("Mother's Name :------"))
        student.Guardian_name != "" || null ? ($('#studentReportGName').html(student.Guardian_name)) : ($('#studentReportGName').html("Guardian's Name :------"))

        student.father_photo != "" || null ? ($('#studentReportFPIC').attr("src",link+student.father_photo)) : ($('#studentReportFPIC').attr("src","https://source.unsplash.com/600x300/?nophoto"))
        student.mother_photo != "" || null ? ($('#studentReportMPIC').attr("src",link+student.mother_photo)) : ($('#studentReportMPIC').attr("src","https://source.unsplash.com/600x300/?nophoto"))
        student.gurdian_photo != "" || null ? ($('#studentReportGPIC').attr("src",link+student.gurdian_photo)) : ($('#studentReportGPIC').attr("src","https://source.unsplash.com/600x300/?nophoto"))

        student.F_occupation != "" || null ? ($('#studentReportFOccupation').html(student.F_occupation)) : ($('#studentReportFOccupation').html("------"))
        student.M_occupation != "" || null ? ($('#studentReportMOccupation').html(student.M_occupation)) : ($('#studentReportMOccupation').html("------"))
        student.G_occupation != "" || null ? ($('#studentReportGOccupation').html(student.G_occupation)) : ($('#studentReportGOccupation').html("------"))

        student.F_company != "" || null ? ($('#studentReportFComp').html(student.F_company)) : ($('#studentReportFComp').html("------"))
        student.M_company != "" || null ? ($('#studentReportMComp').html(student.M_company)) : ($('#studentReportMComp').html("------"))

        student.F_dept != "" || null ? ($('#studentReportFDept').html(student.F_dept)) : ($('#studentReportFDept').html("------"))
        student.M_dept != "" || null ? ($('#studentReportMDept').html(student.M_dept)) : ($('#studentReportMDept').html("------"))

        student.F_ticket_no != "" || null ? ($('#studentReportFTicket').html(student.F_ticket_no)) : ($('#studentReportFTicket').html("------"))
        student.M_Ticket_no != "" || null ? ($('#studentReportMTicket').html(student.M_Ticket_no)) : ($('#studentReportMTicket').html("------"))

        student.F_office_address != "" || null ? ($('#studentReportFOffice').html(student.F_office_address)) : ($('#studentReportFOffice').html("------"))
        student.M_office_address != "" || null ? ($('#studentReportMOffice').html(student.M_office_address)) : ($('#studentReportMOffice').html("------"))
        student.G_address != "" || null ? ($('#studentReportGAdd').html(student.G_address)) : ($('#studentReportGAdd').html("------"))

        student.F_cont_no != "" || null ? ($('#studentReportFContact').html(student.F_cont_no)) : ($('#studentReportFContact').html("------"))
        student.M_cont_no != "" || null ? ($('#studentReportMContact').html(student.M_cont_no)) : ($('#studentReportMContact').html("------"))
        student.G_cont_no != "" || null ? ($('#studentReportGContact').html(student.G_cont_no)) : ($('#studentReportGContact').html("------"))

        student.F_email != "" || null ? ($('#studentReportFEmail').html(student.F_email)) : ($('#studentReportFEmail').html("------"))
        student.M_email_ID != "" || null ? ($('#studentReportMEmail').html(student.M_email_ID)) : ($('#studentReportMEmail').html("------"))
        student.G_Email_ID != "" || null ? ($('#studentReportGEmail').html(student.G_Email_ID)) : ($('#studentReportGEmail').html("------"))
        student.Relation != "" || null ? ($('#studentReportGRelation').html(student.Relation)) : ($('#studentReportGRelation').html("------"))

       
}
// -------------------------------------end assigning student report data----------------------------------------- //
//------------------------------------------------ student upload ------------------------------------------------//
function uploadStudentPhoto(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#add_student_info')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadStudent",
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
        $('#student_photo').val(data.data.file_name);
        $('#studentPhotoFrame').attr("src",src);
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
function uploadStudentPhotoE(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#edit_student_info')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadStudent",
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
        $('#student_photoE').val(data.data.file_name);
        $('#studentPhotoFrameE').attr("src",src);
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
//------------------------------------------------ father upload ------------------------------------------------//
function uploadFatherPhoto(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#add_student_parents_details')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadFather",
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
        $('#father_photo').val(data.data.file_name);
        $('#fatherPhotoFrame').attr("src",src);
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
function uploadFatherPhotoE(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#edit_student_parents_details')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadFather",
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
        $('#father_photoE').val(data.data.file_name);
        $('#fatherPhotoFrameE').attr("src",src);
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
//------------------------------------------------ mother upload ------------------------------------------------//
function uploadMotherPhoto(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#add_student_parents_details')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadMother",
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
        $('#mother_photo').val(data.data.file_name);
        $('#motherPhotoFrame').attr("src",src);
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
function uploadMotherPhotoE(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#edit_student_parents_details')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadMother",
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
        $('#mother_photoE').val(data.data.file_name);
        $('#motherPhotoFrameE').attr("src",src);
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
//------------------------------------------------ guardian upload ------------------------------------------------//
function uploadGuardianPhoto(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#add_student_parents_details')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadGuardian",
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
        $('#gurdian_photo').val(data.data.file_name);
        $('#guardianPhotoFrame').attr("src",src);
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
function uploadGuardianPhotoE(e){
  Swal.fire({
        icon: 'info',
        didOpen: () => { Swal.showLoading() },
        swaltoast: false,
        allowOutsideClick: false,
        allowEscapeKey: false
  });
  let data = e.target.files[0];
  var upload_data = new FormData($('#edit_student_parents_details')[0]);
  // console.log(upload_data)
  $.ajax({
    type : "POST",
    url  : "Student/UploadGuardian",
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
        $('#gurdian_photoE').val(data.data.file_name);
        $('#guardianPhotoFrameE').attr("src",src);
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