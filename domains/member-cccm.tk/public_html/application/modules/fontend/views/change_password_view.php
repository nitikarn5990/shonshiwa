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
        <?php echo $this->session->flashdata('msg'); ?>

        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span> <i class="fa fa-unlock-alt"> </i> เปลี่ยนรหัสผ่าน </span></h1>

            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <form role="form" method="post" action="check_old_password">
                        <div class="form-group">
                            <label for="OldPass"> รหัสผ่านเก่า </label>
                            <input type="password" class="form-control" id="OldPass" name="OldPass" placeholder="กรุณาใส่รหัสผ่านเก่า" required="required">
                        </div>
                        <div class="form-group">
                            <label for="NewPass"> รหัสผ่านใหม่ </label>
                            <input type="password" class="form-control" id="NewPass" name="NewPass" placeholder="กรุณาใส่รหัสผ่านใหม่" required="required">
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPass"> ยืนยันรหัสผ่าน </label>
                            <input type="password" class="form-control" id="ConfirmPass" name="ConfirmPass" placeholder="กรุณาใส่ยืนยันรหัสผ่าน" required="required">
                        </div>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalChangePass">
                            <i class="fa fa-unlock"> ยืนยันการเปลี่ยนรหัสผ่าน</i>
                        </a>
                        <!-- จอยืนยัน -->
                        <div class="modal signUpContent fade" id="ModalChangePass" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                                        <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
                                    </div>

                                    <div class="modal-body">
                                        <h4><center>คุณแน่ใจที่จะยืนยันการเปลี่ยนรหัสผ่านหรือไม่</center></h4>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.จอยืนยัน -->
                    </form>
                    <div class="clear clearfix">
                        <ul class="pager">
                            <li class="previous pull-right"><a href="<?=site_url('fontend/Home/index')?>"> <i class="fa fa-home"></i> กลับสู่หน้าหลัก </a></li>

                            <li class="next pull-left"><a href="<?=site_url('fontend/Home/account_main')?>"> &larr; กลับไปยังบัญชีของฉัน</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
</body>