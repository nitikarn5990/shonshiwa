<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
</script>

<div class="x_title">
    <h2>จัดการรางงานสินค้า</h2>
</div>

<div class="x_content">

    <!-- เพิ่มประเภทสินค้า -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มประเภทสินค้า</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">?</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" action="add_product_type/" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="product_type_Name" name="product_type_Name" type="text" placeholder="กรุณากรอก">
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
    <!-- /เพิ่มประเภทสินค้า -->

    <!-- แก้ไขประเภทสินค้า -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="update_product_type/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="edit_product_type_ID" name="edit_product_type_ID">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_product_type_Name" name="edit_product_type_Name" type="text"  placeholder="กรุณากรอก">
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
    <!-- /แก้ไขประเภทสินค้า -->

    <!-- เปลี่ยนสถานะ -->
    <div class="modal fade ChangeStatus" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">เปลี่ยนสถานะใบสั่งซื้อ</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="update_product_type/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="edit_product_type_ID" name="edit_product_type_ID">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">คุณแน่ใจหรือไม่ว่าต้องการจะยกเลิกใบสั่งสินค้านี้</label>
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

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_type" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">เวลา</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">วันที่</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">รหัสใบสั่งซื้อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">จำนวน</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">ราคา</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><center><span style="text-align:center">สถานะของสินค้า</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><center><span style="text-align:center">ดำเนินการ</span></center></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <tr class="pointer odd">
                <td class=" "><span style="text-align:center">เวลา</span></td>
                <td class=" "><span style="text-align:center">วันที่</span></td>
                <td class=" "><span style="text-align:center">รหัสใบสั่งซื้อ</span></td>
                <td class=" "><span style="text-align:center">จำนวน</span></td>
                <td class=" "><span style="text-align:center">ราคา</span></td>
                <td class=" last ">
                    <center><span class="label label-default">รอยืนยันการโอนเงิน</span></center>
                </td>
                <td class=" ">
                    <center>
                        <a href="#" class="btn btn-primary btn-small " data-toggle="modal" data-target="#ChangeStatus">
                            เปลี่ยนสถานะ &nbsp; <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </center>
                </td>
            </tr>
            <tr class="pointer odd">
                <td class=" "><span style="text-align:center">เวลา</span></td>
                <td class=" "><span style="text-align:center">วันที่</span></td>
                <td class=" "><span style="text-align:center">รหัสใบสั่งซื้อ</span></td>
                <td class=" "><span style="text-align:center">จำนวน</span></td>
                <td class=" "><span style="text-align:center">ราคา</span></td>
                <td class=" last ">
                    <center><span class="label label-info">โอนเงินแล้ว</span></center>
                </td>
                <td class=" ">
                    <center>
                        <a href="#" class="btn btn-primary btn-small " data-toggle="modal" data-target="#Investigate">
                            ตรวจสอบการโอน &nbsp; <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </center>
                </td>
            </tr>
            <tr class="pointer odd">
                <td class=" "><span style="text-align:center">เวลา</span></td>
                <td class=" "><span style="text-align:center">วันที่</span></td>
                <td class=" "><span style="text-align:center">รหัสใบสั่งซื้อ</span></td>
                <td class=" "><span style="text-align:center">จำนวน</span></td>
                <td class=" "><span style="text-align:center">ราคา</span></td>
                <td class=" last ">
                    <center><span class="label label-success">เสร็จสิ้น</span></center>
                </td>
                <td class=" ">
                    <center>
                        <a href="#" class="btn btn-primary btn-small " data-toggle="modal" data-target="#ChangeFinish">
                            เปลี่ยนสถานะ &nbsp; <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </center>
                </td>
            </tr>
            <tr class="pointer odd">
                <td class=" "><span style="text-align:center">เวลา</span></td>
                <td class=" "><span style="text-align:center">วันที่</span></td>
                <td class=" "><span style="text-align:center">รหัสใบสั่งซื้อ</span></td>
                <td class=" "><span style="text-align:center">จำนวน</span></td>
                <td class=" "><span style="text-align:center">ราคา</span></td>
                <td class=" last ">
                    <center><span class="label label-danger">ยกเลิก</span></center>
                </td>
                <td class=" ">
                    <center>
                        <a href="#" class="btn btn-primary btn-small " data-toggle="modal" data-target="#ChangeCancle">
                            เปลี่ยนสถานะ &nbsp; <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </center>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>