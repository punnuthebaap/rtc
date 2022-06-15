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
                        <!-- <small>Kindly provide the details for the new Assignment</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="add_assignment" enctype="multipart/form-data" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="classSubject" name="class" class="form-control show-tick" onchange="getsection()" required>
                                                <option value="">Select a class</option>
                                               <?php foreach($class as $item){
                                                echo '<option value="' . $item['class'] . '">' . $item['class'] . '</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="section" id="sectionAddAssign" class="form-control show-tick" onchange="getsubject()" required>
                                                <option value="null">Select a section</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="subject" id="subjectAddAssign" class="form-control show-tick" required>
                                                <option value="null">Select a subject</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="teacher" class="form-control show-tick" required>
                                                <option value="">Select class teacher</option>
                                                <?php foreach($employee as $item){
                                                    echo '<option value="' . $item['employee_name'] . '">' . $item['employee_name'] . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="chapter" class="form-control" required/>
                                            <label class="form-label">Lesson / Chapter</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="assign_name" class="form-control" required/>
                                            <label class="form-label">Assignment Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                                <textarea rows="4" name="description" class="form-control no-resize" required></textarea>
                                                <label class="form-label">Assignment description</label>
                                            </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="subject" class="form-control" required/>
                                            <label class="form-label">Subject</label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-sm-8">
                                    <div class="form-group">
                                            <label class="form-label">Upload File</label>
                                        <div class="form-line">
                                            <input type="file" id="fileUploadAssign" name="fileUploadAssign" class="form-control" onchange ="uploadAssignmentFile(event)" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Submission Date</label>
                                        
                                        <input type="date" name="submit_date" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="display: none">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="assign_date" name="assign_date" class="form-control"  required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="display: none">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="fileUploadName" name="fileUploadName" class="form-control"  readonly required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onAddAssignment" class="btn btn-block bg-pink waves-effect" type="submit">Add Assignment</button>
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