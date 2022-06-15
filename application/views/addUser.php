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
                        <!-- <small>Kindly provide the details for the new user</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <label style="font-size:15px;font-weight: 100;color: #f44336;margin-bottom:20px">Please enter admission number of the respective student if you are selecting <strong>AUTHORITY</strong> type<strong>  STUDENT</strong></label>
                        <form id="add_user_master" method="POST" autocomplete="off">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="authority" id="login_authority" class="form-control show-tick" onchange="AuthorityStudent()" required>
                                                <option value="">Select Authority</option>
                                                <option value="admin">Admin</option>
                                                <option value="teacher">Teacher</option>
                                                <option value="parent">Parent</option>
                                                <option value="student">Student</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="login_id_username" name="login_id" class="form-control" autocomplete="off" onblur="getUserInfo()" required/>
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="login_id_name" name="name" class="form-control" autocomplete="off" required/>
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control" autocomplete="off" required/>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" autocomplete="off" required />
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="confirm_password" class="form-control" autocomplete="off" required />
                                            <label class="form-label">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <select name="process" class="form-control show-tick" required>
                                        <option value="">Process Type</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="utility" class="form-control show-tick" required>
                                        <option value="">utility Type</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="leave1" class="form-control show-tick" required>
                                        <option value="">leave Type</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="reports" class="form-control show-tick" required>
                                        <option value="">reports Type</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onAddUser" class="btn btn-block bg-pink waves-effect" type="submit">Add User</button>
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
</script>