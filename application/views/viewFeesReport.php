<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        <?php echo $title; ?>
                        <small>Select start date and end date</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form id="fees_report_form" method="POST">
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
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="onSelectDatesFeesReport" class="btn btn-block bg-pink waves-effect" type="submit">View Fees Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewFeeReport" style="display: none;" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                             Fee Payment Report
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive body">
                            <table id="feeReportTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <th>Date</th>
                                        <th>Admission No.</th>
                                        <th>Student Name</th>
                                        <th>Father's Name</th>
                                        <th>Mobile No.</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <!-- <th></th> -->
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody id="ClassTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>