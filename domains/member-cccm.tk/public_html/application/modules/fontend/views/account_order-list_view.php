<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Fav and touch icons -->

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

        function ModalCheckMoney(product_report_ID)
        {
            var send = {"product_report_ID": product_report_ID};
            $.ajax
            ({
                url: "<?php echo base_url()?>fontend/Home/get_id_report",
                method: "POST",
                data: send,
                dataType: "json",
                success: function(data)
                {
                    if(data)
                    {                        console.log(data);

                        $("#modal-sizes-3").modal('show');
                        $.each(data, function(key, value)
                        {
                            $("#product_report_ID").val(value.product_report_ID);

                        });
                    }
                }
            });
        }

        function aaaaa(product_report_ID)
        {
            var send = {"product_report_ID": product_report_ID};
            $.ajax
            ({
                url: "<?php echo base_url()?>fontend/Home/get_data_report",
                method: "POST",
                data: send,
                dataType: "json",
                success: function(data)
                {
                    if(data)
                    {
                        console.log(data);
                        $("#modal-sizes-3").modal('show');
                        $.each(data, function(key, value)
                        {
                            $("#product_report_ID1").val(value.product_report_ID);
                            $("#product_report_MoneyPic1").val(value.product_report_MoneyPic);
                            $("#product_report_MoneyPic2").attr('src','<?php echo base_url('assets/pic_report')?>/'+value.product_report_MoneyPic);

                        });
                    }
                }
            });
        }

        function pic_tran(product_report_ID)
        {
            var send = {"product_report_ID": product_report_ID};
            $.ajax
            ({
                url: "<?php echo base_url()?>fontend/home/get_id_report",
                method: "POST",
                data: send,
                dataType: "json",
                success: function(data)
                {
                    if(data)
                    {
                    console.log(data);
                        $("#modal-sizes-3").modal('show');
                        $.each(data, function(key, value)
                        {
                            $("#product_report_ID").val(value.product_report_ID);
                            $("#product_report_TranspoPic11").attr('src','<?php echo base_url('assets/pic_report_Trans')?>/'+value.product_report_TranspoPic);


                        });
                    }
                }
            });
        }

        function cancel(product_report_ID)
        {
            var send = {"product_report_ID": product_report_ID};
            $.ajax
            ({
                url: "<?php echo base_url()?>fontend/home/get_id_report",
                method: "POST",
                data: send,
                dataType: "json",
                success: function(data)
                {
                    if(data)
                    {
                    console.log(data);
                        $("#modal-sizes-3").modal('show');
                        $.each(data, function(key, value)
                        {
                            $("#product_report_ID11").val(value.product_report_ID);

                        });
                    }
                }
            });
        }
    </script>

    <script src="<?php echo base_url()?>assets/fontend/js/pace.min.js"></script>
</head>
<body>



<!-- หลักฐานการโอนเงิน -->
<div class="modal signUpContent fade" id="ModalCheckMoney" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <form method="post" action="addpic_report" enctype="multipart/form-data">
                <div class="modal-body">
                    <h2><center>กรุณาแนบหลักฐานการโอนเงิน</center></h2>

                    <div class="form-group">
                        <label>รูปภาพหลักฐานการโอนเงิน</label>
                        <div>
                            <input type="hidden" id="product_report_ID" name="product_report_ID">
                            <input class="btn btn-primary" type="file" name="product_report_MoneyPic" id="product_report_MoneyPic" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- แก้ไขหลักฐานการโอนเงิน -->
<div class="modal signUpContent fade" id="ModalEditMoney" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic1/" enctype="multipart/form-data">
                <div class="modal-body">
                    <form class="form-horizontal form-label-left" novalidate>
                        <div class="form-group" align="center">
                            <div>
                                <label>รูปภาพหลักฐานการโอนเงิน</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" id="product_report_ID1" name="product_report_ID1">
                                <input type="hidden" id="product_report_MoneyPic1" name="product_report_MoneyPic1">
                                <img id="product_report_MoneyPic2" name="product_report_MoneyPic2"  alt="" height="200" width="150">
                                </br>&nbsp;
                                <input type="file" name="edit_product_Picture_11" id="edit_product_Picture_11" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- แสดงใบส่งของ -->
