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
    <style>
        .pagination strong{
            padding: 8px 16px;
            border: 1px solid #ccc;
            background: #f7b529;
            color: white ;
        }

        .pagination a {
            padding: 8px 16px;

            border: 1px solid #ccc;
            background: #FFF;
            color: black;
            transition: none;


        }

        .pagination a:hover {
            padding: 8px 16px;

            border: 1px solid #ccc;
            background: #ddd;
            color: black;
        }

        .pagination  a:active {
            padding: 8px 16px;

            border: 1px solid #ccc;
            background: #FFF;
            color: black;
        }
    </style>

</head>
<body>
<div class="container main-container headerOffset">

    <div class="row">

        <!-- แถบ side-bar -->
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="panel-group" id="accordionNo">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseCategory" class="collapseWill active ">
                                <span class="pull-left"><i class="fa fa-caret-right"></i></span> ประเภทสินค้า
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCategory" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked tree">
                                <!-- ทำตรงนี้เป็นloopดึงประเภท กับ กลุ่ม สินค้ามาโชว์ -->
                                <?php
                                foreach($data_type as $type){
                                    ?>
                                    <li class="dropdown-tree"><a class="dropdown-tree-a" href="<?php echo site_url('fontend/Home/product_category_type/'.$type['product_type_ID'])?>"><?=$type['product_type_Name']; ?> </a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.เมนูประเภทสินค้า -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseCategory2" class="collapseWill not-active">
                                <span class="pull-left"><i class="fa fa-caret-right"></i></span> กลุ่มสินค้า
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCategory2" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked tree">
                                <?php foreach($data_type as $t) {
                                $tid = $t['product_type_ID'];
                                ?>
                                <li class="active dropdown-tree open-tree"><a class="dropdown-tree-a"><?= $t['product_type_Name'] ?> </a>
                                    <ul class="category-level-2 dropdown-menu-tree">
                                        <?php foreach($data_group as $g) {
                                            $pid = $g['product_type_ID'];
                                            if($tid == $pid){
                                                ?>
                                                <li class="dropdown-tree">
                                                    <a class="dropdown-tree-a" href="<?= site_url('fontend/Home/product_category_group/'.$g['product_group_ID'])?>">
                                                        <?php
                                                        echo $g['product_group_Name'];
                                                        ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.เมนูกลุ่มสินค้า -->

            </div>
        </div>
        <!-- /.แถบ side-bar -->

        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">

            <div class="w100 productFilter clearfix">
                <p class="pull-left"> มีสินค้า <strong><?php echo $data_num_type;?></strong> รายการ </p>

                <div class="pull-right ">
                    <div class="change-view pull-right">
                        <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i></a>
                        <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a>
                    </div>
                </div>
            </div>
            <div class="row  categoryProduct xsResponse clearfix">
                <?php
                foreach($data_p_type as $key => $pro) {?>
                    <div class="item itemauto col-sm-4 col-lg-4 col-md-4 col-xs-6">
                        <div class="product">
                            <div class="imageHover imageHoverFlip">
                                <img src="<?php echo base_url('assets/Photo_Product/' . $pro['product_Picture_1']); ?>"alt="img" class="img-responsive primaryImage" width="260">
                                <img src="<?php echo base_url('assets/Photo_Product/' . $pro['product_Picture_2']); ?>"alt="img" class="img-responsive secondaryImage"width="260">
                            </div>
                            <div>
                                <h4> <?=$pro['product_Name']?></h4>
                            </div>
                            <div class="action-control"><a class="btn btn-primary" href="<?= site_url('fontend/Home/product_show/'.$pro['product_ID']) ?>">ดูสินค้า </a></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div align="center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
        <!--/right column end-->
    </div>
    <!-- /.row  -->
</div>
<!-- /main container -->

<div class="gap"></div>

</body>