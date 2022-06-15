<section class="content">
        <div class="container-fluid">
            <?php if($authority!="student"){?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block bg-pink waves-effect" style="font-size:20px;" type="submit" onclick="window.open('addHoliday')">Add Holiday Master</button>
                        </div>
                    </div>
                </div>
                 <?php }?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Holiday Master Table
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive body">
                                <table id="holidayTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Details</th>
                                            <th>No. of days</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
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
            <!-- #END# Exportable Table -->
        </div>
    </section>