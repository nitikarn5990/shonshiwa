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

    <!-- หัวข้อ -->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> ยืนยันการสั่งซื้อ</span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps"><a href="<?=site_url('fontend/Home/product_category')?>"><i class="fa fa-chevron-left"></i> กลับไปเลือกสินค้าเพิ่มเติม </a></h4>
        </div>
    </div>

    <!-- เนื้อหา -->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div style="clear: both"></div>
                            <div class="onepage-checkout col-lg-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form class="form-inline" action="page" method="post">
                                                <label class="radio inline">
                                                    <input id="OldAddress" type="radio" value="option-b1" name="add"> ใช้ที่อยู่ที่ใช้ในการสมัคร
                                                </label>&nbsp;&nbsp;
                                                <label class="radio inline">
                                                    <input id="NewAddress" type="radio" value="option-b2" name="add"> กรอกที่อยู่ใหม่
                                                </label>
                                            </form>
                                            <hr>
                                            <div style="clear: both"></div>
                                            <?php foreach($data_address as $data){


                                            ?>
                                            <div class="expandBox collapse" id="OldAddressBox">

                                                <div class="form-group uppercase"><strong>ข้อมูลที่จะใช้ในการจัดส่ง</strong></div>
                                                <form method="post" action="buy/">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="InputName">ชื่อ ผู้รับ</label>
                                                        <input id="user_Name" name="user_Name" class="form-control" type="text" readonly value="<?=$data['user_Name']." ".$data['user_Lastname']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="InputEmail">อีเมลล์</label>
                                                        <input id="user_Email" name="user_Email" class="form-control" type="text" readonly value="<?=$data['user_Email']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="InputMobile">เบอร์โทรศัพท์<sup>*</sup> </label>
                                                        <input id="user_Mobile" name="user_Mobile" class="form-control" type="text" readonly value="<?=$data['user_Mobile']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="InputAddress">ที่อยู่ที่จะใช้ในการจัดส่ง</label>
                                                        <div>
                                                            <textarea id="user_Address" name="user_Address" class="form-control" rows="3" readonly><?=$data['user_Address']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cartFooter w100">
                                                    <div class="box-footer">

                                                        <div class="pull-left">
                                                            <a class="btn btn-default" href="<?=site_url('fontend/Home/product_order')?>">
                                                                <i class="fa fa-arrow-left"></i>&nbsp; ย้อนกลับ
                                                            </a>
                                                        </div>
                                                        <div class="pull-right">
                                                            <a href="#" class="btn btn-primary btn-small " data-toggle="modal" data-target="#ModalCheckConfirmOld">
                                                                ยืนยันการสั่งซื้อ &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                                            </a>
                                                            <!-- จอยืนยัน -->
                                                            <div class="modal signUpContent fade" id="ModalCheckConfirmOld" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                                                                            <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <h4><center>คุณแน่ใจที่จะยืนยันการสั่งซื้อหรือไม่</center></h4>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.จอยืนยัน -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <?php } ?>
<!--old-->

                                            <div class="expandBox collapse" id="NewAddressBox">
                                                <div class="form-group uppercase"><strong>กรุณากรอกข้อมูลที่จะใช้ในการจัดส่ง</strong></div>
                                                <form method="post" action="buy2/">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="InputName">ชื่อ ผู้รับ</label>
                                                            <input required="required" id="user_Name2" name="user_Name2" class="form-control" type="text" placeholder="Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputEmail">อีเมลล์</label>
                                                            <input required="required" id="user_Email2" name="user_Email2" class="form-control" type="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputMobile">เบอร์โทรศัพท์ </label>
                                                            <input required="required" id="user_Mobile2" name="user_Mobile2" class="form-control" type="text" placeholder="Telephone Number" OnKeyPress="return NumOnly(this)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputAddress">ที่อยู่ที่จะใช้ในการจัดส่ง</label>
                                                            <div>
                                                                <textarea required="required" id="user_Address2" name="user_Address2" class="form-control" rows="3" placeholder="Address"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cartFooter w100">
                                                        <div class="box-footer">

                                                            <div class="pull-left">
                                                                <a class="btn btn-default" href="<?=site_url('fontend/Home/product_order')?>">
                                                                    <i class="fa fa-arrow-left"></i>&nbsp; ย้อนกลับ
                                                                </a>
                                                            </div>
                                                            <div class="pull-right">
                                                                <a href="#" class="btn btn-primary btn-small " data-toggle="modal" data-target="#ModalCheckConfirmNew">
                                                                    ยืนยันการสั่งซื้อ &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                                                </a>
                                                                <!-- จอยืนยัน -->
                                                                <div class="modal signUpContent fade" id="ModalCheckConfirmNew" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                                                                                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <h4><center>คุณแน่ใจที่จะยืนยันการสั่งซื้อหรือไม่</center></h4>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.จอยืนยัน -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /.main-container-->
<div class="gap"></div>

<!-- Le javascript
================================================== -->


<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<!-- jQuery select2 // custom select   -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<script>


    $(document).ready(function () {

        $('input#NewAddress').on('ifChanged', function (event) {
            $('#NewAddressBox').collapse("show");
            $('#OldAddressBox').collapse("hide");
        });

        $('input#OldAddress').on('ifChanged', function (event) {
            $('#NewAddressBox').collapse("hide");
            $('#OldAddressBox').collapse("show");
        });

    });

    function NumOnly(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }
</script>

</body>
</html>
