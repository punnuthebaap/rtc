
<style type="text/css">
    p{
        line-height: 1rem;
        letter-spacing: 1px;
    }
    label{
        line-height: ;
    }
    .pic_frame{
        height: 150px;
        width: 150px;
        border: 2px solid;
    }
    .transfer_text{
        display: inline-block;
        font-size: 2rem;
        font-weight: 800;
        position: relative;
        font-weight: 900;
        background: #1e1f23;
        padding: 15px;
        color: #fff;
        border: 4px double;
        border-radius: 15px;
        /*margin-top: 30px;*/
    }
    .label_head_text{
        font-size: 12px;
        color: #303233 ;
    }
    .ch_label_head_text{
        font-size: 25px;
        color: #303233 ;
    }
    .label_text{
        font-size: 16px;
        color: #303233 ;
        font-weight: 300;
    }
    .label_text_ch{
        font-size: 16px;
        color: #303233 ;
        font-weight: 300;
    }
    .under{
        /*width: 70%;*/
        border-bottom: 1px dashed;
        color: #16264c ;
        font-weight: 600;
    }
    .label_foot_text{
        font-size: 20px;
        color: #303233 ;
        /*font-weight: 900;*/
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
                        <small>Select admission number</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form id="generate_certificate" method="POST">
                            <div class="row clearfix">
                                <?php if($authority!="student"){?>
                                     <div class="col-sm-6" id="viewCertificateAdmissionNo">
                                <?php }else{?>
                                        <div class="col-sm-6" id="viewCertificateAdmissionNo" style="display:none">
                                <?php }?>
                                <!-- <div class="col-sm-6" id="viewCertificateAdmissionNo"> -->
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="autoCompleteAdmis" name="autoCompleteAdmisData" class="form-control basicAutoSelect" list="admissionNoList" autocomplete="off" required/>
                                            <datalist id="admissionNoList">
                                                <?php foreach($admno as $item){
                                                    echo '<option value="' . $item['admisstion_no'] . '">' . $item['admisstion_no'] . '</option>';
                                                    }
                                                ?>
                                            </datalist>
                                            <label class="form-label">Enter and choose admission number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="type" id="certificate_type" class="form-control show-tick" required>
                                                <option value="">Select Certificate type</option>
                                                <!-- <option value="admission">Admission Form</option> -->
                                                <option value="character">Character Certificate</option>
                                                <option value="transfer">Transfer Certificate</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="generate" class="btn btn-block bg-pink waves-effect" type="submit">Generate Certificate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="transferCertificate" class="content" style="display:none">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body" style="max-height: 290mm !important;">
                        <div id="toDownload" class="col-sm-12" style="background: #ffffff;
                                                     /*border-bottom: 15px solid #1E1F23;*/
                                                     /*border-top: 15px solid #1E1F23;*/
                                                     /*margin-top: 30px;*/
                                                     /*margin-bottom: 30px;*/
                                                     /*border: 5px groove;*/
                                                     padding: 10px 5px !important;
                                                     position: relative;
                                                     box-shadow: 0 1px 21px #808080;
                                                     font-size: 10px">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4 text-right">
                                        <img class="logo" style="height:80px;margin-top: 10px" src="<?php echo base_url();?>assets/images/rtc_logo.jpg">
                                    </div>
                                    <div class="col-sm-6 text-left" style="margin-bottom: 0px;">
                                        <h1 style="color: #303233;">R. T. C. High School</h1>
                                        <p style="font-size:1.3rem; font-weight: 500; color: #303233;">PHED (KH. TOLA) BUTI, RANCHI - 834009</p>
                                        <p style="font-size:1.3rem; font-weight: 500; color: #303233;">Affiliated to C. B. S. E, New Delhi</p>
                                        <p style="font-size:1.3rem; font-weight: 500; color: #303233;">Affliation No. 3430140 ,School No. :66339</p>
                                        <p class="transfer_text">TRANSFER CERTIFICATE</p>
                                    </div>
                                    <div class="col-sm-1 text-left">
                                        <!-- <div class="pic_frame"></div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right">
                                        <label class="label_head_text">Book No.</label>
                                        <label class="label_head_text" style="color: #16264c ;">231</label>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <label class="label_head_text">SL No.</label>
                                        <label class="label_head_text" style="color: #16264c ;">2301</label>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <label class="label_head_text">Admission No.</label>
                                        <label id="admisstion_no" class="label_head_text" style="color: #16264c ;">231/0909/0</label>
                                    </div>
                                    <div class="col-sm-3 text-left">
                                        <label class="label_head_text">Board's Roll No.</label>
                                        <label id="roll_no" class="label_head_text" style="color: #16264c ;">231</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">1.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Name of Pupil :&nbsp;</label>
                                            <label id="name_of_student" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">2.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">(a.)</label>
                                            <label class="label_text">Mother's Name :&nbsp;</label>
                                            <label id="mother_name" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px"></div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">(b.)</label>
                                            <label class="label_text">Father's/Guardian Name :&nbsp;</label>
                                            <label id="father_name" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">3.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Nationality :&nbsp;</label>
                                            <label id="nationality" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">4.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Whether the candidate belong to Schedule Caste or Schedule Tribe :&nbsp;</label>
                                            <label id="std_cast" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">5.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Date of the first admission in the School :&nbsp;</label>
                                            <label id="addmition_date" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">6.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Date of birth (in Christian Era) according to Admission Register:(in figures)&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label id="dob" class="label_text under"></label>
                                            <label class="label_text">(in words) :&nbsp;</label>
                                            <label id="dob_word" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">7.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Class in which the pupil last studied:(in figures)&nbsp;</label>
                                            <label id="class_in_which_left" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">(in words):&nbsp;</label>
                                            <label id="class_in_which_left_word" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">8.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">School/Board annual examination last taken with result:&nbsp;</label>
                                            <label id="result" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">9.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Whether failed, if so once/twice in the same class:&nbsp;</label>
                                            <label id="failed" class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">10.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Subjects Studied:&nbsp;</label>
                                            <label class="label_text">1.&nbsp;</label>
                                            <label id="subject1" class="label_text under">&nbsp;</label>

                                            <label class="label_text">2.&nbsp;</label>
                                            <label id="subject2" class="label_text under">&nbsp;</label>

                                            <label class="label_text">3.&nbsp;</label>
                                            <label id="subject3" class="label_text under">&nbsp;</label>
                                            <br>
                                            <label class="label_text">4.&nbsp;</label>
                                            <label id="subject4" class="label_text under">&nbsp;</label>

                                            <label class="label_text">5.&nbsp;</label>
                                            <label id="subject5" class="label_text under">&nbsp;</label>

                                            <label class="label_text">6.&nbsp;</label>
                                            <label id="subject6" class="label_text under">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">11.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label id="qualified" class="label_text">Whether qualified for promotion to the higher class :&nbsp;</label>
                                            <label class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">If so, to which class(in figures):&nbsp;</label>
                                            <label id="qualified_class" class="label_text under">&nbsp;&nbsp;</label>

                                            <label id="qualified_class_word" class="label_text">(in words):&nbsp;</label>
                                            <label class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">12.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Month upto which the (pupil has paid) school dues paid:&nbsp;</label>
                                            <label id="month_paid" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">13.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Any fee concession availed of : if so , the nature of such concession :&nbsp;</label>
                                            <label class="label_text under"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">14.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Total No. of working days:&nbsp;</label>
                                            <label id="working_days" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">15.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Total No. of working days present :&nbsp;</label>
                                            <label id="total_workin_days" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">16.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Whether NCC cadet/Boy Scout/Girl Guide (details may given) :&nbsp;</label>
                                            <label id="ncc" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">17.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Games played or extra curricular activities in which the pupil usually took part :&nbsp;</label>
                                            <label id="games" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">18.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">General conduct :&nbsp;</label>
                                            <label id="conduct" class="label_text under">Good&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">19.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Date of application for certificate :&nbsp;</label>
                                            <label id="date_of_issue_certificate" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">20.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Date of issue for certificate :&nbsp;</label>
                                            <label id="date_of_issue_of_left_cert" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">21.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Reasons for leaving the school :&nbsp;</label>
                                            <label id="reason_for_leaving_school" class="label_text under">&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:0px;margin-left: 50px;">
                                        <div class="col-sm-1" style="margin-bottom:1px">
                                            <label class="label_text">22.</label>
                                        </div>
                                        <div class="col-sm-11 text-left" style="margin-bottom:1px">
                                            <label class="label_text">Any other remarks :&nbsp;</label>
                                            <label id="left_remarks" class="label_text under">No remarks&nbsp;&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end" style="margin-top:65px;">
                                    <div class="col-sm-4" style="margin-bottom:0px !important"></div>
                                    <div class="col-sm-4 text-left" style="margin-bottom:0px !important">
                                        <label class="label_foot_text">Checked By</label>
                                    </div>
                                    <div class="col-sm-4 text-left" style="margin-bottom:0px !important">
                                        <label class="label_foot_text">Principal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-block bg-pink waves-effect" onclick="transferDownload()" type="submit">Download Certificate</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Print Receipt</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="characterCertificate" class="content" style="display:none;">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body" style="max-height: 290mm !important;">
                        <div id="toDownloadcharacter" class="col-sm-12" style="background: #ffffff;
                                                     /*border-bottom: 15px solid #1E1F23;*/
                                                     /*border-top: 15px solid #1E1F23;*/
                                                     /*margin-top: 30px;*/
                                                     /*margin-bottom: 30px;*/
                                                     border: 5px groove;
                                                     padding: 20px 10px !important;
                                                     position: relative;
                                                     box-shadow: 0 1px 21px #808080;
                                                     font-size: 10px">
                            <div class="col-sm-12">
                                <div class="row" style="margin-bottom:20px;margin-top: 20px;">
                                    <div class="col-sm-4 text-right">
                                        <img class="logo" style="height:90px;margin-top: 12px" src="<?php echo base_url();?>assets/images/rtc_logo.jpg">
                                    </div>
                                    <div class="col-sm-6 text-left" style="margin-bottom: 0px;">
                                        <h1 style="color: #303233;">R. T. C. High School</h1>

                                        <p style="font-size:1.3rem; font-weight: 500; color: #303233;">PHED (KH. TOLA) BUTI, RANCHI - 834009</p>
                                        <p style="font-size:1.3rem; font-weight: 500; color: #303233;">Affiliated to C. B. S. E, New Delhi</p>
                                        <p style="font-size:1.3rem; font-weight: 500; color: #303233;">Affliation No. 3430140 ,School No. :66339</p>
                                        <p class="transfer_text" style="margin-top:30px;">CHARACTER CERTIFICATE</p>
                                    </div>
                                    <div class="col-sm-1 text-left">
                                        <!-- <div class="pic_frame"></div> -->
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:60px; margin-left: 20px;">
                                    <div class="col-sm-3 text-left">
                                        <label class="label_head_text">No.</label>
                                        <label class="label_head_text" style="color: #16264c ;">231</label>
                                    </div>
                                    <div class="col-sm-9 text-center">
                                        <!-- <label class="ch_label_head_text">CHARACTER CERTIFICATE</label> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row col-sm-12" style=" margin-left: 30px;">
                                            <label class="label_text_ch">This is to certify that Master/Miss &nbsp;</label>
                                            <label id="ch_name_of_student" class="label_text_ch under" style="width:53%"></label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch under" style="width:88%"></label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch">Son/Daughter of Sri &nbsp;</label>
                                            <label id="ch_father_name" class="label_text_ch under" style="width:66%"></label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch">was/is a bonafide student of this school. His/Her work and conduct is/was</label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch under" style="width:87%">Good</label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch">He/She has Passed Class</label>
                                            <label id="ch_class_in_which_left" class="label_text_ch under" style="width:62%"></label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch">C. B. S. E. Examination in the year</label>
                                            <label id="ch_school_left_date" class="label_text_ch under" style="width:54%"></label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:20px; margin-left: 35px;">
                                            <label class="label_text_ch">To the best of my knowledge he / she bears a good moral character. I wish him / her <br>every success in life.</label>
                                    </div>
                                    <div class="row col-sm-12" style="margin-top:15%; margin-left: 20px;">
                                        <div class="col-sm-12" style="margin-bottom:15%;">
                                            <label class="label_text_ch" style="font-weight:700;">Date of issue : &nbsp;</label>
                                            <label id="ch_date_of_issue_certificate" class="label_text_ch under"></label>
                                        </div>
                                        <div class="col-sm-8 text-left">
                                            <label class="label_text_ch" style="font-weight:700;margin-bottom:10%;">Dealing clerk : &nbsp;</label>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            <label class="label_text_ch" style="font-weight:700;margin-bottom:10%;">Principal :</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-block bg-pink waves-effect" onclick="chDownload()" type="submit">Download Certificate</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-block bg-pink waves-effect" onclick="chPrint()" type="submit">Print Receipt</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>