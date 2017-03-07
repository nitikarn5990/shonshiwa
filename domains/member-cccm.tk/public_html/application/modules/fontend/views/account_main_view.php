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

    <link href="<?php echo base_url()?>assets/fontend/css/ion.checkRadio.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/fontend/css/ion.checkRadio.cloudy.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontend/css/jquery.minimalect.min.css" media="screen"/>
<body>

<div class="container main-container headerOffset">

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div>
                <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-user"></i> ข้อมูลผู้ใช้ </span></h1>

                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/pic_user/'.$this->session->userdata('user_Picture'))?>" height="300" width="250"  alt="img">
                </div>
                <div class="col-md-6">
                    <h3> สวัสดีคุณ <?=$this->session->userdata('user_Name')?>&nbsp;&nbsp;<?=$this->session->userdata('user_Lastname');?></h3>
                </div>
                <hr>
            </div>
            <div class="row userInfo">
                <form method="post" id="" action="/" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <label for="InputName"> ชื่อ-นามสกุล </label>
                            <a>: <?=$this->session->userdata('user_Name')?>&nbsp;&nbsp;<?=$this->session->userdata('user_Lastname');?></a>
                        </div>
                        <div class="form-group required">
                            <label for="InputPhone"> วันเกิด </label>
                            <a>: <?=$this->session->userdata('user_Birthday')?></a>
                        </div>
                        <div class="form-group">
                            <label>เพศ </label>
                            <a>: <?=$this->session->userdata('user_Sex')?></a>
                        </div>
                        <div class="form-group required">
                            <label for="InputPhone"> เบอร์โทรศัพท์ </label>
                            <a>: <?=$this->session->userdata('user_Mobile')?></a>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail"> อีเมลล์ </label>
                            <a>: <?=$this->session->userdata('user_Email')?></a>
                        </div>
                        <div class="form-group">
                            <label for="InputAddress"> ที่อยู่ </label>
                            <a>: <?=$this->session->userdata('user_Address')?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
    <hr>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="fa fa-unlock-alt"></i> จัดการข้อมูลปผู้ใช้ </span></h1>
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12"></br>
                    <ul class="myAccountList row">
                        <li class="col-md-4">
                            <div class="thumbnail equalheight">
                                <a title="Personal information" href="<?=site_url('fontend/Home/account_profile')?>">
                                    <i class="fa fa-book"> </i> แก้ไขข้อมูลส่วนตัว
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4">
                            <div class="thumbnail equalheight">
                                <a title="Change Password" href="<?=site_url('fontend/Home/change_password')?>">
                                    <i class="fa fa-edit"></i>เปลี่ยนรหัสผ่าน
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4">
                            <div class="thumbnail equalheight">
                                <a title="Change Picture" href="<?=site_url('fontend/Home/account_picture')?>">
                                    <i class="fa fa-file-photo-o"></i> แก้ไขรูปภาพ
                                </a>
                            </div>
                        </li>
                    </ul>
                    <div class="clear clearfix"></div>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /wrapper -->
<div class="gap"></div>
</body>
</html>
