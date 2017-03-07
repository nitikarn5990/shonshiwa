<!-- ภาพสไลด์ -->
<div class="banner">
    <div class="full-container">
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="slider-content">
            <ul id="pager2" class="container">
            </ul>
            <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span>
            <span class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>

            <div class="slider slider-v1" data-cycle-swipe=true data-cycle-prev=".prevControl" data-cycle-next=".nextControl" data-cycle-loader="wait">
                <?php
                foreach($data_slider as $sl) {?>
                    <div class="slider-item slider-item-img<?=$sl['slider_Number'];?>">
                        <div class="sliderInfo">
                            <div class="container">
                                <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-left sliderText white hidden-xs">
                                    <div class="inner">
                                        <h1><?=$sl['slider_Title'];?></h1>

                                        <p class="hidden-xs"><?=$sl['slider_Detail'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="<?php echo base_url('assets/pic_slider/'. $sl['slider_Picture']);?>" class="img-responsive parallaximg sliderImg" alt="img">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- แสดงสินค้ามาใหม่ -->
<div class="container main-container">

    <!-- สินค้ามาใหม่ -->
    <div class="row featuredPostContainer globalPadding style2">
        <h3 class="section-title style2 text-center"><span>สินค้ามาใหม่</span></h3>
        <div id="productslider" class="owl-carousel owl-theme">
            <?php foreach($data_pro_new as $pro){ ?>
                <div class="item">
                    <div class="product">
                        <div class="image">
                            <img src="<?php echo base_url('assets/Photo_Product/' . $pro['product_Picture_1']); ?>" alt="img" class="img-responsive">
                        </div>
                        <div class="description">
                            <h4><?=$pro['product_Name']?> </h4>
                        </div>
                        <div class="action-control"><a class="btn btn-primary" href="<?= site_url('fontend/Home/product_show/'.$pro['product_ID']) ?>"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> ดูสินค้า </span> </a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- แสดงสินค้าขายดี&แนะนำ -->
<div class="container main-container">

    <!-- สินค้าขายดี -->

    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center"><span>สินค้าขายดี</span></h3>
        <div class="container">
            <div class="row xsResponse categoryProduct">
                <?php foreach($product_popular as $pop) {
                    ?>
                    <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <div class="imageHover imageHoverFlip">
                                <a href="<?= site_url('fontend/Home/product_show/'.$pop['product_ID']) ?>"><img
                                        src="<?php echo base_url('assets/Photo_Product/' . $pop['product_Picture_1']); ?>" alt="img"
                                        class="img-responsive primaryImage">
                                    <img src="<?php echo base_url('assets/Photo_Product/' . $pop['product_Picture_2']); ?>" alt="img"
                                         class="img-responsive secondaryImage"></a>
                            </div>
                            <div class="description">
                                <h4><?=$pop['product_Name']; ?> </a></h4>

                                <div class="action-control"><a class="btn btn-primary" href="<?= site_url('fontend/Home/product_show/'.$pop['product_ID']) ?>"> <span class="add2cart"><i
                                                class="glyphicon glyphicon-shopping-cart"> </i> ดูสินค้า </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>
    </div>


    <!-- สินค้าแนะนำ -->
    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center"><span>สินค้าแนะนำ</span></h3>
        <div class="container">
            <div class="row xsResponse categoryProduct">
                <?php foreach($recommend as $pro_rand) {
                    ?>
                    <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <div class="imageHover imageHoverFlip">
                                <a href="<?= site_url('fontend/Home/product_show/'.$pro_rand['product_ID']) ?>"><img
                                        src="<?php echo base_url('assets/Photo_Product/' . $pro_rand['product_Picture_1']); ?>" alt="img"
                                        class="img-responsive primaryImage">
                                    <img src="<?php echo base_url('assets/Photo_Product/' . $pro_rand['product_Picture_2']); ?>" alt="img"
                                         class="img-responsive secondaryImage"></a>
                            </div>
                            <div class="description">
                                <h4><?=$pro_rand['product_Name']; ?> </a></h4>

                                <div class="action-control"><a class="btn btn-primary" href="<?= site_url('fontend/Home/product_show/'.$pro_rand['product_ID']) ?>"> <span class="add2cart"><i
                                                class="glyphicon glyphicon-shopping-cart"> </i> ดูสินค้า </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>
        <!--/.container-->
    </div>
</div>






