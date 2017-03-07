<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>


<script>
     $(document).ready(function ()
     {
        $('#report_list').dataTable({
             "ordering": false
        });
     });

    function Investigate(product_report_ID)
    {
        var send = {"product_report_ID": product_report_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_id_report",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        if (data)
                        {
//                    console.log(data);
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_report_ID").val(value.product_report_ID);
                                $("#product_report_MoneyPic1").attr('src', '<?php echo base_url('assets/pic_report') ?>/' + value.product_report_MoneyPic);

                            });
                        }
                    }
                });
    }

     var link_print = "<?=base_url('backoffice/admin/report_print/')?>/";
    function Preparation(product_report_ID)
    {

        link_print = link_print + product_report_ID;


        $("#report_print").attr("href", link_print);



        var send = {"product_report_ID": product_report_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_id_report",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        if (data)
                        {
//                    console.log(data);
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_report_ID2").val(value.product_report_ID);

                            });
                        }
                    }
                });
    }

    function ChangeStatus(product_report_ID)
    {
        var send = {"product_report_ID": product_report_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_id_report",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        if (data)
                        {
//                    console.log(data);
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_report_ID1").val(value.product_report_ID);

                            });
                        }
                    }
                });
    }

    function ConfirmTransport(product_report_ID)
    {
        var send = {"product_report_ID": product_report_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_id_report",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        if (data)
                        {
//                    console.log(data);
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_report_ID3").val(value.product_report_ID);

                            });
                        }
                    }
                });
    }

    function EditTransport(product_report_ID)
    {
        var send = {"product_report_ID": product_report_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_id_report",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        if (data)
                        {
//                    console.log(data);
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_report_ID4").val(value.product_report_ID);
                                $("#product_report_TranspoPic1").val(value.product_report_TranspoPic);

                            });
                        }
                    }
                });
    }

    function ChangeCancle(product_report_ID)
    {
        var send = {"product_report_ID": product_report_ID};
        $.ajax

            ({
                url: "<?php echo base_url() ?>backoffice/admin/get_id_report",
                method: "POST",
                data: send,
                dataType: "json",
                success: function (data)
                {
                    if (data)
                    {
//                    console.log(data);
                        $("#modal-sizes-3").modal('show');
                        $.each(data, function (key, value)
                        {
                            $("#product_report_ID5").val(value.product_report_ID);

                        });
                    }
                }
            });
    }

</script>

<div class="x_title">
    <h2>จัดการรายการสั่งซื้อสินค้า</h2>
</div>

