<style>
</style>
<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-sm-6" style="margin-bottom: 10px">
                                <h2  style="margin-bottom: 10px">
                                    <?php echo $title;?>
                                </h2>
                                <?php if($info['is_shortlisted']=="NO"){?>
                                    <span class='label bg-red text-right' >Not Shortlisted</span>
                                <?php }else{ ?>
                                    <span class='label bg-green' >Shortlisted</span>
                                <?php } ?>
                                <?php if($info['isFormPay']=="NO"){?>
                                    <span class='label bg-red text-right' >Payment not made</span>
                                <?php }else{ ?>
                                    <span class='label bg-green' >Payment done</span>
                                <?php } ?>

                            </div>
                            <div class="col-sm-offset-3 col-sm-3">
                                <div class="row">
                                <?php if($info['isFormPay']=="YES" && !Is_null($info['application_no']) && !Is_null($info['payment_id'])){?>
                                    <h2 class="text-center" style="margin-bottom: 10px">#<?php echo $info['application_no'];?></h2>
                                <?php }?>

                            	<?php if($info['is_shortlisted']=="NO"){?>
                                    <button class="btn btn-block bg-pink waves-effect" type="submit" onclick="shortListFromReport(<?php echo $info['id']?>)">Click to shortlist</button>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="body" style="font-size:13px;margin-top:20px;">
                            <div class="row">
                                <div class="card" style="box-shadow: none;">
                                      <div class="card-body">
                                        <div class="col-md-4">
                                            <table class="table table-bordered">
                                              <tr>
                                                <th width="50%">Student Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['st_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Admission Year</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['admission_year'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Gender</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['gender'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Nationality</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['nationality'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Religion</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['religion'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Father Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['father_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Mother Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['mother_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Date of Birth</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['date_of_birth'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Present Village</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['present_vill'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Present Post-office</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['present_po'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Present Police-station</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['present_ps'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Present District</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['present_dist'];?></td>
                                              </tr>
                                              
                                    		  <tr>
                                                <th width="50%">Mobile No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['mobile_no'];?></td>
                                              </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table table-bordered">
                                            	<tr>
                                                <th width="50%">Email-Id</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['email'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent Village</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_vill'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent Post-office</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_po'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent Police-station</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_ps'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent District</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_dist'];?></td>
                                              </tr>
                                              <!-- <tr>
                                                <th width="50%">Permanent Mobile No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_mobile_no'];?></td>
                                              </tr> -->
                                              <tr>
                                                <th width="50%">Live With</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Relation</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_relation'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Village</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_vill'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Police-station</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_ps'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Post-office</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_po'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With District</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_dist'];?></td>
                                              </tr>
                                              <!-- <tr>
                                                <th width="50%">Live With Mobile No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_mobile_no'];?></td>
                                              </tr> -->
                                              <tr>
                                                <th width="50%">Cast</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['cast'];?></td>
                                              </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table table-bordered">
                                              <tr>
                                                <th width="50%">Sub-cast</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['sub_cast'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Optional Subject 1</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['optional_subject1'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Optional Subject 2</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['optional_subject2'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Optional Subject 3</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['optional_subject3'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Additional Subject</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['additional_subject'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Name of centre</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['name_of_centre'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Roll No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_roll_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Code No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_code_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Registration No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_regd_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Year</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_year'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam School Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_school_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Board</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_board'];?></td>
                                              </tr>
                                            </table>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>