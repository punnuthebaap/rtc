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
                        <!-- <small>Kindly provide the details for the new class</small> -->
                        </h2>
                    </div>
                    <div class="body">
                        <form id="edit_holiday_form" method="POST">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Select Start Date</label>
                                    <div class="form-line">
                                        <input type="date" name="start_date" class="form-control" placeholder="Select Start Date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Select End Date</label>
                                    <div class="form-line">
                                        <input type="date" name="end_date" class="form-control" placeholder="Select End Date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="details" class="form-control" required />
                                        <label class="form-label">Holiday Details</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="total_days" class="form-control" required />
                                        <label class="form-label">Number of days</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" style="display:none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="id" class="form-control" readonly  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onEditHoliday" class="btn btn-block bg-pink waves-effect" type="submit">Save Holiday</button>
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