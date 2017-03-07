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
    <script>
        function edit_profile(user_ID)
        {
            var send = {"user_ID": user_ID};
            $.ajax
            ({
                url: "<?php echo base_url()?>fontend/home/edit_profile",
                method: "POST",
                data: send,
                dataType: "json",
                success: function(data)
                {
                    if(data)
                    {
                        console.log(data);
                        $("#modal-sizes-3").modal('show');
                        $.each(data, function(key, value)
                        {
                            $("#user_ID").val(user_ID);
                            $("#user_Username").val(value.user_Username);
                            $("#user_Name").val(value.user_Name);
                            $("#user_Lastname").val(value.user_Lastname);
                            $("#user_Email").val(value.user_Email);
                            $("#user_Mobile").val(value.user_Mobile);
                            $("#user_Address").val(value.user_Address);
                            $("#user_Birthday").val(value.user_Birthday);
                            $("#user_Sex option[value='" + value.user_Sex + "']").attr("selected", true);
                        });
                    }
                }
            });
        }

    </script>
</head>
<body>
<!-- แก้ไขข้อมูลผู้ใช้ -->
<div class="modal signUpContent fade" id="EditMem" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <form method="post" id="" action="edit_user/" enctype="multipart/form-data">
                <input type="hidden" id="user_ID" name="user_ID">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="InputUserame"> ชื่อที่ใช้ในการล็อคอิน </label>
                        <input required="required" type="text" class="form-control" id="user_Username" name="user_Username" placeholder="Username" readonly>
                    </div>
                    <div class="form-group required">
                        <label for="InputName"> ชื่อ </label>
                        <input required="required" type="text" class="form-control" id="user_Name" name="user_Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>เพศ </label>
                        <div class="row">
                            <div class="col-md-6">
                                <select id="user_Sex" name="user_Sex" required="required" class="form-control">
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail"> อีเมลล์ </label>
                        <input required="required" type="email" class="form-control" id="user_Email" name="user_Email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="InputAddress"> ที่อยู่ปัจจุบัน </label>
                        <div>
                            <textarea required="required" class="form-control" rows="3" name="user_Address" id="user_Address" placeholder="Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required">
                        </br>&nbsp;</br>&nbsp;
                    </div>
                    <div class="form-group required">
                        <label for="InputLastname"> นามสกุล </label>
                        <input required="required" type="text" class="form-control" id="user_Lastname" name="user_Lastname" placeholder="Lastname">
                    </div>
                    <div class="form-group required">
                        <label>วันเกิด</label>
                        <input  type="date" class="date form-control col-md-7 col-xs-12" id="user_Birthday" name="user_Birthday">
                    </div></br>&nbsp;
                    <div class="form-group required">
                        <label for="InputPhone"> เบอร์โทรศัพท์ </label>
                        <input required="required" type="text" class="form-control" id="user_Mobile" name="user_Mobile" placeholder="Telephone Number">
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; บันทึกข้อมูล</button></br>&nbsp;
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container main-container headerOffset">
    <div class="row">
        <?php echo $this->session->flashdata('msg'); ?>

        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-user"></i> แก้ไขข้อมูลส่วนตัว </span></h1>

            <div class="row userInfo">
                <form method="post" id="" action="/" enctype="multipart/form-data">
                    <?php foreach($data_profile as $profile) {?>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <label for="InputUserame"> Username </label>
                            <label for="InputUserame"> : <?= $profile['user_Username']; ?> </label>
                        </div>
                        <div class="form-group">
                            <label>เพศ </label>
                            <label for="InputUserame"> : <?= $profile['user_Sex'] ?>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail"> อีเมลล์ </label>
                            <label for="InputUserame"> : <?= $profile['user_Email']; ?> </label>
                        </div>
                        <div class="form-group">
                            <label for="InputAddress"> ที่อยู่ปัจจุบัน </label>
                            <label for="InputUserame"> : <?= $profile['user_Address']; ?> </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <label for="InputName"> ชื่อ </label>
                            <label for="InputUserame"> : <?= $profile['user_Name']." ". $profile['user_Lastname']; ?> </label>
                        </div>
                        <div class="form-group required">
                            <label for="InputPhone"> วันเกิด </label>
                            <label for="InputUserame"> : <?= $profile['user_Birthday'] ;?> </label>
                        </div>
                        <div class="form-group required">
                            <label for="InputPhone"> เบอร์โทรศัพท์ </label>
                            <label for="InputUserame"> : <?= $profile['user_Mobile']; ?> </label>
                        </div>
                    </div>
                </form>
                <div class="col-lg-12">
                    <a href="#" onclick="edit_profile('<?php echo $profile['user_ID'] ?>')"
                       class="btn btn-primary " data-toggle="modal" data-target="#EditMem">
                        <i class="fa fa-cogs"></i> &nbsp; แก้ไขข้อมูลส่วนตัว &nbsp;
                    </a>
                </div>
                <?
                }
                ?>
                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="<?=site_url('fontend/Home/index')?>"> <i class="fa fa-home"></i> เข้าสู่หน้าหลัก </a></li>
                        <li class="next pull-left"><a href="<?=site_url('fontend/Home/account_main')?>"> &larr; กลับไปยังบัญชีของฉัน</a></li>

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