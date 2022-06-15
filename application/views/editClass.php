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
                        <!-- <small>You can change the class details</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="edit_class_master" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="class" class="form-control" min="1" required/>
                                            <label class="form-label">Class</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display:none;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="sl_no" class="form-control" readonly required/>
                                            <label class="form-label">SL_No.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="class_teacher" class="form-control show-tick" required>
                                                <option value="">Select class teacher</option>
                                                <?php foreach($employee as $item){
                                                    echo '<option value="' . $item['employee_name'] . '">' . $item['employee_name'] . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="class_roman" class="form-control" required />
                                            <label class="form-label">Class Roman</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="section" class="form-control" required />
                                            <label class="form-label">Enter Section</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onEditClass" class="btn btn-block bg-pink waves-effect" type="submit">Save Class</button>
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