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
                        <!-- <small>Kindly provide the details for the new exam master </small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="edit_exam_master" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-6" style="display:none;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="id" class="form-control" readonly  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="classExamMasterE" name="class" class="form-control show-tick" onchange="getSectionExamMasterE()" required>
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
                                            <select name="section" id="ExamMasterSectionE" class="form-control show-tick" onchange="getSubE()" required>
                                                <option value="">Select a section *</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="subject" id="subjectExamMasE" class="form-control show-tick" onchange="getExamTypeE()" required>
                                                <option value="">Select a subject *</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="exam_type" id="examTypeE" class="form-control show-tick" required>
                                                <option value="">Select a Exam Type *</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="theory_F_marks" class="form-control" required/>
                                            <label class="form-label">Theory Full Marks</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="theory_P_marks" class="form-control" required/>
                                            <label class="form-label">Theory Pass Marks</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="practical_F_marks" class="form-control"/>
                                            <label class="form-label">Practical Full Marks</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="practical_P_marks" class="form-control"/>
                                            <label class="form-label">Practical Pass Marks</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onEditExamMaster" class="btn btn-block bg-pink waves-effect" type="submit">Save Exam Master</button>
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