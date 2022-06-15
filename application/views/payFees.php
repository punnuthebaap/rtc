<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
    .date-picker{
        border: none;
        font-size: 15px;
        width: 100%;
    }
    .table tbody tr td, .table tbody tr th{
        padding: 0px !important;
        padding-left: 8px !important;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix" id="mainPayFeesBody">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        <?php echo $title; ?>
                        <small>Select admission number</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form id="searchFee" method="POST">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="session" id="session_id" class="form-control show-tick" disabled>
                                                <option value="session_21_22" selected>Session 2022-23</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php if($authority!="student"){?>
                                         <div class="col-sm-3" id="payFeesAdmissionNo">
                                    <?php }else{?>
                                            <div class="col-sm-3" id="payFeesAdmissionNo" style="display:none">
                                    <?php }?>
                                <!-- <div class="col-sm-3" id="payFeesAdmissionNo"> -->
                                    <div class="form-group form-float">
                                            <label class="form-label">Admission No.</label>
                                        <div class="form-line">
                                            <input type="text" id="autoCompleteAdmis" name="autoCompleteAdmisData" class="form-control basicAutoSelect" list="admissionNoList" autocomplete="off" required/>
                                            <datalist id="admissionNoList">
                                                <?php foreach($admno as $item){
                                                    echo '<option value="' . $item['admisstion_no'] . '">' . $item['admisstion_no'] . '</option>';
                                                    }
                                                ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                            <label class="form-label">Select Fee Type</label>
                                        <div class="form-line">
                                            <select name="type" id="payFeeType" class="form-control show-tick" onchange="getfeetype()" required>
                                                <option value="">Please Select </option>
                                                <option value="monthly">monthly</option>
                                                <option value="yearly">yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 fromToPay" style="display:none;">
                                    <div class="form-group form-float">
                                            <label class="form-label">From </label>
                                        <div class="form-line">
                                            <select name="fromPayfee" id="fromPayfee" class="form-control show-tick" required disabled>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 fromToPay" style="display:none;">
                                    <div class="form-group form-float">
                                            <label class="form-label">To </label>
                                        <div class="form-line">
                                            <select name="toPayfee" id="toPayfee" class="form-control show-tick" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 fromToPay" style="display:none;">
                                <div class="form-group">
                                        <label class="form-label">From</label>
                                    <div class="form-line">
                                        <input name="fromPayfee" id="fromPayfee" class="date-picker" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 fromToPay" style="display:none;">
                                <div class="form-group">
                                        <label class="form-label">To</label>
                                    <div class="form-line">
                                        <input name="toPayfee" id="toPayfee" class="date-picker toPayfee" />
                                    </div>
                                </div>
                            </div> -->
                            <div class="row" >
                                <div class="col-sm-12">
                                    <div class="col-md-4">
                                        <button id="FeeButton" class="btn btn-block bg-pink waves-effect" onclick="fetchFee(event)" type="submit">See Fee Details</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewFeeMonthly" style="display: none;" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="margin-bottom:0px">
                    <div class="header">
                        <div class="row">
                            <div class="col-sm-9 text-left">
                                <h2>
                                    Fees Payment
                                </h2>
                            </div>
                            <div class="col-sm-3 text-right">
                                <a href="javascript:void(0)" onclick="back()">Back</a>
                               <!--  <button id="payFeesUpdate" class="btn btn-block bg-pink waves-effect" onclick="back()" type="submit">Back</button> -->
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive body" style="padding:5px !important;overflow: hidden;">
                        <table id="FeeMonthly" class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th>Fee Head</th>
                                    <th>Fee Due</th>
                                    <th>Fee Paid</th>
                                    <!-- <th>Transaction Id</th> -->
                                    <!-- <th>Mode Payment</th> -->
                                </tr>
                            </thead>
                            <tbody id="ClassTableBody">
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3><label class="form-label" id="labelFinalPayFeeAmt"></label></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewFeeDetails" style="display: none;" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                             Fee Details
                        </h2>
                    </div>
                    <div class="table-responsive body">
                        <table id="feeDetailTable" class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Fee Head</th>
                                    <th>Fee Due</th>
                                    <th>Fee Paid</th>
                                    <th>Transaction Id</th>
                                    <th>Mode Payment</th>
                                </tr>
                            </thead>
                            <tbody id="ClassTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewIfYearlyPaid" style="display:none" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row" style="margin-bottom:50px">
                            <div class="col-sm-3 text-left">
                                <a href="javascript:void(0)" onclick="back()">Back</a>
                            </div>
                        </div>
                        <h2>
                             Yearly fees for the session <strong id="yearlySessionName">2022-23</strong> has been paid .
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <button id="payFeesUpdate" class="btn btn-block bg-green waves-effect" >Click here to view Receipt</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewFeePayAmount" style="display: none;" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <!-- <div class="header">
                        <h2>
                             Enter Fee Details
                        </h2>
                    </div> -->
                    <div class="body">
                        <form id="fees_pay_form" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-4" style="margin-bottom:0px !important; display: none;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" id="feeAmtNumber" name="feeAmt" class="form-control" readonly required/>
                                            <label class="form-label">Total Payable Amount</label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-4" style="margin-bottom:0px !important">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="transacID" class="form-control" required/>
                                            <label class="form-label">Transaction ID</label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-4" style="margin-bottom:0px !important">
                                    <select name="modePay" class="form-control show-tick" required>
                                        <option value="">Select a Payment Mode</option>
                                        <option value="upi">UPI</option>
                                        <option value="paytm">paytm</option>
                                        <option value="phonePay">phonePay</option>
                                        <option value="googlePay">googlePay</option>
                                        <option value="debit_credit_card">Debit/Credit Cards</option>
                                        <!-- <option value="D">D</option> -->
                                    </select>
                                </div>
                                <div class="col-sm-4" style="margin-bottom:0px !important">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                                <input type="text" name="remarks" class="form-control" required></input>
                                                <label class="form-label">Write Remarks Here</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button id="payFeesOnline" class="btn btn-block bg-green waves-effect" onclick="feePayOnline(event)" type="submit">Pay Online (Razorpay)</button>
                                    </div>
                                    <div class="col-md-3 col-md-offset-6">
                                        <button id="payFeesUpdate" class="btn btn-block bg-pink waves-effect" onclick="feePay(event)" type="submit">Pay Fees</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>

            <!-- fee -->
        </div>
    </div>
</section>