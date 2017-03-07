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

    <div class="row transitionfx">
        <!-- รูปภาพทางซ้าย -->
        <?php foreach($data_product as $key => $pro) { ?>

            <form method="post" id="" action="<?=base_url('fontend/Home/add_cart')?>/">
                <input type="hidden" name="pid" id="pid" value="<?=$pro['product_ID'];?>">
                <div class="col-lg-6 col-md-6 col-sm-6 productImageZoom">
                    <div class='zoom' id='zoomContent'>
                        <img class="zoomImage1 img-responsive"
                             data-src="<?php echo base_url() ?>assets/fontend/images/product_details/hi-res-croped/1.jpg"
                             src='<?php echo base_url('assets/Photo_Product/' . $pro['product_Picture_1']); ?>'
                             alt='Daisy on the Ohoopee'/>
                    </div><!-- รูปใหญ่ -->
                    <div class="zoomThumb ">
                        <a class="zoomThumbLink">
                            <img data-large="images/product_details/hi-res-croped/1.jpg"
                                 src="<?php echo base_url('assets/Photo_Product/' . $pro['product_Picture_1']); ?>"
                                 alt="Saleen" title=""/>
                        </a>
                        <a class="zoomThumbLink">
                            <img data-large="images/product_details/hi-res-croped/2.jpg"
                                 src="<?php echo base_url('assets/Photo_Product/' . $pro['product_Picture_2']); ?>"
                                 alt="Saleen" title=""/>
                        </a>
                    </div><!-- รูปเล็ก -->
                </div>
                <!-- ข้อมูลทางขวา -->
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <h2 class="product-title"><?=$pro['product_Name'];?> </h2>
                    </br>
                    <div class="product-tab w100 clearfix">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">รายละเอียดสินค้า</a></li>
                            <li><a href="#size" data-toggle="tab">ขนาด และ ราคาของสินค้า</a></li>
                            <li><a href="#information" data-toggle="tab">ข้อมูลสินค้า</a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="details">
                                <h3>
                                    <font size="5">รายละเอียดสินค้า</font></br></br>
                                    <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pro['product_Detail'] ?></font>
                                </h3>
                                <br>
                            </div>

                            <div class="tab-pane" id="size">
                                <font size="5">ขนาด และ ราคา</font></br></br>
                                <?php foreach($data_sap as $sap){
                                ?><font size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ขนาด <B><?= $sap['product_sap_Size'];?></B> <?=$pro['meansurement'];?> ราคา <B><?=$sap['product_sap_Price'];?></B> บาท</font></br>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="tab-pane" id="information">
                                <h3><font size="5">รหัสของสินค้า : </font><font size="3"><?=$pro['product_ID'];?></font></h3>
                                <h3><font size="5">ประเภทของสินค้า : </font><font size="3"><?php foreach($data_type as $type){echo $type['product_type_Name'];} ?></font></h3>
                                <h3><font size="5">กลุ่มของสินค้า : </font><font size="3"><?php foreach($data_group as $group){echo $group['product_group_Name'];} ?></font></h3>
                            </div>

                        </div>
                        <!-- /.tab content -->
                    </div>

                    <div class="productFilter productFilterLook2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="filterBox">
                                    <select class="form-control" required id="sap_id" name="sap_id" onchange="test(this)">
                                        <option value="" selected>ขนาด</option>
                                        <?php
                                        foreach($data_sap as $sap)
                                        {
                                            echo "<option value=\"" . $sap['product_sap_ID'] . "\">" .$sap['product_sap_Size']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <font size="5">ราคาของสินค้า : </font><font size="3" id="price"></font>
                            </div>
                        </div>
                    </div>
                    <div class="productFilter productFilterLook2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <font size="5"> จำนวนของสินค้า : </font>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <font size="3"><input required="required" type="text" id="number" name="number" placeholder="กรอกเฉพาะตัวเลขเท่านั้น" OnKeyPress="return NumOnly(this)"></font>
                            </div>
                        </div>
                    </div>

                    <div class="cart-actions">
                        <div class="addto row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <center>
                                    <?php
                                    if($pro['product_Status']==1){
                                        ?>
                                        <button onclick="productAddToCartForm.submit(this);" class="button btn-block btn-cart cart first" title="Add to Cart" type="submit">
                                            หยิบใส่ตระกล้า
                                        </button>
                                    <?php
                                    }
                                    else {
                                        ?>
                                        <button onclick="productAddToCartForm.submit(this);" class="button btn-danger" title="สินค้าหมด" type="button">
                                            ไม่สามารถซื้อสินค้าได้
                                        </button>

                                    <?php
                                    }
                                    ?>

                                </center>
                            </div>
                        </div>

                        <div style="clear:both"></div>
                        <?php
                        if($pro['product_Status']==1){
                            $color = "fa fa-check-circle-o color-in";
                            $text = "มีสินค้าชิ้นนี้";
                        }
                        else {
                            $color = "fa fa-times-circle-o color-out";
                            $text = "สินค้าหมด";


                        }
                        ?>
                        <h3 class="incaps"><i class="<?=$color;?>"></i> <?=$text;?></h3>
                    </div>
                    <!--/.ปุ่มลงออเดอร์-->

                    <div class="clear"></div>
                    <div style="clear:both"></div>
                </div>
            </form><?php
            } ?>
    </div>

    <div class="row recommended">

        <h1> สินค้าที่คุณอาจสนใจ </h1>
        <div id="SimilarProductSlider">
            <?php foreach($data_pro_rand as $data )
            {
                ?>

            <div class="item">
                <div class="product">
                    <div class="image">
                        <img src="<?php echo base_url('assets/Photo_Product/' . $data['product_Picture_1']); ?>" alt="img" class="img-responsive">
                    </div>
                    <div class="description">
                        <h4><font color="black"><?=$data['product_Name'];?> </font></h4>
                    </div>
                    <div class="action-control">
                        <a class="btn btn-primary" href="<?= site_url('fontend/Home/product_show/'.$data['product_ID']) ?>"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> ดูสินค้า </span> </a>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>

    <div style="clear:both"></div>

</div>
<!-- /main-container -->

<div class="gap"></div>

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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
<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- include jqueryCycle plugin -->
<script src="<?=base_url('assets/js/jquery.cycle2.min.js')?>"></script>
<!-- include easing plugin -->
<script src="<?=base_url('assets/js/jquery.easing.1.3.js')?>"></script>

<!-- include  parallax plugin -->
<script type="text/javascript" src="<?=base_url('assets/js/jquery.parallax-1.1.js')?>"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" src="<?=base_url('assets/js/helper-plugins/jquery.mousewheel.min.js')?>"></script>

<!-- include mCustomScrollbar plugin //Custom Scrollbar  -->

<script type="text/javascript" src="<?=base_url('assets/js/jquery.mCustomScrollbar.js')?>"></script>

<!-- include icheck plugin // customized checkboxes and radio buttons   -->
<script type="text/javascript" src="<?=base_url('assets/plugins/icheck-1.x/icheck.min.js')?>"></script>

<!-- include grid.js // for equal Div height  -->
<script src="<?=base_url('assets/js/grids.js')?>"></script>

<!-- include carousel slider plugin  -->
<script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>

<script src='<?=base_url('assets/js/jquery.zoom.js')?>'></script>

<script src="<?php echo base_url()?>assets/plugins/magnific/jquery.magnific-popup.min.js"></script>

<!-- jQuery select2 // custom select   -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- include touchspin.js // touch friendly input spinner component   -->
<!-- include touchspin.js // touch friendly input spinner component   -->
<script src="<?php echo base_url()?>assets/js/bootstrap.touchspin.js"></script>

<!-- include custom script for site  -->
<script src="<?php echo base_url()?>assets/js/script.js"></script>


<script src="<?php echo base_url()?>assets/plugins/rating/bootstrap-rating.min.js"></script>
<script>
    $(document).ready(function (){
      
    });
    $(function () {
        //$('.swipebox').zoom();


        $(".zoomThumb a").click(function () {
            var largeImage = $(this).find("img").attr('data-large');
            $(".zoomImage1").attr('src', largeImage);
            $(".zoomImg").attr('src', largeImage);
            $(".gall-item").attr('href', largeImage);

        });

        $('.productImageZoomx').magnificPopup({
            delegate: 'img', type: 'image', gallery: {enabled: true},

            callbacks: {
                elementParse: function () {
                    this.item.src = this.item.el.attr('src');
                }
            }

        });


        $('.gall-item').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        $("#zoomContent").click(function () {
            //alert();
            $('.gall-item').trigger('click');
        });

        // CHANGE IMAGE MODAL THUMB

        $(".product-thumbList a").click(function () {
            var largeImage = $(this).find("img").attr('data-large');
            $(".mainImg").attr('src', largeImage);

        });

    });
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
