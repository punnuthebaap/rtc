<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block bg-pink waves-effect" style="font-size:20px;" type="submit" onclick="window.open('add-student')">Add Student Master</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Student Master Table
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive body">
                                <table id="StudentTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Admission No.</th>
                                            <th>Name of Student</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Roll No.</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>View</th>
                                           <!--  <th>Admission Date</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="StudentTableBody">
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