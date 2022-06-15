<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account-convert"></i>
        </span> <?php echo $title; ?>
      </h3>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Student Master Registration</h4>
            <form class="form-sample" method="post" action="<?php echo base_url(); ?>addStudent">
              <p class="card-description"> Enter new student details here </p>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Admission No.</label>
                    <div class="col-sm-7">
                      <input type="text" name="admissionNo" class="form-control" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Student Name</label>
                    <div class="col-sm-7">
                      <input type="text" name="studentName" class="form-control" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Gender</label>
                    <div class="col-sm-6 mt-2">
                      <select name="gender" class="form-control">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 1st row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Date of Birth</label>
                    <div class="col-sm-7">
                      <input type="date" name="dob" class="form-control" placeholder="dd/mm/yyyy" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Name of previous School</label>
                    <div class="col-sm-7">
                      <input type="text" name="previousSchoolName" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Roll No.</label>
                    <div class="col-sm-6">
                      <input type="text" name="rollNo" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 2nd row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Contact No.</label>
                    <div class="col-sm-7">
                      <input type="text" name="contactNo" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Correspondence address</label>
                    <div class="col-sm-7">
                      <input type="text" name="correspondenceAddress" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Session</label>
                    <div class="col-sm-6 mt-2">
                      <select name="session" class="form-control">
                        <option value="2021-22">2021-22</option>
                        <!-- <option>Category2</option>
                                <option>Category3</option>
                                <option>Category4</option> -->
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 3rd row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Blood Group</label>
                    <div class="col-sm-7">
                      <input type="text" name="bloodGroup" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Aadhar Card No.</label>
                    <div class="col-sm-7">
                      <input type="text" name="aadharNo" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Class</label>
                    <div class="col-sm-6">
                      <select name="class" class="form-control" required>
                        <option value="1">I</option>
                        <option value="2">II</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 4th row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Email Id</label>
                    <div class="col-sm-7">
                      <input type="email" name="email" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Date of Leaving school</label>
                    <div class="col-sm-7">
                      <input type="date" name="dateLeaveSchool" class="form-control" placeholder="dd/mm/yyyy" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Section</label>
                    <div class="col-sm-6 mt-2">
                      <select class="form-control" required>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 5th row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Remarks</label>
                    <div class="col-sm-7">
                      <input type="text" name="remarks" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Date of Admission</label>
                    <div class="col-sm-7">
                      <input type="date" name="dateAdmission" class="form-control" placeholder="dd/mm/yyyy" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Form No.</label>
                    <div class="col-sm-6">
                      <input type="text" name="formNo" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 6th row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Certificate</label>
                    <div class="col-sm-7">
                      <input type="text" name="certificate" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Previous school registration No.</label>
                    <div class="col-sm-7">
                      <input type="text" name="previousSchoolRegistration" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Previous school</label>
                    <div class="col-sm-7">
                      <input type="text" name="previousSchool" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 7th row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Permanent Address</label>
                    <div class="col-sm-7">
                      <input type="text" name="permanentAddress" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Registration No.</label>
                    <div class="col-sm-7">
                      <input type="text" name="registrationNo" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Cast</label>
                    <div class="col-sm-7">
                      <input type="text" name="cast" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 8th row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Disabled Certificate No.</label>
                    <div class="col-sm-7">
                      <input type="text" name="disabledCertificateNo" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Age proof certificate</label>
                    <div class="col-sm-7">
                      <input type="text" name="ageProofCertificate" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Status</label>
                    <div class="col-sm-7">
                      <input type="text" name="status" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 9th row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Transfer certificate no.</label>
                    <div class="col-sm-9">
                      <input type="text" name="transferCertificateNo" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Identification mark</label>
                    <div class="col-sm-9">
                      <input type="text" name="identificationMark" class="form-control" />
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Add</button>
                <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->