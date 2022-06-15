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
                        <!-- <small>Kindly provide the details for the new Subject</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="add_subject" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <div class="form-line">
                                            <select id="classAddSubject" name="class" class="form-control show-tick" onchange="getsectionSubject()" required>
                                                <option value="null">Select a class</option>
                                               <?php foreach($class as $item){
                                                echo '<option value="' . $item['class'] . '">' . $item['class'] . '</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <select name="section" id="sectionAddSubject" class="form-control show-tick" required>
                                        <option value="">Select a section</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="subject" class="form-control" required/>
                                            <label class="form-label">Subject</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onAddSubject" class="btn btn-block bg-pink waves-effect" type="submit">Add Subject</button>
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