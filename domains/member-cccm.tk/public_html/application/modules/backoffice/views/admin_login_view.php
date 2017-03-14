<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Puttapisake.com/backoffice</title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- /datepicker -->
    <!-- Datatables -->
    <!--    <script src="--><?php //echo base_url() ?><!--assets/js/datatables/js/jquery.dataTables.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/js/datatables/tools/js/dataTables.tableTools.js') ?>"></script>
    <!-- /Datatables -->

    <!-- /footer content -->

    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/maps/jquery-jvectormap-2.0.1.css') ?>" />
    <link href="<?php echo base_url('assets/css/icheck/flat/green.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/floatexamples.css') ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('assets/js/nprogress.js') ?>"></script>
    <script>
        NProgress.start();
    </script>

    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style>
        a,span,div,li,
        h1,h2,h3,h4,h5,h6,
        button
        {
            font-family: 'Prompt', sans-serif !important;
        }
    </style>  
</head>

<body style="background:#F7F7F7;">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">

            <div id="login" class="animate form">
                <section class="login_content">
                    <div class="">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <form method="post" action="login/">
                        <h1>เข้าสู่ระบบ</h1>
                        <div>
                            <input type="text" class="form-control" id="admin_Username" name="admin_Username" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" id="admin_Password" name="admin_Password" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Log in</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div>
                                <h1><i class="fa fa-cogs"></i> Administrator</h1>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>

        </div>
    </div>

</body>

</html>