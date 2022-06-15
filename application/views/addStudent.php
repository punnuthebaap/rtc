<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
    .date-picker{
        border: none;
        font-size: 15px;
        width: 100%;
    }
    .theme-red .nav > li > a{
        color: gray;
    }
    .tab-content{
        height: auto!important;
    }
    .form-group .form-control{
        background: #ffffaf;
        border-radius: 10px;
    }
    .form-label{
        margin-left: 10px;
    }
    .frame{
        height: 150px;
        width: 150px;
        border: 1px solid;
        padding: 0px !important;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <!--  <div class="block-header">
            <h2><?php echo $title; ?></h2>
        </div> -->
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        <?php echo $title; ?>
                        <!-- <small>Kindly provide the details for the new student</small> -->
                        </h2>
                    </div>
                        <!-- <h2 class="card-inside-title">Basic Details</h2> -->
                        <div id="smartwizard">
                            <ul class="nav">
                               <li>
                                   <a class="nav-link" href="#step-1" onclick="preV(event)">
                                      Student Info
                                   </a>
                               </li>
                               <li>
                                   <a class="nav-link" href="#step-2" onclick="preV(event)">
                                      Previous School & Left Detail
                                   </a>
                               </li>
                               <li>
                                   <a class="nav-link" href="#step-3" onclick="preV(event)">
                                      Address Detail
                                   </a>
                               </li>
                               <li>
                                   <a class="nav-link" href="#step-4" onclick="preV(event)">
                                      Parents Detail
                                   </a>
                               </li>
                               <li>
                                   <a class="nav-link" href="#step-5" onclick="preV(event)">
                                      Subject
                                   </a>
                               </li>
                            </ul>
                         
                            <div class="tab-content">
                               <div id="step-1" class="tab-pane" role="tabpanel">
                                <form id="add_student_info" method="POST">
                                  <div class="row clearfix">
                                    <div style="padding-top:25px">
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="admisstion_no" class="form-control" required/>
                                                    <label class="form-label">Admission No. *</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="name_of_student" class="form-control" required/>
                                                    <label class="form-label">Name of Student *</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="class" class="form-control show-tick" onchange="getsectionStu()" required>
                                                        <option value="">Select a class *</option>
                                                       <?php foreach($class as $item){
                                                        echo '<option value="' . $item['class'] . '">' . $item['class'] . '</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="section" id="studentAddSection1" class="form-control show-tick" required>
                                                        <option value="">Select a section *</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                            <textarea rows="2" name="address" class="form-control no-resize"></textarea>
                                                            <label class="form-label">Address</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" min="1" name="roll_no" class="form-control" required />
                                                    <label class="form-label">Roll No. *</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="blood_group" class="form-control show-tick">
                                                        <option value="">Blood Group</option>
                                                        <option value="A+">A+</option>
                                                        <option value="B+">B+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O-">O-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="NIL">NIL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="sex" class="form-control show-tick">
                                                        <option value="">Select Gender</option>
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="nationality" class="form-control show-tick">
                                                        <option value="">Nationality</option>
                                                        <option value="indian">Indian</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="aadhar_card_status" class="form-control show-tick">
                                                        <option value="">Aadhar Card</option>
                                                        <option value="YES">YES</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="email" name="student_email" class="form-control" />
                                                    <label class="form-label">Email Id</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="religion" class="form-control show-tick">
                                                        <option value="">Select Religion</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Muslim">Muslim</option>
                                                        <option value="Christian">Christian</option>
                                                        <option value="Sikh">Sikh</option>
                                                        <option value="Buddhist">Buddhist</option>
                                                        <option value="Jain">Jain</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="hostel" class="form-control show-tick">
                                                        <option value="">Select Hostel</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                            <textarea rows="2" name="remarks" class="form-control no-resize"></textarea>
                                                            <label class="form-label">Remarks</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="std_cast" class="form-control show-tick">
                                                        <option value="">Select Cast</option>
                                                        <option value="GEN">GENERAL</option>
                                                        <option value="OBC">OBC</option>
                                                        <option value="ST">ST</option>
                                                        <option value="SC">SC</option>
                                                        <option value="OTHERS">OTHERS</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="house" class="form-control show-tick">
                                                        <option value="">Select House</option>
                                                        <option value="Red">Red</option>
                                                        <option value="Green">Green</option>
                                                        <option value="Blue">Blue</option>
                                                        <option value="Yelllow">Yelllow</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="category" class="form-control show-tick">
                                                        <option value="">Category</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="BPL">BPL</option>
                                                        <option value="Half">Half</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="tel" name="student_contact_no" class="form-control"/>
                                                    <label class="form-label">Contact No.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="aadhar_card_enrollment" class="form-control show-tick">
                                                        <option value="">Enrolled for Aadhar Card</option>
                                                        <option value="YES">YES</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="identi_mark" class="form-control"/>
                                                    <label class="form-label">Identification marks</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="age_proof" class="form-control"/>
                                                    <label class="form-label">Enter age proof</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-3">
                                                <label class="form-label">Documents Submitted</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" name="doc_submitted_birth_certificate" id="md_checkbox_1" class="chk-col-red"/>
                                                    <label for="md_checkbox_1">Birth Certificate</label>
                                                    <input type="checkbox" name="doc_submitted_transfer_certifiucate" id="md_checkbox_2" class="chk-col-red"/>
                                                    <label for="md_checkbox_2">Transfer Certificate</label>
                                                    <input type="checkbox" name="doc_submitted_aadhar_card" id="md_checkbox_3" class="chk-col-red"/>
                                                    <label for="md_checkbox_3">Aadhar Card</label>
                                                    <input type="checkbox" name="doc_submitted_aadhar_Other" id="md_checkbox_4" class="chk-col-red"/>
                                                    <label for="md_checkbox_4">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 10px;">
                                            <div class="form-group">
                                                <label class="form-label">Date of birth</label>
                                                <div class="form-line">
                                                    <input type="date" id="studentAddDob" name="dob" max="<?= date('Y-m-d'); ?>" class="form-control" placeholder="Date of birth" onblur="calcAge($('#studentAddDob').val())" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 10px;">
                                            <div class="form-group">
                                                <label class="form-label">Date of Admission *</label>
                                                <div class="form-line">
                                                    <input type="date" name="addmition_date" max="<?= date('Y-m-d'); ?>" class="form-control" placeholder="Date of birth" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" minlength="4" maxlength="4" name="admission_for_year" class="form-control" required/>
                                                    <label class="form-label">Admission Year</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" id="studentAddAge" name="age" min="1" class="form-control" readonly/>
                                                    <label class="form-label">Age</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="medical_card_no" />
                                                    <label class="form-label">Medical Card Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="uid_no" />
                                                    <label class="form-label">Aadhar Card Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                    <label class="form-label">Upload File</label>
                                                <div class="form-line">
                                                    <input type="file" id="fileUploadStudent" name="fileUploadStudent" class="form-control" onchange ="uploadStudentPhoto(event)"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 frame">
                                            <img id="studentPhotoFrame" src="" style="width:100%;height: 100%;">
                                        </div>
                                        <div class="col-sm-4" style="display: none">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="student_photo" name="student_photo" class="form-control"  readonly required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <button id="saveStudentInfo" class="btn btn-block bg-pink waves-effect" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                               </div>
                               <div id="step-2" class="tab-pane" role="tabpanel">
                                    <form id="add_student_previous_detail" method="POST">
                                          <div class="row clearfix">
                                            <div class="header">
                                                <h2>
                                                Reference Details :
                                                </h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float br_select">
                                                    <div class="form-line">
                                                        <select name="isanysibling" class="form-control show-tick">
                                                            <option value="">Is any sibling styudying in this school ?</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="sibling_name" class="form-control" />
                                                            <label class="form-label">Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="sibling_falther" class="form-control" />
                                                            <label class="form-label">Mother's Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float br_select">
                                                        <div class="form-line">
                                                    <select name="sibling_class" class="form-control show-tick" onchange="getsectionStuSib()">
                                                            <option value="">Select a class *</option>
                                                           <?php foreach($class as $item){
                                                            echo '<option value="' . $item['class'] . '">' . $item['class'] . '</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float br_select">
                                                        <div class="form-line">
                                                            <select name="sibling_section" id="sibling_section" class="form-control show-tick">
                                                                    <option value="">Select a section *</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" min="1" name="sibling_roll_no" class="form-control" />
                                                            <label class="form-label">Roll No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="height: 2px;background: black;">
                                        <div class="row clearfix">
                                            <div class="header">
                                                <h2>
                                                Previous School Detail :
                                                </h2>
                                            </div>
                                            <div class="row col-sm-12 mt-3">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="name_of_pre_school" />
                                                            <label class="form-label">Name of previous school</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="transfer_cert_no" />
                                                            <label class="form-label">Transfer Certificate No.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 10px;">
                                                <div class="form-group form-float">
                                                    <label class="form-label">Date of issue Transfer Certificate</label>
                                                    <div class="form-line">
                                                        <input type="date" name="date_of_issue_certificate" max="<?= date('Y-m-d'); ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="height: 2px;background: black;">
                                        <div class="row clearfix">
                                            <div class="header">
                                                <h2>
                                                Left Student Detail :
                                                </h2>
                                            </div>
                                            <div class="row col-sm-12 mt-3">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <label class="form-label">Date of leaving school</label>
                                                        <div class="form-line">
                                                            <input type="date" max="<?= date('Y-m-d'); ?>" name="school_left_date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <label class="form-label">Date of issue Certificate</label>
                                                        <div class="form-line">
                                                            <input type="date" max="<?= date('Y-m-d'); ?>" name="date_of_issue_of_left_cert" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="class_in_which_left" />
                                                            <label class="form-label">Class in which left the school</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="reason_for_leaving_school" />
                                                            <label class="form-label">Reason for leaving</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                            <textarea rows="2" name="left_remarks" class="form-control no-resize"></textarea>
                                                            <label class="form-label">Remarks</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button id="savePreviousDetail" class="btn btn-block bg-pink waves-effect" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                   </div>
                                   <div id="step-3" class="tab-pane" role="tabpanel">
                                    <form id="add_student_address" method="POST">
                                      <div class="row clearfix">
                                        <div class="header">
                                            <h2>
                                            Residential Address :
                                            </h2>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="2" name="res_address" class="form-control no-resize"></textarea>
                                                    <label class="form-label">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="res_landmark" class="form-control" />
                                                        <label class="form-label">Landmark</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="res_state" class="form-control" />
                                                        <label class="form-label">State</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="res_city" class="form-control" />
                                                        <label class="form-label">City</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" minlength="6" name="res_pin_code" class="form-control" />
                                                        <label class="form-label">Pincode</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="res_distance" class="form-control" />
                                                        <label class="form-label">Approx dist from school</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="height: 2px;background: black;">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" name="same_as_residential" id="same_as_residential" class="chk-col-red" onclick="sameAsRes()" />
                                        <label for="same_as_residential">Same As Residential Address</label>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="header">
                                            <h2>
                                            Correspondence Address :
                                            </h2>
                                        </div>
                                            <div class="col-sm-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <textarea rows="2" name="corres_address" class="form-control no-resize"></textarea>
                                                            <label class="form-label">Address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="corres_landmark" class="form-control" />
                                                            <label class="form-label">Landmark</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="corres_state" class="form-control" />
                                                            <label class="form-label">State</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="corres_ciry" class="form-control" />
                                                            <label class="form-label">City</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" minlength="6" name="corres_pin_code" class="form-control" />
                                                            <label class="form-label">Pincode</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="corres_distance" class="form-control" />
                                                            <label class="form-label">Approx dist from school</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button id="saveStudentAddress" class="btn btn-block bg-pink waves-effect" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                   </div>
                                   <div id="step-4" class="tab-pane" role="tabpanel">
                                    <form id="add_student_parents_details" method="POST">
                                      <div class="row clearfix">
                                        <div class="header">
                                            <h2>
                                            Father's Info :
                                            </h2>
                                        </div>
                                        <div class="row col-sm-12" style="margin-top: 14px;">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="father_name" class="form-control" required/>
                                                        <label class="form-label">Father's Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="F_occupation" class="form-control" />
                                                        <label class="form-label">Occupation</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="F_company" class="form-control" />
                                                        <label class="form-label">Company Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="F_dept" class="form-control" />
                                                        <label class="form-label">Department</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="F_ticket_no" class="form-control" />
                                                        <label class="form-label">Ticket No.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="address" name="F_office_address" class="form-control" />
                                                        <label class="form-label">Office Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="tel" name="F_cont_no" class="form-control" />
                                                        <label class="form-label">Contact No.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="email" name="F_email" class="form-control" />
                                                        <label class="form-label">Email Id</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                        <label class="form-label">Upload File</label>
                                                    <div class="form-line">
                                                        <input type="file" id="fileUploadFather" name="fileUploadFather" class="form-control" onchange ="uploadFatherPhoto(event)" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 frame">
                                                <img id="fatherPhotoFrame" src="" style="width:100%;height: 100%;">
                                            </div>
                                            <div class="col-sm-4" style="display: none">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="father_photo" name="father_photo" class="form-control"  readonly required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="height: 2px;background: black;">
                                    <div class="row clearfix">
                                        <div class="header">
                                            <h2>
                                            Mother's Info :
                                            </h2>
                                        </div>
                                        <div class="row col-sm-12" style="margin-top: 14px;">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="mother_name" class="form-control" required/>
                                                        <label class="form-label">Mother's Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="M_occupation" class="form-control" />
                                                        <label class="form-label">Occupation</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="M_company" class="form-control" />
                                                        <label class="form-label">Company Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="M_dept" class="form-control" />
                                                        <label class="form-label">Department</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="M_ticket_no" class="form-control" />
                                                        <label class="form-label">Ticket No.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="address" name="M_office_address" class="form-control" />
                                                        <label class="form-label">Office Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="tel" name="M_cont_no" class="form-control" />
                                                        <label class="form-label">Contact No.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="email" name="M_email_ID" class="form-control" />
                                                        <label class="form-label">Email Id</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                        <label class="form-label">Upload File</label>
                                                    <div class="form-line">
                                                        <input type="file" id="fileUploadMother" name="fileUploadMother" class="form-control" onchange ="uploadMotherPhoto(event)" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 frame">
                                                <img id="motherPhotoFrame" src="" style="width:100%;height: 100%;">
                                            </div>
                                            <div class="col-sm-4" style="display: none">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="mother_photo" name="mother_photo" class="form-control"  readonly required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="height: 2px;background: black;">
                                    <div class="row clearfix">
                                            <div class="header">
                                                <h2>
                                                Guardian's Info :
                                                </h2>
                                            </div>
                                            <div class="row col-sm-12" style="margin-top: 14px;">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="Guardian_name" class="form-control" />
                                                            <label class="form-label">Guardian's Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="Relation" class="form-control" />
                                                            <label class="form-label">Relationship with student</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="G_occupation" class="form-control" />
                                                            <label class="form-label">Occupation</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="address" name="G_address" class="form-control" />
                                                            <label class="form-label">Address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="tel" name="G_cont_no" class="form-control" />
                                                            <label class="form-label">Contact No.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" name="G_Email_ID" class="form-control" />
                                                            <label class="form-label">Email Id</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                            <label class="form-label">Upload File</label>
                                                        <div class="form-line">
                                                            <input type="file" id="fileUploadGuardian" name="fileUploadGuardian" class="form-control" onchange ="uploadGuardianPhoto(event)" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 frame">
                                                    <img id="guardianPhotoFrame" src="" style="width:100%;height: 100%;">
                                                </div>
                                                <div class="col-sm-4" style="display: none">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="gurdian_photo" name="gurdian_photo" class="form-control"  readonly required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <button id="saveStudentParents" class="btn btn-block bg-pink waves-effect" type="submit">Save</button>
                                            </div>
                                    </div>
                                </form>
                               </div>
                               <div id="step-5" class="tab-pane" role="tabpanel">
                                <form id="add_student_optional" method="POST">
                                  <div class="row clearfix">
                                    <div class="header">
                                        <h2>
                                        Optional Subject :
                                        </h2>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top: 14px;">
                                            <div class="col-sm-4">
                                                <div class="form-group form-float br_select">
                                                    <div class="form-line">
                                                        <select name="optional1" class="form-control show-tick">
                                                            <option value="">Option 1</option>
                                                            <option value="Computer">Computer</option>
                                                            <option value="Lab">Lab</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float br_select">
                                                    <div class="form-line">
                                                        <select name="optional2" class="form-control show-tick">
                                                            <option value="">Option 2</option>
                                                            <option value="Computer">Computer</option>
                                                            <option value="Lab">Lab</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float br_select">
                                                    <div class="form-line">
                                                        <select name="optional3" class="form-control show-tick">
                                                            <option value="">Option 3</option>
                                                            <option value="Computer">Computer</option>
                                                            <option value="Lab">Lab</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                            <div class="col-md-12">
                                                <button id="saveStudentOptional" class="btn btn-block bg-pink waves-effect" type="submit">Save</button>
                                            </div>
                                    </div>
                             </form>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // console.log(console.log(document.getElementById('add_student_master').same_as_residential.value));
</script>