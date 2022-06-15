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
                        <!-- <small>You can edit exam type below :</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="edit_exam_type" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-4" style="display:none;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="exam_id" class="form-control" required/>
                                            <label class="form-label">Exam Id</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="exam_names" class="form-control" required/>
                                            <label class="form-label">Exam Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="exam_order" class="form-control" required/>
                                            <label class="form-label">Exam Order</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="classSubject" name="class" class="form-control show-tick" onchange="getsectionExamTypeEdit()" required>
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
                                    <select name="section" id="ExamTypeSectionE" class="form-control show-tick" required>
                                        <option value="">Select a section *</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onEditExamType" class="btn btn-block bg-pink waves-effect" type="submit">Save Exam Type</button>
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