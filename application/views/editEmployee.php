<style type="text/css">
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
                        <form id="edit_employee" method="POST">
                            <div class="col-sm-12" style="margin-top:20px;">
                                <div class="row clearfix">
                                    <div class="col-sm-6" style="display:none">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="employee_no" class="form-control" required readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="employee_name" class="form-control" required/>
                                                <label class="form-label">Name of Employee *</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="father_name" class="form-control" />
                                                <label class="form-label">Father's Name </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                    <textarea rows="2" name="permanent_address" class="form-control no-resize" required></textarea>
                                                    <label class="form-label"> Permanent Address *</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                    <textarea rows="2" name="correspondence_address" class="form-control no-resize"></textarea>
                                                    <label class="form-label">Correspondence Address</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="qualification" class="form-control show-tick">
                                                    <option value="">Qualification</option>
                                                    <option value="Bachelors">Bachelors</option>
                                                    <option value="Masters">Master's</option>
                                                    <option value="Doctorate">Doctorate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="gender" class="form-control show-tick" required>
                                                    <option value="">Select Gender *</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="designation" class="form-control show-tick">
                                                    <option value="">Designation</option>
                                                    <option value="Principle">Principle</option>
                                                    <option value="Subject-Teacher">Subject Teacher</option>
                                                    <option value="Class-Teacher">Class Teacher</option>
                                                    <option value="Accountant">Accountant</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="bank_name" class="form-control"/>
                                                <label class="form-label">Bank Name </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="IFSC_code" class="form-control"/>
                                                <label class="form-label">IFSC Code </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="pan_no" class="form-control"/>
                                                <label class="form-label">PAN No. </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="tech_qualification" class="form-control"/>
                                                <label class="form-label">Technical Qualififcation </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float br_select">
                                            <div class="form-line">
                                                <select name="marital_status" class="form-control show-tick">
                                                    <option value="">Marital Status</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Unmarried">Un-Married</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="contact_no" class="form-control"/>
                                                <label class="form-label">Mobile No. </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 row">    
                                        <div class="col-sm-4">
                                            <div class="form-group form-float br_select">
                                                <div class="form-line">
                                                    <select name="experiance" class="form-control show-tick">
                                                        <option value="">Experience</option>
                                                        <option value="1">1 Year</option>
                                                        <option value="2">2 Year</option>
                                                        <option value="5">5 Year</option>
                                                        <option value="10+">10+ Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="Aadhar_no" class="form-control"/>
                                                    <label class="form-label">Aadhar No. </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="account_no" class="form-control"/>
                                                    <label class="form-label">Account No. </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="ESI_no" class="form-control"/>
                                                <label class="form-label">ESI No. </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="pf_no" class="form-control"/>
                                                <label class="form-label">PF No. </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float br_select">
                                            <div class="form-line">
                                                <select name="status" class="form-control show-tick">
                                                    <option value="">Left Status</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Date of birth</label>
                                            <div class="form-line">
                                                <input type="date" name="birth_date" max="<?= date('Y-m-d'); ?>" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Join Date</label>
                                            <div class="form-line">
                                                <input type="date" name="join_date" max="<?= date('Y-m-d'); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Left Date</label>
                                            <div class="form-line">
                                                <input type="date" name="left_date" max="<?= date('Y-m-d'); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:20px;">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                    <label class="form-label">Upload Employee Pic</label>
                                                <div class="form-line">
                                                    <input type="file" id="fileUploadEmployee" name="fileUploadEmployee" class="form-control" onchange ="uploadEmployeePhotoE(event)"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 frame">
                                            <img id="employeePhotoFrameE" src="" style="width:100%;height: 100%;">
                                        </div>
                                        <div class="col-sm-4" style="display: none">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="employee_photoE" name="employee_photo" class="form-control"  readonly required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="onEditEmployee" class="btn btn-block bg-pink waves-effect" type="submit">Save Employee</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // console.log(console.log(document.getElementById('add_student_master').same_as_residential.value));
</script>