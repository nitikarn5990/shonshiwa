<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/fontend/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/fontend/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/fontend/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/fontend/ico/favicon.png">
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
        paceOptions = {
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
                        $("#text_msg").text("ź�����.");
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

<!-- ���������к� -->
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
                            <input name="user_Username" id="user_Username" class="form-control input" size="20" placeholder="��سҡ�͡���ͼ�������" type="text">
                        </div>
                    </div>
                    <div class="form-group login-password">
                        <div>
                            <input name="user_Password" id="user_Password" class="form-control input" size="20" placeholder="��سҡ�͡���ʼ�ҹ" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox login-remember">
                                <label>
                                    <input name="rememberme" value="forever" checked="checked" type="checkbox"> ���������к�
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input name="submit" class="btn  btn-block btn-lg btn-primary" value="�������к�" type="submit">
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <a href="<?=site_url('fontend/Home/register')?>"> �ѹ��ͧ�����Ѥ���Ҫԡ </a>
                <br>
                <a href="<?=site_url('fontend/Home/forget_password')?>"> �ѹ������ʼ�ҹ? </a></p>
            </div>
        </div>
    </div>
</div>
<!-- /.���������к� -->

<!-- ᶺ Navbar -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    <!-- navbar ��ǹ�� -->
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="pull-right">
                    <ul class="userMenu">
                        <?php
                        if($this->session->userdata('is_login') == true)
                        {
                        echo "<li>";
                        ?><a href="<?=site_url('fontend/Home/account_main')?>"><?php
                            echo "<span class='hidden-xs'> �ѭ�բͧ�ѹ </span>";
                            echo "<i class='glyphicon glyphicon-user hide visible-xs '></i>";
                            echo "</a>";
                            echo "</li>";
                            echo "<li>";
                            ?><a href="<?=site_url('fontend/Home/logout')?>"><?php
                                echo "<span class='hidden-xs'> �͡�ҡ�к� </span>";
                                echo "<i class='glyphicon glyphicon-user hide visible-xs '></i>";
                                echo "</a>";
                                echo "</li>";
                                }
                                else
                                {
                                    echo"<li>";
                                    echo"<a href='#' data-toggle='modal' data-target='#ModalLogin'>";
                                    echo"<span class='hidden-xs'>�������к�</span>";
                                    echo"<i class='glyphicon glyphicon-log-in hide visible-xs '>";
                                    echo"</i>";
                                    echo"</a>";
                                    echo"</li>";
                                    echo"<li class='hidden-xs'>";
                                    ?><a href="<?=site_url('fontend/Home/register')?>"> ��Ѥ���Ҫԡ </a><?php
                                    echo"</li>";
                                }
                                ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.navbar ��ǹ�� -->

    <!-- navbar ��ǹ��ҧ -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"> Toggle navigation </span>
                <span class="icon-bar"> </span> <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
            </button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"><i class="fa fa-shopping-cart colorWhite"> </i>
                <span class="cartRespons colorWhite"> Cart (5555.00) </span>
            </button>
            <a class="navbar-brand " href="<?=site_url('fontend/Home/index')?>"> <img src="<?php echo base_url('assets/fontend/images/logo.png')?>" alt=""> </a>

            <!-- �ѧ���蹤��� for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                </div>
            </div>
            <!-- /.�ѧ���蹤��� for mobile -->
        </div>

        <!-- �ѧ���蹵�С��� for mobile -->
        <div class="navbar-cart  collapse">
            <div class="cartMenu  col-lg-4 col-xs-12 col-md-4 ">
                <div class="w100 miniCartTable scroll-pane">
                    <table>
                        <tbody>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="product-details.html"> <img src="<?php echo base_url('assets/fontend/images/product/2.jpg')?>" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="product-details.html"> ���� </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="product-details.html"> <img src="<?php echo base_url('assets/fontend/images/product/2.jpg')?>" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="product-details.html"> <img src="<?php echo base_url()?>assets/fontend/images/product/5.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="product-details.html"> <img src="<?php echo base_url()?>assets/fontend/images/product/3.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="product-details.html"> <img src="<?php echo base_url()?>assets/fontend/images/product/3.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        <tr class="miniCartProduct">
                            <td style="width:20%" class="miniCartProductThumb">
                                <div><a href="product-details.html"> <img src="<?php echo base_url()?>assets/fontend/images/product/4.jpg" alt="img"> </a>
                                </div>
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                    <span class="size"> 12 x 1.5 L </span>

                                    <div class="price"><span> $8.80 </span></div>
                                </div>
                            </td>
                            <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                            <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                            <td style="width:5%" class="delete"><a> x </a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--/.miniCartTable-->

                <div class="miniCartFooter  miniCartFooterInMobile text-right">
                    <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                    <a class="btn btn-sm btn-danger" href="cart.html"> <i class="fa fa-shopping-cart"> </i> VIEW CART
                    </a> <a href="checkout-0.html" class="btn btn-sm btn-primary"> CHECKOUT </a>
                </div>
                <!--/.miniCartFooter-->

            </div>
            <!--/.cartMenu-->
        </div>
        <!-- /.�ѧ���蹵�С��� for mobile -->

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <!-- ˹����ѡ -->
                <li class=""><a href="<?=site_url('fontend/Home/index')?>"> ˹����ѡ </a></li>

                <!-- �Թ��� -->
                <li class=""><a href="<?=site_url('fontend/Home/product_category')?>"> �Թ��� </a></li>

                <!-- �ŧҹ -->
                <li class=""><a href="<?=site_url('home/portfolio')?>"> �ŧҹ�ͧ��� </a></li>

                <!-- ������� -->
                <li class=""><a href="<?=site_url('home/promotion')?>"> ������� </a></li>

                <!-- �Դ��� -->
                <li class=""><a href="<?=site_url('home/contact')?>"> �Դ������ </a></li>
            </ul>

            <!--- this part will be hidden for mobile version -->
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-cart"> </i> <span class="cartRespons"> Cart ($ <?=$this->cart->total(); ?>) </span> <b class="caret"> </b> </a>
                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane">
                            <table>
                                <tbody>
                                <?php if($cart = $this->cart->contents()){
                                    foreach($cart as $item){

                                        ?>
                                        <form method="post" id="" action="update_cart/">
                                            <input type="hidden" id="rowid" name="rowid" value="<?=$item['rowid'];?>">
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb">
                                                    <div>
                                                        <a href="product-details.html"> <img src="<?php echo base_url('assets/Photo_Product/' . $item['product_Picture_1']); ?>" alt="img"></a>
                                                    </div>
                                                </td>
                                                <td style="width:40%">
                                                    <div class="miniCartDescription">
                                                        <h4><a href="product-details.html"> <?=$item['name']; ?> </a></h4>
                                                <span class="size">  <?=$item['product_sap_Size']." ".$item['meansurement']; ?>
                                                </span>

                                                        <div class="price"><span> <?=$item['price']; ?> </span></div>
                                                    </div>
                                                </td>
                                                <td style="width:10%" class="miniCartQuantity"><a> �ӹǹ </a><input type="text" id="number" name="number" value="<?=$item['qty']; ?>" placeholder="��سҡ�͡੾�е���Ţ��ҹ��"></td>
                                                <td><input type="submit" name="update" value="update"></td>
                                                <td style="width:15%" class="miniCartSubtotal"><span> <?=$item['subtotal']; ?> </span></td>
                                                <td><div class="action-control"><a class="btn btn-primary" href="<?= site_url('fontend/Home/del_cart/'.$item['rowid']) ?>">ź </a></div></td>
                                            </tr>
                                        </form>
                                    <?php }?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--/.miniCartTable-->

                        <div class="miniCartFooter text-right">
                            <h3 class="text-right subtotal"> �Ҥҷ����� : <?=$this->cart->total(); ?> </h3>
                            <a class="btn btn-sm btn-danger" href="<?=site_url('fontend/home/product_order')?>"> <i class="fa fa-shopping-cart"> </i> ��ѧ��С��� </a>
                            <td><div class="action-control"><a class="btn btn-primary" href="<?= site_url('fontend/Home/del_all_cart/') ?>">ź������ </a></div></td>
                        </div>
                        <!--/.miniCartFooter-->


                    </div>

                    <!--/.dropdown-menu-->
                </div>
                <!--/.cartMenu-->

                <div class="search-box">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                    </div>
                    <!-- /input-group -->

                </div>
                <!--/.search-box -->
            </div>
            <!--/.navbar-nav hidden-xs-->
        </div>
        <!--/.nav-collapse -->

    </div>
    <!--/.container -->
    <!-- /.navbar ��ǹ��ҧ -->

    <div class="search-full text-right"><a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>

        <div class="searchInputBox pull-right">
            <input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search"
                   class="search-input">
            <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
        </div>
    </div>
    <!--/.search-full-->


</div>
<!-- /.ᶺ Navbar  -->

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
                    <h3> ���䫵��ջѭ�� �Դ������� </h3>
                    <ul>
                        <li class="supportLi">
                            <h4><a class="inline" href=""> <strong> <i class="fa fa-phone"> </i> +66-818863229 </strong> </a></h4>
                            <h4><a class="inline" href=""> <i class="fa fa-envelope-o"> </i> puttapisake@gmail.com </a></h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">

                </div>

                <div style="clear:both" class="hide visible-xs"></div>

                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Information </h3>
                    <ul class="list-unstyled footer-nav">
                        <li><a href="#">Questions?
                            </a></li>

                        <li><a href="#"> Order Status
                            </a></li>
                        <li><a href="#"> Sizing Charts
                            </a></li>
                        <li><a href="#"> Return Policy </a></li>
                        <li><a href="#">
                                Contact Us
                            </a></li>

                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> �ѭ�բͧ�ѹ </h3>
                    <ul>
                        <li><a href="account.html"> My Account </a></li>
                        <li><a href="my-address.html"> My Address </a></li>
                        <li><a href="order-list.html"> Order list </a></li>
                        <li><a href="order-status.html"> Order Status </a></li>
                    </ul>
                </div>

                <div style="clear:both" class="hide visible-xs"></div>

                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Stay in touch </h3>
                    <ul>
                        <li>
                            <div class="input-append newsLatterBox text-center">
                                <input type="text" class="full text-center" placeholder="Email ">
                                <button class="btn  bg-gray" type="button"> Subscribe <i
                                        class="fa fa-long-arrow-right"> </i></button>
                            </div>
                        </li>
                    </ul>
                    <ul class="social">
                        <li><a href="http://facebook.com"> <i class=" fa fa-facebook"> &nbsp; </i> </a></li>
                        <li><a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a></li>
                        <li><a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com"> <i class="fa fa-pinterest"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com"> <i class="fa fa-youtube"> &nbsp; </i> </a></li>
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

</script>
</body>
</html>
