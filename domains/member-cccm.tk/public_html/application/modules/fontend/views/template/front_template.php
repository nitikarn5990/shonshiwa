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

    <script>
        paceOptions =
        {
            elements: true
        };

        function del_cart(rowid)
        {
            var send = {"rowid": rowid};
            $.ajax
            ({
                url: "<?php echo base_url()?>fountend/Home/del_cart",
                type: "POST",
                data: send,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $("#alert_msg").modal("show");
                        $("#text_msg").text("ลบสำเร็จ.");
                        setTimeout(function () {
                            $("#alert_msg").modal("hide");
                            location.reload();
                        }, 2000);
                    }
                }
            })
        }
    </script>
    <script src="<?php echo base_url()?>assets/fontend/js/pace.min.js"></script>

</head>

<body>

<!-- จอเข้าสู่ระบบ -->
<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <form method="post" action="<?php echo base_url('fontend/home/login')?>">
                <div class="modal-body">
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

<!-- แถบ Navbar -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    <!-- navbar ส่วนบน -->
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <ul class="userMenu">
                        <li>
                            <a href="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='hidden-xs'> puttapisake.com </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pull-right">
                    <ul class="userMenu">
                        <?php
                        if($this->session->userdata('_login') == true)
                        {
                        echo "<li>";
                        ?><a href="<?=site_url('fontend/Home/account_main')?>"><?php
                            echo "<span class='hidden-xs'> บัญชีของฉัน </span>";
                            echo "<i class='glyphicon glyphicon-user hide visible-xs '></i>";
                            echo "</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<li>";
                            ?><a href="<?=site_url('fontend/Home/account_order_list')?>"><?php
                                echo "<span class='hidden-xs'> ประวัติการสั่งซื้อ </span>";
                                echo "<i class='glyphicon glyphicon-user hide visible-xs '></i>";
                                echo "</a>";
                                echo "</li>";
                                echo "<li>";
                                ?><a href="<?=site_url('fontend/Home/logout')?>"><?php
                                    echo "<span class='hidden-xs'> ออกจากระบบ </span>";
                                    echo "<i class='glyphicon glyphicon-user hide visible-xs '></i>";
                                    echo "</a>";
                                    echo "</li>";
                                    }
                                    else
                                    {
                                        echo"<li>";
                                        echo"<a href='#' data-toggle='modal' data-target='#ModalLogin'>";
                                        echo"<span class='hidden-xs'>เข้าสู่ระบบ</span>";
                                        echo"<i class='glyphicon glyphicon-log-in hide visible-xs '>";
                                        echo"</i>";
                                        echo"</a>";
                                        echo"</li>";
                                        echo"<li class='hidden-xs'>";
                                        ?><a href="<?=site_url('fontend/Home/register')?>"> สมัครสมาชิก </a><?php
                                        echo"</li>";
                                    }
                                    ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.navbar ส่วนบน -->

    <!-- navbar ส่วนล่าง -->
    <div class="container">

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <!-- หน้าหลัก -->
                <li class=""><a href="<?=site_url('fontend/Home/index')?>"> หน้าหลัก </a></li>

                <!-- สินค้า -->
                <li class=""><a href="<?=site_url('fontend/Home/product_category')?>"> สินค้า </a></li>

                <!-- ผลงาน -->
                <li class=""><a href="<?=site_url('home/portfolio')?>"> ผลงานของเรา </a></li>

                <!-- โปรโมชั้น -->
                <li class=""><a href="<?=site_url('home/promotion')?>"> โปรโมชั่น </a></li>

                <!-- ช่องทางการชำระเงิน -->
                <li class=""><a href="<?=site_url('home/howbuy')?>"> วิธีการซื้อสินค้า </a></li>

                <!-- ช่องทางการชำระเงิน -->
                <li class=""><a href="<?=site_url('home/payment')?>"> ช่องทางการชำระเงิน </a></li>

                <!-- ติดต่อ -->
                <li class=""><a href="<?=site_url('home/contact')?>"> ติดต่อเรา </a></li>

            </ul>

            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-cart"> </i> <span class="cartRespons"> ตะกร้า (฿ <?=$this->cart->total(); ?>) </span> <b class="caret"> </b> </a>
                    <div class="dropdown-menu col-lg-6 col-xs-12 col-md-6 ">
                        <div class="w100 miniCartTable scroll-pane">
                            <table border="0">
                                <tbody>
                                <?php if($cart = $this->cart->contents()){
                                    foreach($cart as $item){

                                        ?>
                                        <form method="post" id="" action="update_cart/">
                                            <input type="hidden" id="rowid" name="rowid" value="<?=$item['rowid'];?>">
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb">
                                                    <div>
                                                        <img src="<?php echo base_url('assets/Photo_Product/' . $item['product_Picture_1']); ?>" alt="img">
                                                    </div>
                                                </td>
                                                <td style="width:40%">
                                                    <div class="miniCartDescription">
                                                        <h4><?=$item['name']; ?></h4>
                                                        <span class="size">  <?=$item['product_sap_Size']." ".$item['meansurement']; ?></span>
                                                        <div><span class="price"> <?=$item['price']; ?></span><span> บาท </span></div>
                                                    </div>
                                                </td>
                                                <td style="width:10%" class="miniCartQuantity">
                                                    <center>
                                                        <a> จำนวน </a>
                                                        <div>
                                                            <input type="text" id="number" name="number" style="width:50px;" value="<?=$item['qty']; ?>" OnKeyPress="return NumOnly(this)">
                                                        </div>
                                                    </center>
                                                </td>
                                                <td><input class="btn btn-primary" type="submit" name="update" value="คำนวน"></td>
                                                <td style="width:15%"><span class="miniCartSubtotal"> <?=$item['subtotal']; ?></span><span> บาท</span></td>
                                                <td><div class="action-control"><a class="btn btn-danger" href="<?= site_url('fontend/Home/del_cart/'.$item['rowid']) ?>">ลบ </a></div></td>
                                            </tr>
                                        </form>
                                    <?php }?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="miniCartFooter text-left">
                            <ul>
                                <li>
                                    <ul>
                                        <li>
                                            <center><a> ราคาทั้งหมด : </a><a class="subtotal"><?=$this->cart->total(); ?></a><a> บาท</a></center>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <table border="0">
                                        <tr>
                                            <td>
                                                <center><div class="action-control"><a class="btn btn-danger" href="<?= site_url('fontend/Home/del_all_cart/') ?>">ลบทั้งหมด </a></div></center>
                                            </td>
                                            <td>
                                                <center><div><a class="btn btn-primary" href="<?=site_url('fontend/home/product_order')?>"> <i class="fa fa-shopping-cart"> </i> ไปยังตะกร้า </a></div></center>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.navbar ส่วนล่าง -->




</div>
<!-- /.แถบ Navbar  -->

<!-- page content -->


<div class="row">
    <?php echo $content;?>
</div>


<div style="clear:both"></div>

<!-- /page content -->

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> เว็ปไซต์มีปัญหา ติดต่อได้ที่ </h3>
                    <ul>
                        <li class="supportLi">
                            <h4><strong> <i class="fa fa-phone"> </i> +66-818863229 </strong></h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3>&nbsp;</h3>
                    <ul>
                        <li class="supportLi">
                            <h4><i class="fa fa-envelope-o"> </i> puttapisake@gmail.com </h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3>&nbsp;</h3>
                    <ul class="social">
                        <li><a href="https://www.facebook.com/%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B8%AB%E0%B8%A5%E0%B9%88%E0%B8%AD%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%9E%E0%B8%B8%E0%B8%97%E0%B8%98%E0%B8%B2-%E0%B8%A0%E0%B8%B4%E0%B9%80%E0%B8%A9%E0%B8%81-430128757137027/"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; Puttapisake.com </p>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>

<!-- Le javascript
    ================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/fontend/bootstrap/js/bootstrap.min.js"></script>

<!-- include jqueryCycle plugin -->
<script src="<?php echo base_url()?>assets/fontend/js/jquery.cycle2.min.js"></script>

<!-- include easing plugin -->
<script src="<?php echo base_url()?>assets/fontend/js/jquery.easing.1.3.js"></script>

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

<!-- include custom script for only homepage  -->
<script src="<?php echo base_url()?>assets/fontend/js/home.js"></script>
<!-- include custom script for site  -->
<script src="<?php echo base_url()?>assets/fontend/js/script.js"></script>

<script>
    function NumOnly(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }
</script>
</body>
</html>

