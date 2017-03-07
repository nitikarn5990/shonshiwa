<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/fontend/ico/puttapisake_icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/fontend/ico/puttapisake_icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/fontend/ico/puttapisake_icon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/fontend/ico/puttapisake_icon.png">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/fontend/ico/puttapisake_icon.png">
    <title>Puttapisake.com</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/fontend/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/fontend/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->
    <script src="<?php echo base_url()?>assets/fontend/js/pace.min.js"></script>

</head>
<body>
<div class="container main-container headerOffset">

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <?php echo $this->session->flashdata('msg'); ?>
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-user"></i> สมัครสมาชิก </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> กรุณากรอกข้อมูลตามความเป็นจริง </h2>
                </div>
                <form method="post" id="" action="add_user/" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <label for="InputUserame"> ชื่อที่ใช้ในการล็อคอิน <sup>*</sup> </label>
                            <input required type="text" class="form-control" id="user_Username" name="user_Username" placeholder="Username">
                        </div>
                        <div class="form-group required">
                            <label for="InputName"> ชื่อ <sup>*</sup> </label>
                            <input required type="text" class="form-control" id="user_Name" name="user_Name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>เพศ </label>

                            <div class="row">
                                <div class="col-xs-4">
                                    <select class="form-control" id="user_Sex" name="user_Sex">
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail"> อีเมลล์ </label>
                            <input required type="email" class="form-control" id="user_Email" name="user_Email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="InputAddress"> ที่อยู่ปัจจุบัน </label>
                            <div>
                                <textarea required class="form-control" rows="3" name="user_Address" id="user_Address" placeholder="Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <label for="InputPassword"> รหัสผ่าน <sup> * </sup> </label>
                            <input required type="password" class="form-control" id="user_Password" name="user_Password" placeholder="Password">
                        </div>
                        <div class="form-group required">
                            <label for="InputLastname"> นามสกุล <sup>*</sup> </label>
                            <input required type="text" class="form-control" id="user_Lastname" name="user_Lastname" placeholder="Lastname">
                        </div>
                        <div class="form-group">
                            <label>วันเกิด</label>

                            <div class="row">
                                <div class="col-xs-4">
                                    <select class="form-control" id="days" name="days">
                                        <option>-</option>
                                        <?php
                                        for($n=1;$n<=31;$n++)
                                        {
                                        echo "<option value=\"" . $n . "\">" . $n . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select class="form-control" name="months" id="months">
                                        <option>-</option>
                                        <option value="1">มกราคม&nbsp;</option>
                                        <option value="2">กุมภาพันธ์&nbsp;</option>
                                        <option value="3">มีนาคม&nbsp;</option>
                                        <option value="4">เมษายน&nbsp;</option>
                                        <option value="5">พฤษภาคม&nbsp;</option>
                                        <option value="6">มิถุนายน&nbsp;</option>
                                        <option value="7">กรกฎาคม&nbsp;</option>
                                        <option value="8">สิงหาคม&nbsp;</option>
                                        <option value="9">กันยายน&nbsp;</option>
                                        <option value="10">ตุลาคม&nbsp;</option>
                                        <option value="11">พฤศจิกายน&nbsp;</option>
                                        <option value="12">ธันวาคม&nbsp;</option>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select class="form-control" name="years" id="years">
                                        <option>-</option>
                                        <?php
                                        for($n=1900;$n <= date('Y');$n++)
                                        {
                                            echo "<option value=\"" . $n . "\">" . $n . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="InputPhone"> เบอร์โทรศัพท์ <sup>*</sup> </label>
                            <input required type="text" class="form-control" id="user_Mobile" name="user_Mobile" placeholder="Telephone Number">
                        </div>
                        <div class="form-group required">
                            <label> รูปภาพ </label>
                            <div>
                                <input type="file" name="user_Picture" id="user_Picture" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; ยืนยันการสมัคร</button>
                    </div>
                </form>
                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="<?=site_url('fontend/Home/index')?>"> <i class="fa fa-home"></i> เข้าสู่หน้าหลัก </a></li>
                    </ul>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /main-container -->

<div class="gap"></div>
</body>