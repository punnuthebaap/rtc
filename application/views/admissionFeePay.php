  <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title; ?> | RTC School</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <link href="<?php echo base_url() ?>assets/css/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var baseUrl ='<?php echo base_url();?>';
    </script> 
    <style type="text/css">
        .table-bordered tbody tr td, .table-bordered tbody tr th{
            padding: 5px;
            border: 1px solid #c5baba;
        }
        .fontT{
            font-weight: 300;
        }
       /* .tagTop{
            font-size: 25px;
        }*/
    </style>
</head>
  <body>
    <section class="content" style="margin:10px 50px 50px 50px;">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="min-height: 380px;">
                        <div class="header">
                            <div class="col-md-9" style="margin-bottom: 10px">
                                <h2  style="margin-bottom: 10px">
                                    <?php echo $title;?>
                                </h2>
                                <!-- <?php if($info['isFormPay']=="NO"){?>
                                    <span class='label bg-red text-right' >Payment not made</span>
                                <?php }else{ ?>
                                    <span class='label bg-green' >Payment done</span>
                                <?php } ?> -->
                            </div>
                            <?php if($info['isFormPay']=="YES"){?>
                            <div class="col-md-3 text-right">
                                <a href="javascript:void(0)" onclick="backToIndex()">Back to website</a>
                            </div>
                        <?php }?>
                        </div>
                        <div class="body" style="font-size:13px;">
                            <div class="row">
                                <div class="card" style="box-shadow: none;padding:25px">
                                        <div class="col-md-12">
                                          <?php if($info['isAdmissionPay']=="YES" && !Is_null($info['admission_payment_id'])){?>
                                          <div class="col-md-12" style="margin-bottom:5px !important">
                                            <div class="col-md-8" style="margin-bottom:5px !important">
                                            <h2 class="fontT" style="margin-bottom:30px">Thank You for the payment.</h2>
                                          </div>
                                            <div class="col-sm-4" style="margin-bottom:5px !important">
                                                 <button class="btn btn-block bg-pink waves-effect" type="submit" onclick="downloadReceiptForm()">Download Receipt</button>
                                              </div>
                                          </div>
                                          <?php }?>
                                          <div id="FormAdDown" class="col-sm-8 col-sm-offset-2">
                                            
                                            <h4 class="text-center">Fee Structure</h4>
                                            <table class="table table-bordered">
                                              <tr>
                                                <th width="50%">Admission Fee</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 3500/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Annual Charges</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 3000/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">School Dev. Fund</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 50/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Refundable Security</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 2000/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Pupil Fund</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 1500/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Building Fund</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 2000/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Tuition Fee (Per Month)</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 1350/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Smart Class (Per Month)</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 50/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Computer Fee (Per Month)</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 100/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Lab. Fee (Per Month)</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 100/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Fee</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 800/-</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Total Amount</th>
                                                <td width="2%">:</td>
                                                <td>Rs. 16,400/-</td>
                                              </tr>
                                              <?php if($info['isAdmissionPay']=="YES" && !Is_null($info['admission_payment_id'])){?>
                                              <tr>
                                                <th width="50%">Your application No.</th>
                                                <td width="2%">:</td>
                                                <td style="font-size:18px;"><label class="label bg-green tagTop"><?php echo $info['application_no'];?></label></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Your transaction Id</th>
                                                <td width="2%">:</td>
                                                <td style="font-size:18px;"><label class="label bg-green tagTop"><?php echo $info['payment_id'];?></label></td>
                                              </tr>
                                              <?php }?>
                                            </table>
                                          </div>
                                        </div>
                                      <div class="card-body text-center">
                                        <?php if($info['isAdmissionPay']=="NO" && Is_null($info['admission_payment_id'])){?>
                                        <header><h2 class="fontT">Please pay Rs. 16,900 for <label>Admission Form Fee</label>.</h2></header>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-1 col-sm-offset-6">
                                                    <button class="btn btn-block bg-pink waves-effect" type="submit" onclick="payAdmForm()">Pay</button>
                                                </div>
                                            <?php }else{ ?>
                                                <!-- <h2 class="fontT" style="margin-bottom:30px">Thank You for the payment.</h2>
                                                <table class="table table-bordered col-sm-offset-3" style="width:50%;">
                                                  <tr>
                                                    <th width="50%">Your application No.</th>
                                                    <td width="2%">:</td>
                                                    <td style="font-size:18px;"><label class="label bg-green tagTop"><?php echo $info['application_no'];?></label></td>
                                                  </tr>
                                                  <tr>
                                                    <th width="50%">Your transaction Id</th>
                                                    <td width="2%">:</td>
                                                    <td style="font-size:18px;"><label class="label bg-green tagTop"><?php echo $info['payment_id'];?></label></td>
                                                  </tr>
                                                </table> -->
                                                
                                            <?php } ?>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>
  <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>assets/js/jquery_1_11_0.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/examples/sign-in.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jspdf.debug.js"></script>
    <script src="<?php echo base_url() ?>assets/js/html2canvas.js"></script>
    <script type="text/javascript">
      function downloadReceiptForm(){
        html2canvas(document.getElementById("FormAdDown"), {
            onrendered: function(canvas) {

                var imgData = canvas.toDataURL('image/png');
                console.log('Report Image URL: '+imgData);
                var doc = new jsPDF('p', 'mm', [297, 210]); //210mm wide and 297mm high
                
                doc.addImage(imgData, 'PNG', 1, 1);
                doc.save('receipt.pdf');
            }
        });
      }
        function backToIndex(){
            $(location).attr("href", 'http://www.rtccbseranchi.org/');
            // $.(location).attr("href","http://www.rtccbseranchi.org/");
        }
        function payAdmForm(){
            $.ajax({
              type : "GET",
              url  : "../Admission/getAdmissionFeeDetails",
              dataType : "JSON",
              // data : $('#add_employee').serialize(),
              success: function(data){
                // console.table(data)
                    if(data.error===false){
                        payforForm(data.data);
                    }
                }
            });
        }
        function payforForm(data){    
            const amt=1;
            var options = {
                    // "key": "rzp_test_JFnIEEcI1X1q0w",//test-key,
                    "async":false,
                    "crossDomain": true,
                    "key":"rzp_live_SJ1M6FsyojXYA2",//live-key
                    "key_secret":"cL8yLuKJAYY6XTMdhDXwwVYg",//secret-key
                    "amount": (100*amt), // 2000 paise = INR 20
                    "name": "RTC School (CBSE), Ranchi",
                    "currency":"INR",
                    "description": "Admission Form Payment",
                    "image": baseUrl+"assets/images/logo_login.png",
                    "theme": {
                    "color": "#528FF0"
                    },
                    "prefill": {
                       "email": "<?php echo $info['email']?>",
                       "contact": '<?php echo $info['mobile_no']?>',
                    },"handler": function (res){
                        console.log(res)
                        if(res.razorpay_payment_id){
                            Swal.fire({
                              title: 'Payment Successful',
                              text: 'Please wait , you are being redirected ',
                              timer: 5000,
                              icon: 'success',
                              timerProgressBar: true,
                              allowOutsideClick: false,
                              allowEscapeKey: false,showCancelButton: false,showConfirmButton: false,
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                                $.ajax({
                                      type : "POST",
                                      url  : "../Admission/saveOnFeeSuccess",
                                      dataType : "JSON",
                                      data:{payment_id:res.razorpay_payment_id},
                                      // data : $('#add_employee').serialize(),
                                      success: function(data){
                                        console.table(data)
                                            if(data.error===false){
                                                location.reload();
                                            }
                                        }
                                });
                            });
                        }
                        else
                        {
                            Swal.fire({
                                    // timer: 5000,
                                    icon: 'error',
                                    text: 'Payment Failed',
                                    title: 'Please try again after sometime !',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false
                            });
                        }
                    },
            };
            console.log(options);
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    </script>
    