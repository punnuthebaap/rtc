<section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> -->
            <!-- Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <?php if($authority!="student"){?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block bg-pink waves-effect" style="font-size:20px;" type="submit" onclick="window.open('add-feeHead')">Add Fee Head</button>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Fee Head Table
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive body">
                                <table id="feeTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Fee Id</th>
                                            <th>Fee head</th>
                                            <th>Fee Type</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                           <!--  <th>Admission Date</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="FeeHeadTableBody">
                                        <!-- <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr> -->
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