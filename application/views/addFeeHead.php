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
                        <!-- <small>Kindly provide the details for the new fee head</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="add_fee_head" method="POST">
                            <div class="row clearfix">
                                <!-- <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="fee_id" class="form-control" required/>
                                            <label class="form-label">Fee Id</label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="fee_head1" class="form-control" required/>
                                            <label class="form-label">Fee Head</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <select name="fee_type" class="form-control show-tick" required>
                                        <option value="">Select a fee type</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onAddFeeHead" class="btn btn-block bg-pink waves-effect" type="submit">Add Fee Head</button>
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