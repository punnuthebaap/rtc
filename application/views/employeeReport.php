<style>
	.card-header{
		border-bottom: 3px solid rgba(0,0,0,.125);
	}
	.card-header:first-child {
  		border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
	}
	.profile_img{
	    width: 150px;
	    height: 150px;
	    object-fit: cover;
	    margin: 10px auto;
	    border: 10px solid #ccc;
	    border-radius: 50%;
	}
	.card-body{
		padding: 1.25rem;
	}
	.float_left{
		float: left !important;
	}
	.float_right{
		float: right !important;
	}
	.fontW700{
		font-weight: 700;
	}
	p{
		word-wrap: break-word;
	}
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- <div class="card">
                    <div class="header">
                        <h2>
                        <?php echo $title; ?>
                        </h2>
                    </div>
                </div> -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="col-sm-6" style="float:left;">
                		<div class="card" style="border-radius: 25px;min-height: 25px;">
		                    <div class="header" style="padding: 10px">
		                        <h2 style="text-align: center;font-size: 25px;font-weight: 500;">
		                        	EMPLOYEE DETAILS
		                        </h2>
		                    </div>
		                </div>
                	</div>
                </div>
            	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
						          <div class="card-header bg-transparent text-center">
							            <img id="employeeReportSTDPIC" class="profile_img" src="https://source.unsplash.com/600x300/?nophoto" alt="employee dp">
							            	<h3 id="employeeReportName">loading ...</h3>
						          </div>
						          <div class="card-body">
							          	<div class="row clearfix">
							          		<div class="col-sm-6 float_left">
								          		<p class="text-left fontW700">Designation :</p>
								          		<p class="text-left fontW700">Contact No  :</p>
								          		<!-- <p class="text-left fontW700">Aadhar No  :</p> -->
								          		<p class="text-left fontW700">Gender  :</p>
								          		<p class="text-left fontW700">Marital Status :</p>
								          		<p class="text-left fontW700">Birth Date :</p>
								          	</div>
								          	<div class="col-sm-6 float_right">
								          		<p class="text-right fontW700" id="employeeReportDes">loading ...</p>
								          		<p class="text-right fontW700" id="employeeReportContact">loading ...</p>
								          		<!-- <p class="text-right fontW700" id="employeeReportAad">A</p> -->
								          		<p class="text-right fontW700" id="employeeReportGender">loading ...</p>
								          		<p class="text-right fontW700" id="employeeReportMarry">loading ...</p>
								          		<p class="text-right fontW700" id="employeeReportDob">loading ...</p>
								          	</div>
						          	</div>
						          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
						          <div class="card-body">
						            <table class="table table-bordered">
						              <tr>
						                <th width="30%">Father's Name </th>
						                <td width="2%">:</td>
						                <td id="employeeReportFather">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Qualification </th>
						                <td width="2%">:</td>
						                <td id="employeeReportQualify">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Permanent Address </th>
						                <td width="2%">:</td>
						                <td id="employeeReportPerm">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Coresponding Address</th>
						                <td width="2%">:</td>
						                <td id="employeeReportCorres">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Experience</th>
						                <td width="2%">:</td>
						                <td id="employeeReportExp">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Join Date</th>
						                <td width="2%">:</td>
						                <td id="employeeReportJoin">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Tech Qualification</th>
						                <td width="2%">:</td>
						                <td id="employeeReportTech">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Left Status</th>
						                <td width="2%">:</td>
						                <td id="employeeReportLeft">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Date of leaving</th>
						                <td width="2%">:</td>
						                <td id="employeeReportTLeftDate">loading ...</td>
						              </tr>
						            </table>
					          </div>
            				</div>
            			</div>
            		</div>
            	</div>


            	<!-- address -->
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="col-sm-6" style="float:left;">
                		<div class="card" style="border-radius: 25px;min-height: 25px;">
		                    <div class="header" style="padding: 10px">
		                        <h2 style="text-align: center;font-size: 25px;font-weight: 500;">
		                        	BANK DETAILS
		                        </h2>
		                    </div>
		                </div>
                	</div>
                </div>
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
						          <div class="card-body">
						            <table class="table table-bordered">
						              <tr>
						                <th width="30%">Bank Name</th>
						                <td width="2%">:</td>
						                <td id="employeeReportBank">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Account Number</th>
						                <td width="2%">:</td>
						                <td id="employeeReportAccNo">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">IFSC Code</th>
						                <td width="2%">:</td>
						                <td id="employeeReportIfsc">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">ESI Number</th>
						                <td width="2%">:</td>
						                <td id="employeeReportEsi">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Provident Fund Number</th>
						                <td width="2%">:</td>
						                <td id="employeeReportPf">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">PAN Number</th>
						                <td width="2%">:</td>
						                <td id="employeeReportPan">loading ...</td>
						              </tr>
						              <tr>
						                <th width="30%">Aadhar Number</th>
						                <td width="2%">:</td>
						                <td id="employeeReportAad">loading ...</td>
						              </tr>
						            </table>
					          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
            					<div class="header">
			                        <h2>
			                        	Corresponding Address
			                        </h2>
			                    </div>
						          <div class="card-body">
						            <table class="table table-bordered">
						              <tr>
						                <th width="30%">Address</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresAdd">125</td>
						              </tr>
						              <tr>
						                <th width="30%">Landmark</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresLand">2020</td>
						              </tr>
						              <tr>
						                <th width="30%">State</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresState">2020</td>
						              </tr>
						              <tr>
						                <th width="30%">City</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresCity">Male</td>
						              </tr>
						              <tr>
						                <th width="30%">Pincode</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresPincode">Group</td>
						              </tr>
						              <tr>
						                <th width="30%">Approx Dist. from School</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresApprox">B+</td>
						              </tr>
						            </table>
					          </div>
            				</div>
            			</div>
            		</div>
            	</div> -->
            	<!-- end address -->

            	<!-- parent details -->
            	<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="col-sm-6" style="float:left;">
                		<div class="card" style="border-radius: 25px;min-height: 25px;">
		                    <div class="header" style="padding: 10px">
		                        <h2 style="text-align: center;font-size: 25px;font-weight: 500;">
		                        	PARENTS DETAILS
		                        </h2>
		                    </div>
		                </div>
                	</div>
                </div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
						          <div class="card-header bg-transparent text-center">
							            <img id="studentReportFPIC" class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="father dp">
							            	<h3 id="studentReportFName">Nihal Sharma</h3>
						          </div>
						          <div class="card-body">
							          	<div class="row clearfix">
							          		<div class="col-sm-6 float_left">
								          		<p class="text-left fontW700">Occupation  :</p>
								          		<p class="text-left fontW700">Company Name:</p>
								          		<p class="text-left fontW700">Department:</p>
								          		<p class="text-left fontW700">Ticket No :</p>
								          		<p class="text-left fontW700">Office-Address:</p>
								          		<p class="text-left fontW700">Contact No:</p>
								          		<p class="text-left fontW700">Email-Id</p>
								          	</div>
								          	<div class="col-sm-6 float_right">
								          		<p class="text-right fontW700" id="studentReportFOccupation">2019/10A/22</p>
								          		<p class="text-right fontW700" id="studentReportFComp">10</p>
								          		<p class="text-right fontW700" id="studentReportFDept">A</p>
								          		<p class="text-right fontW700" id="studentReportFTicket">8084048949</p>
								          		<p class="text-right fontW700" id="studentReportFOffice">nihalpunnu2129@gmail.com</p>
								          		<p class="text-right fontW700" id="studentReportFContact">A+</p>
								          		<p class="text-right fontW700" id="studentReportFEmail">A+</p>
								          	</div>
						          	</div>
						          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
						          <div class="card-header bg-transparent text-center">
							            <img id="studentReportMPIC" class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="mother dp">
							            	<h3 id="studentReportMName">Nihal Sharma</h3>
						          </div>
						          <div class="card-body">
							          	<div class="row clearfix">
							          		<div class="col-sm-6 float_left">
								          		<p class="text-left fontW700">Occupation  :</p>
								          		<p class="text-left fontW700">Company Name:</p>
								          		<p class="text-left fontW700">Department:</p>
								          		<p class="text-left fontW700">Ticket No :</p>
								          		<p class="text-left fontW700">Office-Address:</p>
								          		<p class="text-left fontW700">Contact No:</p>
								          		<p class="text-left fontW700">Email-Id</p>
								          	</div>
								          	<div class="col-sm-6 float_right">
								          		<p class="text-right fontW700" id="studentReportMOccupation">2019/10A/22</p>
								          		<p class="text-right fontW700" id="studentReportMComp">10</p>
								          		<p class="text-right fontW700" id="studentReportMDept">A</p>
								          		<p class="text-right fontW700" id="studentReportMTicket">8084048949</p>
								          		<p class="text-right fontW700" id="studentReportMOffice">nihalpunnu2129@gmail.com</p>
								          		<p class="text-right fontW700" id="studentReportMContact">A+</p>
								          		<p class="text-right fontW700" id="studentReportMEmail">A+</p>
								          	</div>
						          	</div>
						          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
						          <div class="card-header bg-transparent text-center">
							            <img id="studentReportGPIC" class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="guardian dp">
							            	<h3 id="studentReportGName">Nihal Sharma</h3>
						          </div>
						          <div class="card-body">
							          	<div class="row clearfix">
							          		<div class="col-sm-6 float_left">
								          		<p class="text-left fontW700">Occupation  :</p>
								          		<p class="text-left fontW700">Relationship with student</p>
								          		<p class="text-left fontW700">Address</p>
								          		<p class="text-left fontW700">Contact No:</p>
								          		<p class="text-left fontW700">Email-Id</p>
								          	</div>
								          	<div class="col-sm-6 float_right">
								          		<p class="text-right fontW700" id="studentReportGOccupation">2019/10A/22</p>
								          		<p class="text-right fontW700" id="studentReportGRelation">10</p>
								          		<p class="text-right fontW700" id="studentReportGAdd">A</p>
								          		<p class="text-right fontW700" id="studentReportGContact">A+</p>
								          		<p class="text-right fontW700" id="studentReportGEmail">A+</p>
								          	</div>
						          	</div>
						          </div>
            				</div>
            			</div>
            		</div>
            	</div> -->
            	<!-- end parent details -->

            </div>
        </div>
    </div>
</section>