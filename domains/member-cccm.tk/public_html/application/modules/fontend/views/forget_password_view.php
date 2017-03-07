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
            <h1 class="section-title-inner"><span> <i class="fa fa-unlock-alt"> </i> ลืมรหัสผ่าน? </span></h1>

            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <p> กรุณาระบุอีเมลล์ของทาง ทางเว็บไซต์จะส่งรหัสผ่านของท่านไปทางอีเมลล์ </p>

                    <form role="form" method="post" action="send_password_to_mail/">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Email address </label>
                            <input type="email" class="form-control" id="user_Email" name="user_Email" placeholder="Enter email"><?=$msgAlert?>
                        </div>
                        <button type="submit" class="btn   btn-primary"><i class="fa fa-unlock"> </i> Retrieve Password
                        </button>
                    </form>
                    <div class="clear clearfix">
                        <ul class="pager">
                            <li class="previous pull-right"><a href="account-1.html"> &larr; Back to Login </a></li>
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