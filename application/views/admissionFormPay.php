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
    <section class="content" style="margin:50px 50px 50px 50px;">
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
                        <div class="body" style="font-size:13px;margin-top:20px;">
                            <div class="row">
                                <div class="card" style="box-shadow: none;padding:25px">

                                        <!-- <div class="col-md-12">
                                            <h4 class="text-center">Payment gateway charges</h4>
                                            <table class="table table-bordered">
                                              <tr>
                                                <th width="50%">Indian Credit Cards, Indian Debit Cards, Net Banking from 58 Banks, UPI, Wallets including Freecharge, Mobikwik etc.</th>
                                                <td width="2%">:</td>
                                                <td>2% charges per transaction</td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Diners and Amex Cards, International Cards, EMI</th>
                                                <td width="2%">:</td>
                                                <td>3% charges per transaction</td>
                                              </tr>
                                            </table>
                                        </div> -->
                                      <div class="card-body text-center">
                                        <?php if($info['isFormPay']=="NO" && Is_null($info['application_no']) && Is_null($info['payment_id'])){?>
                                        <header><h2 class="fontT">Please pay Rs. 500 for <label>Admission Form Fee</label>.</h2></header>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-1 col-sm-offset-6">
                                                    <button class="btn btn-block bg-pink waves-effect" type="submit" onclick="payAdmForm()">Pay</button>
                                                </div>
                                            </div>
                                        </div>
                                            <?php }else{ ?>
                                              <div id="FormAdDown" class="col-sm-12">
                                                <h2 class="fontT" style="margin-bottom:30px">Thank You for the payment.</h2>
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
                                                </table>
                                              </div>
                                                <div class="col-sm-2 col-sm-offset-5">
                                                    <button class="btn btn-block bg-pink waves-effect" type="submit" onclick="downloadReceiptForm()">Download Receipt</button>
                                                </div>
                                            <?php } ?>
                                        <!-- <div class="col-md-4">
                                            <table class="table table-bordered">
                                              <tr>
                                                <th width="50%">Permanent Post-office</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_po'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent Police-station</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_ps'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent District</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_dist'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Permanent Mobile No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['permanent_mobile_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Relation</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_relation'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Village</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_vill'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Police-station</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_ps'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Post-office</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_po'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With District</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_dist'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Live With Mobile No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['live_with_mobile_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Cast</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['cast'];?></td>
                                              </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table table-bordered">
                                              <tr>
                                                <th width="50%">Sub-cast</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['sub_cast'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Optional Subject 1</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['optional_subject1'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Optional Subject 2</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['optional_subject2'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Optional Subject 3</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['optional_subject3'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Additional Subject</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['additional_subject'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Name of centre</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['name_of_centre'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Roll No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_roll_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Code No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_code_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Registration No.</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_regd_no'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Year</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_year'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam School Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_school_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Name</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_name'];?></td>
                                              </tr>
                                              <tr>
                                                <th width="50%">Exam Board</th>
                                                <td width="2%">:</td>
                                                <td><?php echo $info['exam_board'];?></td>
                                              </tr>
                                            </table>
                                        </div> -->
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
                var doc = new jsPDF('l', 'mm', [297, 210]); //210mm wide and 297mm high
                
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
              url  : "../Admission/getAdmissionDetails",
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
                                      url  : "../Admission/saveOnPaySuccess",
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
    