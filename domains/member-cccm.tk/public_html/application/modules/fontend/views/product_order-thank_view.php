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
        <div class="col-lg-12 ">
            <div class="row userInfo">

                <div class="thanxContent text-center">

                    <h1> ขอบคุณสำหรับการสั่งซื้อสินค้า</h1>

                </div>

                <div class="col-lg-7 col-center">
                    <h4></h4>

                    <div class="cartContent table-responsive  w100">
                        <table style="width:100%" class="cartTable cartTableBorder">
                            <tbody>

                            <tr class="CartProduct  cartTableHeader">
                                <td colspan="2"> Items to be Shipped</td>


                                <td style="width:15%"></td>
                            </tr>
                            <?php foreach($data_thank as $data){


                            ?>
                            <tr class="CartProduct">
                                <td class="CartProductThumb">
                                    <div>
                                        <img alt="img" src="<?php echo base_url('assets/Photo_Product/' . $data['product_order_Picture'])?>">
                                    </div>
                                </td>

                                <td>
                                    <div class="CartDescription">
                                        <h4><?=$data['product_order_Name'] ?></h4>
                                        <span class="size"><?=$data['product_order_Size']." ".$data['product_order_Meansurement']?></span>

                                        <div class="price"><span><?=$data['product_order_Price']?></span></div>
                                    </div>
                                </td>
                                <td class="price">$60</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="input-append newsLatterBox text-center">
                        &nbsp;</br>
                        <a href="<?=site_url('fontend/Home/account_order_list')?>" class="btn btn-primary btn-small ">ไปยังใบสั่งซื้อสินค้า</a>
                    </div>
                </div>
            </div>
            <!--/row end-->

        </div>

        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container -->

<div class="gap"></div>
</body>


