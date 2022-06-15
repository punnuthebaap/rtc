<style type="text/css">
    .modal-dialog{
        width: 100%;
    }
    .table tbody tr td, .table tbody tr th{
        padding: 2px !important;
    }
    td{
        font-size: 12px;
        white-space: nowrap;
    }
</style>
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
                        <form id="mark_entry_form" method="POST">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="classMarkEntry" name="class" class="form-control show-tick" required>
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
                                        <select name="section" id="sectionMarkEntry" class="form-control show-tick" required>
                                            <option value="">Select a section </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="exam_type" id="examTypeMarkEntry" class="form-control show-tick" required>
                                            <option value="">Select Exam Type </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <button id="onAddHoliday" class="btn btn-block bg-pink waves-effect" type="submit">Add Holiday</button>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="viewMarkEntryTable" style="display: none;" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                             Enter Marks
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive body">
                            <table id="markEntryTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody id="ClassTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <button type="button" id="clickModal" class="btn btn-primary" data-toggle="modal" data-target="#marksEntryModal" style="display: none;">
      Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="marksEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn btn-primary text-center" onclick="insertMarks()">Save changes</button>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetMarks()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="viewMarkEntryTable" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right:0px;padding-left: 0px;">
                <div class="card">
                    <div class="header">
                        <h2>
                             Enter Marks
                        </h2>
                    </div>
                    <div class="body" style="padding:5px !important">
                        <div class="table-responsive body">
                            <table id="markEntryTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <!-- <th>Admission No.</th>
                                        <th>Student Name</th> -->
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
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
</section>
<script>
</script>