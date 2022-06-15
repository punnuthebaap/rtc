<style type="text/css">
    .table tbody tr td{
        padding: 1px;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        <?php echo $title; ?>
                        <!-- <small>Select start date and end date</small> -->
                        </h2>
                    </div>
                            <div class="body" style="max-height: 290mm !important;">
                                <div id="toDownload" class="col-sm-10" style="background: #ffffff;
                                                             /*border-bottom: 15px solid #1E1F23;*/
                                                             border-top: 15px solid #1E1F23;
                                                             /*margin-top: 30px;*/
                                                             /*margin-bottom: 30px;*/
                                                             padding: 40px 30px !important;
                                                             position: relative;
                                                             box-shadow: 0 1px 21px #808080;
                                                             font-size: 10px">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 text-left">
                                                <img class="logo" style="height:200px;width: 300px;" src="<?php echo base_url();?>assets/images/rtc_logo.jpg">
                                            </div>
                                            <div class="col-sm-8 text-right">
                                                <h4 style="color: #F81D2D;font-size: 25px;"><strong>RTC High School, CBSE Ranchi</strong></h4>
                                                <p style="font-size:12px;">P.H.E.D, Near Buti More, Buti, Ranchi- 834009</p>
                                                <p class="ReceiptDate" style="font-size:15px"></p>
                                                <p id="StuName" style="font-size:15px;"></p>
                                                <p id="StuAdmno" style="font-size:15px;"></p>
                                                <!-- <p id="StuEmail"></p> -->
                                            </div>
                                        </div> <br />
                                        <div class="row">
                                            <div class="col-sm-12 text-center" style="margin: 0px;padding: 0px;">
                                                <h2>Fee Receipt No.</h2>
                                                <h3 class="ReceiptNo"></h3>
                                            </div>
                                        </div> <br />
                                        <div>
                                            <table class="table">
                                                <thead style="background: #1E1F23;color: #fff">
                                                    <tr>
                                                        <th>
                                                            <h5>Fee Head</h5>
                                                        </th>
                                                        <th class="text-right">
                                                            <h5>Amount</h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ReceiptDetails">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <div class="col-sm-12 text-left" style="font-size: 18px;">
                                                <!-- <p class="ReceiptDate"><b>Date :</b></p> <br /> -->
                                                <!-- <p><b>Signature</b></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button id="downloadFormReceipt" class="btn btn-block bg-pink waves-effect" type="submit">Download Receipt</button>
                        </div>
                        <div class="col-md-6">
                            <button id="printFormReceipt" class="btn btn-block bg-pink waves-effect" type="submit">Print Receipt</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>