<div class="x_content">
    <!-- ยกเลิกใบสั่งซื้อ -->
    <div class="modal fade ChangeStatus" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">เปลี่ยนสถานะใบสั่งซื้อ</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="ChangeStatus/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="product_report_ID1" name="product_report_ID1">
                                <label>คุณแน่ใจหรือไม่ว่าต้องการจะยกเลิกใบสั่งสินค้านี้</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ยืนยันการเปลี่ยนแปลง</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ตรวจสอบ -->
    <div class="modal fade Investigate" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ตรวจสอบการโอนเงิน</h4>
                </div>
                <form class="form-inline" action="Investigate/" method="post">
                    <center>
                        <div class="modal-body">
                            <h2><center>รูปยืนยันการส่งของ</center></h2>
                            <input type="hidden" id="product_report_ID" name="product_report_ID">
                            <input type="hidden" id="product_report_MoneyPic" name="product_report_MoneyPic">
                            <div class="form-group">
                                <label>รูปภาพหลักฐานการโอนเงิน</label>
                                <div>
                                    <span style="text-align:center"><img id="product_report_MoneyPic1" width="250" height="250"></span>
                                </div>
                                <label class="radio inline">
                                    <input id="ConfirmStatus" type="radio" value="1" name="ConfirmStatus"> ผ่านการตรวจสอบ
                                </label>&nbsp;&nbsp;
                                <label class="radio inline">
                                    <input id="CanclStatuse" type="radio" value="2" name="ConfirmStatus"> ไม่ผ่านการตรวจสอบ
                                </label>
                            </div>
                        </div>
                    </center>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- จัดเตรียมสินค้า -->
    <div class="modal fade Preparation" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการเตรียมสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="Preparation/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">พิมพ์ใบรายงานสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="product_report_ID2" name="product_report_ID2">

                                    <a href="" id="report_print" class="btn btn-primary" target="_blank">พิมพ์</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- หลักฐานการส่งสินค้า -->
    <div class="modal fade ConfirmTransport" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการส่งสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="ConfirmTransport/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพยืนยันการส่งสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="product_report_ID3" name="product_report_ID3">

                                    <input class="btn btn-primary" type="file" name="product_report_TranspoPic" id="product_report_TranspoPic" accept="image/*" required="required">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- แก้ไขการส่งสินค้า -->
    <div class="modal fade EditTransport" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขการส่งสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="EditTransport/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพการส่งสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="product_report_ID4" name="product_report_ID4">
                                    <input type="hidden" id="product_report_TranspoPic1" name="product_report_TranspoPic1">

                                    <input class="btn btn-primary" type="file" name="product_report_TranspoPic" id="product_report_TranspoPic" accept="image/*">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ยกเลิกการยกเลิกใบสั่งซื้อ -->
    <div class="modal fade ChangeCancle" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">เปลี่ยนสถานะใบสั่งซื้อ</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="ChangeCancle/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label>คุณแน่ใจหรือไม่ว่าต้องการจะยกเลิกการสั่งยกเลิกใบสั่งสินค้านี้</label>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="product_report_ID5" name="product_report_ID5">
                                <button type="submit" class="btn btn-primary">ยืนยันการเปลี่ยนแปลง</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="report_list" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">รหัสใบสั่งซื้อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">เวลา</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">วันที่</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">ราคา</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><center><span style="text-align:center">สถานะของสินค้า</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><center><span style="text-align:center">ดำเนินการ</span></center></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php
            foreach ($data_order as $order) {
                list($day, $time) = explode(" ", $order['product_report_DateTime']);
                ?>

                <tr class="pointer odd">
                    <td class=" "><a href="<?php echo base_url('backoffice/admin/report_show/'.$order['product_report_ID']);?>" target="_blank"><span style="text-align:center" ><?= $order['product_report_ID'] ?></span></a></td>
                    <td class=" "><span style="text-align:center"><?= $time ?></span></td>
                    <td class=" "><span style="text-align:center"><?= $day ?></span></td>
                    <td class=" "><span style="text-align:center"><?= $order['product_report_Discountprice'] ?></span></td>
                    <td class=" last ">
                        <?php
                        if ($order['product_report_Status'] == 1) {
                            $btn_color = "gray";
                            $btn_tag = "รอยืนยันการโอนเงิน";
                        } elseif ($order['product_report_Status'] == 2) {
                            $btn_color = "blue";
                            $btn_tag = "รอการตรวจสอบการโอนเงิน";
                        } elseif ($order['product_report_Status'] == 3) {
                            $btn_color = "blue";
                            $btn_tag = "รอการจัดเตรียมสินค้า";
                        } elseif ($order['product_report_Status'] == 4) {
                            $btn_color = "blue";
                            $btn_tag = "รอการจัดส่งสินค้า";
                        } elseif ($order['product_report_Status'] == 5) {
                            $btn_color = "green";
                            $btn_tag = "ส่งสินค้าเรียบร้อยแล้ว";
                        } else {
                            $btn_color = "red";
                            $btn_tag = "ยกเลิกรายการ";
                        }
                        ?>
                        <center><font color="<?=$btn_color?>"><?=$btn_tag?></font></center>
                    </td>
                    <td class=" ">
                        <?php
                        if ($order['product_report_Status'] == 1) {
                            ?>
                            <center>
                                <button type="button" onclick="ChangeStatus('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small" data-toggle="modal" data-target=".ChangeStatus">เปลี่ยนสถานะ
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </center>
                            <?php
                        } elseif ($order['product_report_Status'] == 2) {
                            ?>
                            <center>
                                <button type="button" onclick="Investigate('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small" data-toggle="modal" data-target=".Investigate">ตรวจสอบการโอนเงิน
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </center>
                            <?php
                        } elseif ($order['product_report_Status'] == 3) {
                            ?>
                            <center>
                                <button type="button" onclick="Preparation('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small" data-toggle="modal" data-target=".Preparation">ยืนยันการส่งของ
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </center>
                            <?php
                        } elseif ($order['product_report_Status'] == 4) {
                            ?>
                            <center>
                                <button type="button" onclick="ConfirmTransport('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small" data-toggle="modal" data-target=".ConfirmTransport">ยืนยันการส่งของ
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </center>
                            <?php
                        } elseif ($order['product_report_Status'] == 5) {
                            ?>
                            <center>
                                <button type="button" onclick="EditTransport('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small" data-toggle="modal" data-target=".EditTransport">แก้ไขใบส่งสินค้า
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </center>
                            <?php
                        } elseif ($order['product_report_Status'] == 6) {
                            ?>
                            <center>
                                <button type="button" onclick="ChangeCancle('<?php echo $order['product_report_ID'] ?>')" class="btn btn-primary btn-small" data-toggle="modal" data-target=".ChangeCancle">เปลี่ยนสถานะ
                                    <i class="fa fa-arrow-circle-right"></i></button>
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
</div>