<div class="modal signUpContent fade" id="ModalShowTransport" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <div class="modal-body">
                <h2><center>รูปใบส่งของ</center></h2>
                <div class="form-group" align="center">
                    <label>รูปภาพหลักฐานการโอนเงิน</label>
                    <div>
                        <img id="product_report_TranspoPic11" name="product_report_TranspoPic11" width="250" height="250">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- ยกเลิก -->
<div class="modal signUpContent fade" id="ModalConfermDel" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
            </div>
            <form method="post" action="cancel_report/" enctype="multipart/form-data">
                <div class="modal-body">
                    <h2><center>ยืนยันการยกเลิกใบสั่งซื้อ</center></h2>

                    <div class="form-group">
                        <label>คุณแน่ใจหรือไม่ที่จะยกเลิกใบสั่งซื้อนี้</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="product_report_ID11" name="product_report_ID11">

                    <button type="submit" class="btn btn-primary">ยกเลิกใบสั่งซื้อ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container main-container headerOffset">

    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10">
            <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> รายการสั่งซื้อ </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> รายการ การสั่งสินค้าของคุณ </h2>
                </div>

                <div style="clear:both"></div>

                <div class="col-xs-12 col-sm-12">
                    <table class="footable">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รหัสใบสั่งซื้อ</th>
                            <th>เวลา</th>
                            <th>วันที่</th>
                            <th><center>สถานะของสินค้า</center></th>
                            <th><center>ดำเนินการ</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data_order as $key => $order) {
                            list($day, $time) = explode(" ", $order['product_report_FirstDateTime']);

                            ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><a href="<?php echo base_url('fontend/home/account_order/'.$order['product_report_ID']);?>"><?=$order['product_report_ID']?></a></td>
                                <td><?=$time?></td>
                                <td><?=$day?></td>
                                <td data-value="1">
                                    <?php
                                    if($order['product_report_Status'] == 1)
                                    {
                                        $btn_color = "gray";
                                        $btn_tag = "รอยืนยันการโอนเงิน";
                                    }
                                    elseif($order['product_report_Status'] == 2)
                                    {
                                        $btn_color = "blue";
                                        $btn_tag = "รอการตรวจสอบการโอนเงิน";
                                    }
                                    elseif($order['product_report_Status'] == 3)
                                    {
                                        $btn_color = "blue";
                                        $btn_tag = "รอการจัดเตรียมสินค้า";
                                    }
                                    elseif($order['product_report_Status'] == 4)
                                    {
                                        $btn_color = "blue";
                                        $btn_tag = "รอการจัดส่งสินค้า";
                                    }
                                    elseif($order['product_report_Status'] == 5)
                                    {
                                        $btn_color = "green";
                                        $btn_tag = "ส่งสินค้าเรียบร้อยแล้ว";
                                    }
                                    else
                                    {
                                        $btn_color = "red";
                                        $btn_tag = "ยกเลิกรายการ";
                                    }
                                    ?>
                                    <center><font color="<?=$btn_color?>"><?=$btn_tag?></font></center>
                                </td>
                                <td>
                                    <?php
                                    if($order['product_report_Status'] == 1) {
                                        ?>
                                        <center>
                                            <a href="#" onclick="ModalCheckMoney('<?php echo $order['product_report_ID'] ?>')"  class="btn btn-primary btn-small " data-toggle="modal"
                                               data-target="#ModalCheckMoney">
                                                แจ้งการชำระเงิน &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </center>
                                        </br>
                                        <center>
                                            <a href="#" onclick="cancel('<?php echo $order['product_report_ID'] ?>')" class="btn btn-danger btn-small "data-toggle="modal"
                                               data-target="#ModalConfermDel">
                                                ยกเลิกการสั่งสินค้า
                                            </a>
                                        </center>
                                        <?php
                                    }

                                    elseif($order['product_report_Status'] == 2) {

                                    }
                                    elseif($order['product_report_Status'] == 5) {
                                    ?>
                                    <center>
                                        <a href="#" onclick="pic_tran('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small " data-toggle="modal"
                                           data-target="#ModalShowTransport">
                                            ดูใบส่งสินค้า &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </center>
                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div style="clear:both"></div>

                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="<?=site_url('fontend/Home/index')?>"> <i class="fa fa-home"></i> กลับไปยังหน้าหลัก </a>
                        </li>
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
