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

    <script src='<?php echo base_url()?>assets/elevatezoom-master/jquery.elevatezoom.js'></script>

</head>
<body onload="setTimeout(function () {
        window.print();
        window.close();
    }, 1000); ">
<div class="container main-container headerOffset">
    <div class="row">
        <div class="col-md-12">
            <h1><span> ใบสั่งซื้อสินค้า </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> ข้อมูลใบสั่งซื้อ </h2>
                </div>


                <div class="statusContent">
                    <?php foreach($data_report as $report) {

                        list($day, $time) = explode(" ", $report['product_report_DateTime']);

                        ?>
                        <div class="col-sm-12">
                            <div class=" statusTop">
                                <p><strong>สถานะใบสั่งซื้อสินค้า : </strong>
                                    <?php
                                    if ($report['product_report_Status'] == 1) {
                                        $btn_tag = "รอยืนยันการโอนเงิน";
                                    } elseif ($report['product_report_Status'] == 2) {
                                        $btn_tag = "รอการตรวจสอบการโอนเงิน";
                                    } elseif ($report['product_report_Status'] == 3) {
                                        $btn_tag = "รอการจัดเตรียมสินค้า";
                                    } elseif ($report['product_report_Status'] == 4) {
                                        $btn_tag = "รอการจัดส่งสินค้า";
                                    } elseif ($report['product_report_Status'] == 5) {
                                        $btn_tag = "ส่งสินค้าเรียบร้อยแล้ว";
                                    } else {
                                        $btn_tag = "ยกเลิกรายการ";
                                    }
                                    echo $btn_tag;
                                    ?>
                                </p>

                                <p><strong>วันที่ทำการสั่งซื้อ : </strong><?=$day?></p>

                                <p><strong>เลขที่ใบสั่งซื้อ : </strong> <?=$report['product_report_ID']?> </p>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="order-box">
                                <div class="order-box-header">
                                    ผู้สั่ง
                                </div>

                                <div class="order-box-content">
                                    <div class="address">
                                        <strong>จาก </strong>
                                        คุณ <?=$report['user_Name']." ".$report['user_Lastname'] ?>

                                        <div class="adr">
                                            <?=$report['user_Address']?>
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

                                    <div class="address">
                                        <strong>ถึง </strong>

                                        คุณ <?=$report['product_report_Name']?>

                                        <div class="adr">
                                            <?=$report['product_report_Address']?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?
                    }
                    ?>

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
                                        <?php foreach($data_order as $order) {
                                            ?>
                                            <tr class="cartProduct">
                                                <td style="width:40%">
                                                    <div class="miniCartDescription">
                                                        <span> ชื่อ</span> <?=$order['product_order_Name'] ?> </br>&nbsp;

                                                        <div class="price">
                                                            <span> ขนาด </span> <?=$order['product_order_Size']." ".$order['product_order_Meansurement'] ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="width:10%"><a>
                                                        จำนวน <?=$order['product_order_Unit'] ?> ชิ้น </a></td>
                                                <td class="" style="width:15%">
                                                    <span> <?=$order['product_order_Price'] ?> บาท </span>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                        foreach($get_data_r_show as $report1) {
                                            ?>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td colspan="2" style="width:20%">รวม</td>
                                                <td class="" style="width:30%"><span> <?=$report1['product_report_Allprice'] ?> บาท </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td colspan="2" style="width:20%">ส่วนลด</td>
                                                <td class="" style="width:30%"><span> <?=$report1['promotion_Discount'] ?>% </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td colspan="2" style="width:20%">ค่าจัดส่ง</td>
                                                <td class="" style="width:30%"><span> Free </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td style="width:30%"></td>
                                                <td class="" style="width:20%">ราคารวม</td>
                                                <td class="" style="width:30%"><span class="price"> <?=$report1['product_report_Discountprice'] ?> บาท </span>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->
</div>
<!-- /main-container -->

<div class="gap"></div>

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script>
    function NumOnly(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }
    //$(function(){
    //        $('#sap_id').change(function(){
    //            var sap_id = $('#sap_id').val();
    //            var id = '<?php //echo $sap['product_sap_ID']; ?>//';
    //            var url = '<?//=site_url('fontend/Home/change_price')?>//';
    ////            alert(id);
    ////            $.post(url,{id , sap_id },function(d){
    //                console.log(d);
    ////                $('#price').html(d);
    ////            });
    //            $.ajax({
    //                url : url,
    //                data : {id, sap_id},
    //                type : 'POST',
    //                success : function(data){
    //                    console.log(data);
    //                }
    //            });
    //        });

    //        var sap_id = '5';
    //        var id = '36';
    var url = '<?=base_url('fontend/Home/change_price/'.$data_product[0]['product_ID'])?>';
    function test(ele){

        $.post(url+'/'+$(ele).val(), function(data){
            if($(ele).val() != ''){
                $('#price').html(data);
            }else{
                $('#price').html('');
            }

        });

//            $.ajax({
//                url : url+'/<?//=$data_sap[0]['product_sap_ID']?>//',
////            data : {product_id : '5', size : '36'},
//                type : 'POST',
//                success : function(data){
//                   $('#price').text(data);
//                }
//            });

    }


    $('#sap_id').change(function(){
        // test($(this).val());
        //  alert('');
        // console.log(this);
        //  $.post(url+'/'+$(this).val(),function(data){
        //       $('#price').html(data);
        //  });
    });
    //  });
</script>

<script>
    $(function () {

        $('.rating-tooltip-manual').rating({
            extendSymbol: function () {
                var title;
                $(this).tooltip({
                    container: 'body',
                    placement: 'bottom',
                    trigger: 'manual',
                    title: function () {
                        return title;
                    }
                });
                $(this).on('rating.rateenter', function (e, rate) {
                    title = rate;
                    $(this).tooltip('show');
                })
                    .on('rating.rateleave', function () {
                        $(this).tooltip('hide');
                    });
            }
        });

    });


</script>


</body>
</html>


