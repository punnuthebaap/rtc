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
    <style type="text/css">
        .login-page{
            background-image: url('<?php echo base_url(); ?>assets/images/rtc_login.jpg');object-fit: cover;
        }
        .login-box{
            margin-top: -40px;
        }
        .login-page .login-box .msg {
            color: red;
            background:yellow;
            font-size: 20px;
            font-weight: 500;
            border-radius: 10px;
            border: 2px solid red;
        }
        @media only screen and (min-width: 900px) {
            .login-box .logo{
                width: 203%;margin-left: -48%;
            } 
            .login-page .login-box .logo a{

                font-size: 30px;
            }
        }
        @media only screen and (min-width: 300px) {
            .login-box{
                margin-top: 0px;
            }
        }
        @media only screen and (min-width: 800px) {
            .login-box{
                margin-top: -20%;
            }
        }
        @media only screen and (max-width: 400px) {
            .login-box .card{
                box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2); 
              border-radius: 5px;
              background-color: rgba(255, 255, 255, .05);
              
              /*backdrop-filter: blur(1px);*/
            }
            .login-page .login-box .logo a{

                font-size: 20px;
            }
        }

        .login-box .card{
            box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2); 
          border-radius: 5px;
          background-color: rgba(255, 255, 255, .05);
          
          /*backdrop-filter: blur(1px);*/
        }
        .input-group .input-group-addon .material-icons{
            color: white;
        }
         .input-group.form-line{
            border-radius: 10px;
         }
         .input-group.form-line input{
            border-radius: 10px;
         }
    </style>
</head>

<body class="login-page">
    <div>
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);" style="color: #f00;font-weight: 700;">Ram Tahal Choudhary High School(CBSE), Ranchi</a>
                <!-- <small>Management System</small> -->
            </div>
                <a href="javascript:void(0)">
                  <img class="img-responsive" style="margin-left: 30%;" src="<?php echo base_url(); ?>assets/images/logo_login.png" alt="..." height="36">
                </a>
            <div class="card loginPage">
                <div class="body">
                    <form id="sign_in" method="POST">
                        <!-- <div class="msg">Log in to start your session</div> -->
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus autocomplete="off">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">import_contacts</i>
                            </span>
                            <div class="form-line">
                                <select name="section" id="sectionAddSubject" class="form-control show-tick" required>
                                    <option value="">Select a section</option>
                                    <option value="session_21_22" selected>Session 2022-23</option>
                                    <!-- <option value="D">D</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <!-- <a href="sign-up.html">Register Now!</a> -->
                            </div>
                            <div class="col-xs-6 align-right">
                                <a id="forgotPassword" href="javascript:void(0)" style="color: #FEF100;">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <button id="onLogin" class="btn btn-block bg-pink waves-effect" value="login" type="submit">LOG IN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card forgotPassPage" style="display:none;">
                <div class="body">
                    <form id="forgot_pass" method="POST">
                        <div class="msg" id="userFoundMsg" style="display: none;">User not found</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" id="sendUsername" class="form-control" name="login_id" placeholder="Username" required autofocus autocomplete="off">
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <!-- <a href="sign-up.html">Register Now!</a> -->
                            </div>
                            <div class="col-xs-6 align-right">
                                <a id="logInPage" href="javascript:void(0)" style="color: #FEF100;">LOG IN !</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <button id="onSendMail" class="btn btn-block bg-pink waves-effect" value="sendMail" type="submit">Send Mail</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <script>
      $(document).ready(function(){
        $('#onLogin').on('click',function(){
          if($('#sign_in').valid()){
          $.ajax({
              type : "POST",
              url  : "<?php echo base_url(); ?>login-check",
              // contentType: "application/json",
              dataType : "JSON",
              data : $('#sign_in').serialize(),
              success: function(data){
                // console.log(data)
                if(data.error===false){
                  session_set(data);
                }
                else{
                  Swal.fire({
                    icon: 'error',
                    text: 'Invalid login credentials',
                    title: 'Login',swaltoast: false, allowOutsideClick: false, allowEscapeKey: false,

                  });
                }
              }
            });
            return false;
          }
        });
      });
    </script>
    <script type="text/javascript">
        var password="";var to="";
      function session_set(data){
        // console.table(data.data)
          sessionStorage.setItem('loginCredentials',JSON.stringify(data.data));
          sessionStorage.setItem('base_url',JSON.stringify(data.base_url));
          $(location).attr("href","<?php echo base_url(); ?>dashboard");
        }
    $('#forgotPassword').click(function(){
        Swal.close();
        $('.loginPage').css("display","none");
        $('.forgotPassPage').css("display","block");
    });
    $('#logInPage').click(function(){
        Swal.close();
        $('.forgotPassPage').css("display","none");
        $('.loginPage').css("display","block");
    });
    $('#sendUsername').keyup(function(){
        if($('#sendUsername').val()!="")
        {
            $.ajax({
              type : "POST",
              url  : "Home/getUserDetails",
              dataType : "JSON",
              data : {login_id:document.getElementById('sendUsername').value},
              success: function(data){
                console.log(data)
                if(data.error===false){
                  const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      // timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'success',
                      title: 'User Found'
                    })
                  password=data.data[0].password;
                  to=data.data[0].email;
                }
                if(data.error===true){
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      // timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'error',
                      title: 'User Not Found'
                    })
                }
              }
            });
            return false;
            }
            else
            {
               const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      // timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'error',
                      title: 'Enter any username to continue'
                    })
            }
    });
    $('#onSendMail').click(function(){
        Swal.fire({didOpen: () => { Swal.showLoading() },
                                        swaltoast: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false});
        if($('#sendUsername').val()!=""){
             $.ajax({
              type : "POST",
              url  : "Home/sendMail",
              dataType : "JSON",
              data : {login_id:document.getElementById('sendUsername').value,password:password,to:to,subject:'Forgot Password'},
              success: function(data){
                if(data.error===false)
                {
                    $('.forgotPassPage').css("display","none");
                    $('.loginPage').css("display","block");
                     const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'success',
                      title: 'Email sent successfully'
                    });
                    document.getElementById('sendUsername').value="";
                }
                if(data.error===true)
                {
                    $('.forgotPassPage').css("display","none");
                    $('.loginPage').css("display","block");
                     const Toast = Swal.mixin({
                      toast: true,
                      position: 'top',
                      showConfirmButton: false,
                      // timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'error',
                      title: data.text
                    });
                    document.getElementById('sendUsername').value="";
                }
              }});
             return false;
        }
    })
    </script>
</body>

</html>