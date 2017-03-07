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

<div class="container main-container ">

    <div class="row innerPage">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="about-content wow fadeIn" data-wow-duration=".8s" data-wow-delay="0">
                <p class="lead-2 text-center">
                    ท่านสามารถเลือกช่องทางการชำระเงินได้จากบัญชีต่อไปนี้
                </p>
            </div>
            <?php foreach($data_payment as $payment) {


                ?>
                <div style="clear:both;">
                    <hr class="hr40">
                </div>
                <div class="row has-equal-height-child">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">
                        <div class="content-inner wow fadeInLeft" data-wow-duration=".8s" data-wow-delay="0">
                            <img src="<?php echo base_url() ?>assets/pic_bank/<?=$payment['bank_Picture']?>" width="1"
                                 height="1"
                                 class="img-responsive abt-img" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">
                        <div class="hw100 display-table">
                            <div class="hw100 display-table-cell">
                                <div class="content-inner wow fadeInRight" data-wow-duration=".8s"
                                     data-wow-delay="0">
                                    <div class="about-content-text">
                                        <h3>
                                            <?=$payment['bank_Name']?>
                                        </h3>

                                        <p>
                                            ชื่อบัญชี </br></br>
                                            <?=$payment['bank_User']?>

                                        </p></br>
                                        <h4>
                                            เลขบัญชี </br></br>
                                            <?=$payment['bank_Number']?>

                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?
            }
            ?>

        </div>
    </div></br></br>
    <!--/.innerPage-->
    <div style="clear:both"></div>
</div>
<!-- Reveal Animations When You Scroll  -->
<script src="<?php echo base_url()?>assets/fontend/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>

</body>


