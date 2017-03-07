<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <!-- styles needed by footable  -->
    <link href="<?php echo base_url()?>assets/fontend/css/footable-0.1.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>assets/fontend/css/footable.sortable-0.1.css" rel="stylesheet" type="text/css"/>


    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->


    <script>
        paceOptions = {
            elements: true
        };
    </script>

    <script src="<?php echo base_url()?>assets/fontend/js/pace.min.js"></script>
</head>
<body>

<div class="container main-container headerOffset">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> ใบสั่งซื้อสินค้า </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> ข้อมูลใบสั่งซื้อ </h2>
                </div>

                <div class="statusContent">

                    <?php
                    foreach($data_report as $report){


                    ?>
                    <div class="col-sm-12">
                        <div class=" statusTop">
                            <p><strong>สถานะใบสั่งซื้อสินค้า : </strong>
                                <?php
                                if ($report['product_report_Status'] == 1)
                                {
                                    echo "กรุณาโอนเงิน";
                                }
                                elseif ($report['product_report_Status'] == 2)
                                {
                                    echo "รอการตรวจสอบการโอนเงิน";
                                }
                                elseif ($report['product_report_Status'] == 3)
                                {
                                    echo "รอการจัดเตรียมสินค้า";
                                }
                                elseif ($report['product_report_Status'] == 4)
                                {
                                    echo "รอการจัดส่งสินค้า";
                                }
                                elseif ($report['product_report_Status'] == 5)
                                {
                                    echo "ส่งสินค้าเรียบร้อยแล้ว";
                                }
                                else
                                {
                                    echo "ยกเลิกรายการ";
                                }
                                ?>
                            </p>

                            <p><strong>วันที่ทำการสั่งซื้อ : </strong><?=$report['product_report_FirstDateTime']?></p>

                            <p><strong>เลขที่ใบสั่งซื้อ : </strong> <?=$report['product_report_ID']?> </p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="order-box">
                            <div class="order-box-header">
                                ผู้สั่ง
                            </div>

                            <div class="order-box-content">
                                <div class="address">
                                    <p><strong>จาก </strong></p>

                                    <p><strong>คุณ <?php echo $this->session->userdata('user_Name')."&nbsp"."&nbsp".$this->session->userdata('user_Lastname'); ?> </strong></p>

                                    <div class="adr">
                                        <?php echo $this->session->userdata('user_Address'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="order-box">
                            <div class="order-box-header">
                                ผู้รับ
                            </div>

                            <div class="order-box-content">

                                <?php
                                foreach($data_report as $report) {

                                    ?>
                                    <div class="address">
                                        <p><strong>ถึง </strong></p>

                                        <p><strong>คุณ <?=$report['product_report_Name']; ?>  </strong></p>

                                        <div class="adr">
                                            <?=$report['product_report_Address']; ?>
                                        </div>
                                    </div>
                                    <?
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div style="clear: both"></div>

                    <div class="col-sm-12 clearfix">
                        <div class="order-box">
                            <div class="order-box-header">
                                รายการสั่งซื้อ
                            </div>


                            <div class="order-box-content">
                                <div class="table-responsive">
                                    <table class="order-details-cart">
                                        <tbody>
                                        <?php
                                        foreach($data_order as $order) {


                                            ?>
                                            <tr class="cartProduct">
                                                <td class="cartProductThumb" style="width:20%">
                                                    <div>
                                                        <img alt="img"
                                                             src="<?php echo base_url('assets/Photo_Product/' . $order['product_order_Picture']); ?>">
                                                    </div>
                                                </td>
                                                <td style="width:40%">
                                                    <div class="miniCartDescription">
                                                        <h4> <?= $order['product_order_Name'] ?></h4>

                                                        <div class="price">
                                                            <span> <?= $order['product_order_Size'] . " " . $order['product_order_Meansurement'] ?> </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="width:10%"><a>
                                                        จำนวน <?= $order['product_order_Unit'] ?> ชิ้น</a></td>
                                                <td class="" style="width:15%">
                                                    <span> <?= $order['product_order_Price']*$order['product_order_Unit'] . " " . "บาท" ?> </span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        foreach($data_report as $price) {


                                            ?>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td colspan="2" style="width:20%">ราคา</td>
                                                <td class="" style="width:30%"><span> <?=$price['product_report_Allprice']?> บาท </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td colspan="2" style="width:20%">ส่วนลด</td>
                                                <td class="" style="width:30%"><span> <?= (($price['product_report_Discountprice']*100)/$price['product_report_Allprice'])?>% </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td colspan="2" style="width:20%">ค่าจัดส่ง</td>
                                                <td class="success" style="width:30%"><span> Free </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td style="width:30%"></td>
                                                <td class="" style="width:20%">ราคารวม</td>
                                                <td class="" style="width:30%"><span class="price"> <?=$price['product_report_Discountprice']?> บาท</span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="<?=site_url('fontend/Home/account_order_list')?>"> <i class="fa fa-home"></i> ไปยังรายการ การสั่งซื้อ </a></li>
                        <li class="next pull-left"><a href="<?=site_url('fontend/Home/account_order_list')?>"> ไปยังประวัติการสั่งซื้อ</a></li>
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

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script src="<?php echo base_url()?>assets/fontend/bootstrap/js/bootstrap.min.js"></script>
<!-- include footable plugin -->
<script src="<?php echo base_url()?>assets/fontend/js/footable.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/fontend/js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
</script>


<!-- include  parallax plugin -->
<script type="text/javascript" src="<?php echo base_url()?>assets/fontend/js/jquery.parallax-1.1.js"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" src="<?php echo base_url()?>assets/fontend/js/helper-plugins/jquery.mousewheel.min.js"></script>

<!-- include mCustomScrollbar plugin //Custom Scrollbar  -->

<script type="text/javascript" src="<?php echo base_url()?>assets/fontend/js/jquery.mCustomScrollbar.js"></script>

<!-- include icheck plugin // customized checkboxes and radio buttons   -->
<script type="text/javascript" src="<?php echo base_url()?>assets/fontend/plugins/icheck-1.x/icheck.min.js"></script>

<!-- include grid.js // for equal Div height  -->
<script src="<?php echo base_url()?>assets/fontend/js/grids.js"></script>

<!-- include carousel slider plugin  -->
<script src="<?php echo base_url()?>assets/fontend/js/owl.carousel.min.js"></script>

<!-- jQuery select2 // custom select   -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- include touchspin.js // touch friendly input spinner component   -->
<script src="<?php echo base_url()?>assets/fontend/js/bootstrap.touchspin.js"></script>

<!-- include custom script for site  -->
<script src="<?php echo base_url()?>assets/fontend/js/script.js"></script>

</body>
</html>
