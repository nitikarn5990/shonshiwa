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
<!-- จอเข้าสู่ระบบ -->
<div class="modal signUpContent fade" id="ModalCheckLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <form method="post" action="login2">
                <div class="modal-body">
                    <h6><center><font color="red"> **คุณยังไม่ได้ทำการเข้าสู่ระบบ กรุณาเข้าสู่ระบบ </font></center></h6>
                    <div class="form-group login-username">
                        <div>
                            <input name="user_Username" id="user_Username" class="form-control input" size="20" placeholder="กรุณากรอกชื่อผู้เข้าใช้" type="text">
                        </div>
                    </div>
                    <div class="form-group login-password">
                        <div>
                            <input name="user_Password" id="user_Password" class="form-control input" size="20" placeholder="กรุณากรอกรหัสผ่าน" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox login-remember">
                                <label>
                                    <input name="rememberme" value="forever" checked="checked" type="checkbox"> จดจำไว้ในระบบ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input name="submit" class="btn  btn-block btn-lg btn-primary" value="เข้าสู่ระบบ" type="submit">
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <a href="<?=site_url('fontend/Home/register')?>"> ฉันต้องการสมัครสมาชิก </a>
                <br>
                <a href="<?=site_url('fontend/Home/forget_password')?>"> ฉันลืมรหัสผ่าน? </a></p>
            </div>
        </div>
    </div>
</div>

<!-- /.จอเข้าสู่ระบบ -->
<?php if($this->cart->total() == null){
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
}
else {
    ?>
    <div class="container main-container headerOffset">

        <!-- หัวข้อ -->
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
                <h1 class="section-title-inner"><span><i
                            class="glyphicon glyphicon-shopping-cart"></i> ตะกร้าสินค้า </span></h1>
            </div>
        </div>

        <!-- เนื้อหา -->
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row userInfo">
                    <div class="col-xs-12 col-sm-12">

                        <div class="col-xs-12 col-sm-12">
                            <div class="cartContent w100">
                                <table class="cartTable table-responsive" style="width:100%">
                                    <tbody>
                                    <tr class="CartProduct cartTableHeader">
                                        <td style="width:15%">
                                            <center>สินค้า</center>
                                        </td>
                                        <td style="width:40%">
                                            <center>ข้อมูลสินค้า</center>
                                        </td>
                                        <td style="width:10%" class="delete">&nbsp;</td>
                                        <td style="width:10%">
                                            <center>จำนวน</center>
                                        </td>
                                        <td style="width:10%">
                                            <center>คำนวน</center>
                                        </td>
                                        <td style="width:15%">
                                            <center>ราคา</center>
                                        </td>
                                    </tr>
                                    <?php if ($cart = $this->cart->contents()) {
                                        foreach ($cart as $item) { ?>
                                            <form method="post" id="" action="up_cart/">
                                                <input type="hidden" id="rowid" name="rowid"
                                                       value="<?= $item['rowid']; ?>">
                                                <tr class="CartProduct">
                                                    <td class="CartProductThumb">
                                                        <div>
                                                            <img
                                                                src="<?php echo base_url('assets/Photo_Product/' . $item['product_Picture_1']); ?> "
                                                                width="80" height="100" alt="img">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="CartDescription">
                                                            <h4><?= $item['name']; ?></a></h4>
                                                            <span
                                                                class="size"> <?= $item['product_sap_Size'] . " " . $item['meansurement']; ?></span>

                                                            <div class="price"><span> <?= $item['price']; ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="delete">
                                                        <a title="Delete"
                                                           href="<?= site_url('fontend/Home/del_cart_order/' . $item['rowid']) ?>">
                                                            <i class="glyphicon glyphicon-trash fa-2x" href=""></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <input class="quanitySniper" type="text" id="number"
                                                               value="<?= $item['qty']; ?>" name="number"
                                                               OnKeyPress="return NumOnly(this)">
                                                    </td>
                                                    <td>
                                                        <input class="btn btn-primary" type="submit" name="update"
                                                               value="คำนวณใหม่">
                                                    </td>
                                                    <td class="price"><?= $item['subtotal']; ?> </td>
                                                </tr>
                                            </form>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--cartContent-->

                        </div>
                        <div class="cartFooter w100">
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a class="btn btn-default" href="<?= site_url('fontend/Home/product_category') ?>">
                                        <i class="fa fa-arrow-left"></i>&nbsp; กลับไปเลือกสินค้าต่อ
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <?php
                                    if ($this->session->userdata('_login') == true) {
                                        ?>
                                        <a href="<?= site_url('fontend/Home/product_order_address') ?>"
                                           class="btn btn-primary btn-small ">
                                            ไปยังขั้นตอนต่อไป &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-primary btn-small " data-toggle="modal"
                                           data-target="#ModalCheckLogin">
                                            ไปยังขั้นตอนต่อไป &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
                <div class="contentBox">
                    <div class="w100 costDetails">
                        <div class="table-block" id="order-detail-content">
                            <div class="w100 cartMiniTable">
                                <table id="cart-summary" class="std table">
                                    <tbody>
                                    <tr>
                                        <td>จำนวนสินค้า</td>
                                        <td><?php
                                            if ($cart = $this->cart->contents()) {
                                                echo count($cart);
                                            }
                                            ?> รายการ
                                        </td>
                                    </tr>
                                    <tr style="">
                                        <td>ราคา</td>
                                        <td><span class="price"><?= $this->cart->total(); ?></span> บาท</td>
                                    </tr>
                                    <tr style="">
                                        <td>ส่วนลด</td>
                                        <td class="price">
                                        <span class="success">
                                            <?php


                                            foreach ($percen as $per) {
                                                if ($this->cart->total() >= $per['promotion_Condition']) {

                                                    echo $per['promotion_Discount'] . "%";

                                                    break;
                                                }

                                            }

                                            ?>
                                        </span>
                                        </td>
                                    </tr>
                                    <tr style="">
                                        <td>ค่าจัดส่งสินค้า</td>
                                        <td class="price"><span class="success">Free</span></td>
                                    </tr>
                                    <tr>
                                        <td> ราคารวม</td>
                                        <td class=" site-color"><span id="total-price"><?= $price_totol; ?></span> บาท
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--/rightSidebar-->

        </div>
        <!--/row-->

        <div style="clear:both"></div>
    </div>
    <?
}
?>
<!-- /.main-container -->
<script>
    function NumOnly(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }
</script>

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/fontend/bootstrap/js/bootstrap.min.js"></script>
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