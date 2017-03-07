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
<!-- รูปเลื่อนหัวข้อ -->
<div class="parallax-section parallax-fx about-3 parallaxOffset no-padding" style="background-image: url(<?php echo base_url()?>assets/fontend/images/show/portforio_show.jpg); ">
    <div class="w100 ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="parallax-content clearfix  wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0">
                        <h2 class="intro-heading ">ยินดีต้อนรับเข้าสู่ Puttapisake.com
                            <br>นี่คือแฟ้มผลงานของเรา
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.รูปเลื่อนหัวข้อ -->


<div class="container main-container ">

    <div class="row innerPage">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="about-content wow fadeIn" data-wow-duration=".8s" data-wow-delay="0">
                <p class="lead-2 text-center">
                    ท่านสามารถดูผลงานที่ทางเราได้ทำมาแล้วผ่านทางหน้านี้ ซึ่งมีข้อมูลข่าวสารของทางเราอัพเดทตลอดเวลา
                </p>
            </div>
            <?php foreach($data_portfolio as $key => $port){
                if($key%2==1) {
                    ?>
                    <!-- ภาพทางขวา -->
                    <div style="clear:both;">
                        <hr class="hr40">
                    </div>
                    <div class="row has-equal-height-child">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">
                            <div class="hw100 display-table">
                                <div class="hw100 display-table-cell">
                                    <div class="content-inner wow fadeInRight" data-wow-duration=".8s" data-wow-delay="0">
                                        <div class="about-content-text">
                                            <h3>
                                                <?= $port['portfolio_Title'] ?>
                                            </h3>
                                            <p>
                                                <?= $port['portfolio_Detail'] ?>
                                            </p>
                                            <h4>
                                                <?= $port['portfolio_Date'] ?>
                                            </h4>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">
                            <div class="content-inner wow fadeInLeft" data-wow-duration=".8s" data-wow-delay="0">
                                <img src="<?php echo base_url('assets/pic_portfolio/' . $port['portfolio_Picture']); ?>" class="img-responsive abt-img" alt="img">
                            </div>
                        </div>
                    </div>
                    <?php
                }else {
                    ?>
                    <!-- /.ภาพทางขวา -->

                    <!-- ภาพทางซ้าย -->
                    <div style="clear:both;">
                        <hr class="hr40">
                    </div>
                    <div class="row has-equal-height-child">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">
                            <div class="content-inner wow fadeInLeft" data-wow-duration=".8s" data-wow-delay="0">
                                <img src="<?php echo base_url('assets/pic_portfolio/' . $port['portfolio_Picture']); ?>"
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
                                                <?= $port['portfolio_Title'] ?>
                                            </h3>
                                            <p>
                                                <?= $port['portfolio_Detail'] ?>
                                            </p>
                                            <h4>
                                                <?= $port['portfolio_Date'] ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.ภาพทางซ้าย -->
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!--/.innerPage-->
    <div style="clear:both"></div>
</div>
<!-- Reveal Animations When You Scroll  -->
<script src="<?php echo base_url()?>assets/fontend/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>

</body>


