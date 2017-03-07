<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
    $(document).ready( function () {
      //  $('#product_type').DataTable();

        $('#product_type').dataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3,4 ] }
            ]
        } );
    } );

    function edit_product_type(product_type_ID)
    {
        var send = {"product_type_ID": product_type_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_product_type_byID",
            method: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_product_type_ID").val(product_type_ID);
                        $("#edit_product_type_Name").val(value.product_type_Name);
                    });
                }
            }
        });
    }

    function changeStatus(product_type_ID, product_type_Status) {
        var send = {
            "product_type_ID": product_type_ID,
            "product_type_Status": product_type_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_type",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    location.reload();
//
                }
            }
        })
    }

    function chk_group_pro(product_type_ID,product_type_Status)
    {
        var send = {"product_type_ID": product_type_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/chk_group_pro",
            method: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#aaaaa").val(product_type_ID);
                        $("#str").val(product_type_Status);
                        $("#hnum_group").val(value.num_group);
                        $("#hnum_pro").val(value.num_pro);
                        $("#num_group").text(value.num_group);
                        $("#num_pro").text(value.num_pro);
                    });
                }
            }
        });
    }

    function show_parent(id)
    {
       // var send = {"product_type_ID": product_type_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/chk_group_pro",
            method: "POST",
            data: {type:'type',id:id},

            success: function(data)
            {
//                console.log(data);
                if(data !== "")
                {
                    $(".CheckChange #parent").text(data);
                    $(".CheckChange").modal('show');

                }
            }
        });
    }

    function show_parent_del(id)
    {
        // var send = {"product_type_ID": product_type_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/parent_count",
            method: "POST",
            data: {type:'type',id:id},

            success: function(data)
            {
//                console.log(data);
                if(data !== "")
                {
                    $("#product_type_ID").val(id);
                    $(".CheckDel #parent").text(data);
                    $(".CheckDel").modal('show');

                }
            }
        });
    }
</script>
<div class="x_title">
    <h2>จัดการประเภทสินค้า</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>
    <!-- เพิ่มประเภทสินค้า -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มประเภทสินค้า</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
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
                                    <input class="form-control col-md-7 col-xs-12 required" required="required" id="product_type_Name" name="product_type_Name" type="text" placeholder="กรุณากรอก">
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
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
                                    <input class="form-control col-md-7 col-xs-12 required" required="required" id="edit_product_type_Name" name="edit_product_type_Name" type="text"  placeholder="กรุณากรอก">
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

    <!-- สถานะประเภทสินค้า -->
    <div class="modal fade CheckChange" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการเปลี่ยนสถานะประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="update_str_product_type/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" name="aaaaa" id="aaaaa">
                                <input type="hidden" name="str" id="str">
                                <input type="hidden" name="hnum_group" id="hnum_group">
                                <input type="hidden" name="hnum_pro" id="hnum_pro">
                                    มีกลุ่มทั้งหมด <label  id="num_group" ></label> กลุ่ม และมีสินค้าทั้งหมด  <label  id="num_pro"> </label>  รายการในประเภทนี้
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">เปลี่ยนสถาณะ</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /สถานะประเภทสินค้า -->

    <!-- ลบประเภทสินค้า -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_product_type/" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="product_type_ID" id="product_type_ID">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <label>คุณแน่ใจหรือว่าต้องการลบประเภทสินค้านี้</label>
                                <label>(การลบข้อมูลนี้อาจทำให้เกิดการ ERROR ของข้อมูลอื่นๆ)</label>
                                <label id="parent"></label>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ลบ</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /ลบประเภทสินค้า -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_type" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="60%"><span>ชื่อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถาณะ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>แก้ไข</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลบ</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">

            <?php foreach($data_product_type as $key => $type) { ?>
                <tr class="pointer odd">
                    <td class=" "><span style="text-align:center"><?php echo $key + 1; ?></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $type['product_type_Name']; ?></span></td>
                    <td class=" last ">
                        <?php
                        if ($type['product_type_Status'] == 1) {
                            $btn_color = "success";
                            $btn_tag = "Active";
                        } else {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" data-toggle="modal" data-target=".CheckChange" class="btn btn-<?php echo $btn_color; ?> btn-xs" id="stt_emp" onclick="chk_group_pro('<?php echo $type['product_type_ID'] ?>', '<?php echo $type['product_type_Status']; ?>')"><?php echo $btn_tag; ?></button>
                    </td>
                    <td><span style="text-align:center"><a href="#"
                                                           onclick="edit_product_type('<?php echo $type['product_type_ID']; ?>');"><i
                                    class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span>
                    </td>
                    <td>
                        <span style="text-align:center"><a href="#" onclick="show_parent_del('<?php echo $type['product_type_ID']; ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>