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
		                        	STUDENT DETAILS
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
							            <img id="studentReportSTDPIC" class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
							            	<h3 id="studentReportName">loading...</h3>
						          </div>
						          <div class="card-body">
							          	<div class="row clearfix">
							          		<div class="col-sm-6 float_left">
								          		<p class="text-left fontW700">Admission No.  :</p>
								          		<p class="text-left fontW700">Class  :</p>
								          		<p class="text-left fontW700">Section  :</p>
								          		<p class="text-left fontW700">Contact No  :</p>
								          		<p class="text-left fontW700">Email-Id  :</p>
								          		<p class="text-left fontW700">Blood Group :</p>
								          	</div>
								          	<div class="col-sm-6 float_right">
								          		<p class="text-right fontW700" id="studentReportAdmno">loading...</p>
								          		<p class="text-right fontW700" id="studentReportClass">loading...</p>
								          		<p class="text-right fontW700" id="studentReportSection">loading...</p>
								          		<p class="text-right fontW700" id="studentReportContact">loading...</p>
								          		<p class="text-right fontW700" id="studentReportEmail">loading...</p>
								          		<p class="text-right fontW700" id="studentReportBlood">loading...</p>
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
						                <th width="30%">Admission Date </th>
						                <td width="2%">:</td>
						                <td id="studentReportAdmDate">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Age </th>
						                <td width="2%">:</td>
						                <td id="studentReportAge">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Date of birth </th>
						                <td width="2%">:</td>
						                <td id="studentReportDob">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Gender</th>
						                <td width="2%">:</td>
						                <td id="studentReportSex">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Religion</th>
						                <td width="2%">:</td>
						                <td id="studentReportReligion">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">House</th>
						                <td width="2%">:</td>
						                <td id="studentReportHouse">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Address</th>
						                <td width="2%">:</td>
						                <td id="studentReportAddress">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Student Cast</th>
						                <td width="2%">:</td>
						                <td id="studentReportStdCast">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Identification Mark</th>
						                <td width="2%">:</td>
						                <td id="studentReportIdenMark">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Aadhar Card No.</th>
						                <td width="2%">:</td>
						                <td id="studentReportUidNo">loading...</td>
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
		                        	ADDRESS DETAILS
		                        </h2>
		                    </div>
		                </div>
                	</div>
                </div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            		<div class="container-fluid">
            			<div class="row">
            				<div class="card">
            					<div class="header">
			                        <h2>
			                        	Residential Address
			                        </h2>
			                    </div>
						          <div class="card-body">
						            <table class="table table-bordered">
						              <tr>
						                <th width="30%">Address</th>
						                <td width="2%">:</td>
						                <td id="studentReportResiAdd">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Landmark</th>
						                <td width="2%">:</td>
						                <td id="studentReportResiLand">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">State</th>
						                <td width="2%">:</td>
						                <td id="studentReportResiState">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">City</th>
						                <td width="2%">:</td>
						                <td id="studentReportResiCity">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Pincode</th>
						                <td width="2%">:</td>
						                <td id="studentReportResiPincode">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Approx Dist. from School</th>
						                <td width="2%">:</td>
						                <td id="studentReportResiApprox">loading...</td>
						              </tr>
						            </table>
					          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
						                <td id="studentReportCorresAdd">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Landmark</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresLand">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">State</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresState">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">City</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresCity">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Pincode</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresPincode">loading...</td>
						              </tr>
						              <tr>
						                <th width="30%">Approx Dist. from School</th>
						                <td width="2%">:</td>
						                <td id="studentReportCorresApprox">loading...</td>
						              </tr>
						            </table>
					          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<!-- end address -->

            	<!-- parent details -->
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
							            	<h3 id="studentReportFName">loading...</h3>
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
								          		<p class="text-right fontW700" id="studentReportFOccupation">loading...</p>
								          		<p class="text-right fontW700" id="studentReportFComp">loading...</p>
								          		<p class="text-right fontW700" id="studentReportFDept">loading...</p>
								          		<p class="text-right fontW700" id="studentReportFTicket">loading...</p>
								          		<p class="text-right fontW700" id="studentReportFOffice">loading...</p>
								          		<p class="text-right fontW700" id="studentReportFContact">loading...</p>
								          		<p class="text-right fontW700" id="studentReportFEmail">loading...</p>
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
							            	<h3 id="studentReportMName">loading...</h3>
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
								          		<p class="text-right fontW700" id="studentReportMOccupation">loading...</p>
								          		<p class="text-right fontW700" id="studentReportMComp">loading...</p>
								          		<p class="text-right fontW700" id="studentReportMDept">loading...</p>
								          		<p class="text-right fontW700" id="studentReportMTicket">loading...</p>
								          		<p class="text-right fontW700" id="studentReportMOffice">loading...</p>
								          		<p class="text-right fontW700" id="studentReportMContact">loading...</p>
								          		<p class="text-right fontW700" id="studentReportMEmail">loading...</p>
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
							            	<h3 id="studentReportGName">loading...</h3>
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
								          		<p class="text-right fontW700" id="studentReportGOccupation">loading...</p>
								          		<p class="text-right fontW700" id="studentReportGRelation">loading...</p>
								          		<p class="text-right fontW700" id="studentReportGAdd">loading...</p>
								          		<p class="text-right fontW700" id="studentReportGContact">loading...</p>
								          		<p class="text-right fontW700" id="studentReportGEmail">loading...</p>
								          	</div>
						          	</div>
						          </div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<!-- end parent details -->

            </div>
        </div>
    </div>
</section>