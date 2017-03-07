<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#product').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1,2,6,7,9,10 ] }
            ]
        } );
        
        $('#product_type_ID').change(function(){
            $.post('<?=base_url('backoffice/admin/ajax_product_type/')?>/'+$(this).val(),function(data){
                var data = $.parseJSON(data);
                var select = '';
                $.each(data.result,function(i,d){
                    select += '<option value="'+ d.product_group_ID +'">'+ d.product_group_Name+'</option>';
                });
                $('#product_group_ID').html(select);
            });
        });
    } );

    function changeStatus(product_ID, product_Status) {
        var send = {
            "product_ID": product_ID,
            "product_Status": product_Status

        };
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_product",
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

    function edit_product(product_ID)
    {
        var send = {"product_ID": product_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_product_byID",
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
                        $("#edit_product_ID").val(product_ID);
                        $("#edit_product_Name").val(value.product_Name);
                        $("#edit_product_type_ID option[value='" + value.product_type_ID + "']").attr("selected", true);
                        $("#edit_product_group_ID option[value='" + value.product_group_ID + "']").attr("selected", true);
                        $("#edit_meansurement option[value='" + value.meansurement + "']").attr("selected", true);

                        $("#edit_product_Detail").val(value.product_Detail);
                    });
                }
            }
        });
    }

    function delete_product(product_ID,product_Picture_1,product_Picture_2)
    {
        var send = {
            "product_ID": product_ID,
            "product_Picture_1": product_Picture_1,
            "product_Picture_2": product_Picture_2
        };
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/delete_product",
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

    function edit_pic1(product_ID)
    {
        var send = {"product_ID": product_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/data_edit_pic1",
            type: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
//                console.log(data);return false;
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_product_ID1").val(value.product_ID);
                        $("#name_pic1").val(value.product_Picture_1);

                        $("#edit_product_Picture_11").attr('src','<?php echo base_url('assets/Photo_Product')?>/'+value.product_Picture_1);
                    });
                }
            }
        });
    }

    function edit_pic2(product_ID)
    {
        var send = {"product_ID": product_ID}
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/data_edit_pic2",
            type: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
//                console.log(data);return false;
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_product_ID2").val(value.product_ID);
                        $("#name_pic2").val(value.product_Picture_2);

                        $("#edit_product_Picture_2").attr('src','<?php echo base_url('assets/Photo_Product')?>/'+value.product_Picture_2);
                    });
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
            data: {type:'pro',id:id},

            success: function(data)
            {
//                console.log(data);
                if(data !== "")
                {
                    $("#product_ID").val(id);

                    $(".CheckDel #parent").text(data);
                    $(".CheckDel").modal('show');

                }
            }
        });
    }

    function NumOnly(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }
</script>
<div class="x_title">
    <h2>จัดการสินค้า</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

    <!-- เพิ่มสินค้า -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มสินค้า</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="add_product/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อสินค้า</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="product_Name" name="product_Name" type="text" placeholder="กรุณากรอก" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_type_ID" name="product_type_ID" >
                                        <option value="">-- เลือกประเภทสินค้า --</option>
                                        <?php
                                        foreach($data_product_type as $type)
                                        {
                                            echo "<option value=\"" . $type['product_type_ID'] . "\">" .$type['product_type_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">กลุ่มสินค้า</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_group_ID" name="product_group_ID" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>
                                        <?php
                                        foreach($data_product_group as $group)
                                        {
                                            echo "<option value=\"" . $group['product_group_ID'] . "\">" .$group['product_group_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12"></div>
                                <div class="col-md-2 col-sm-2">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">สูง</label></center>
                                </div>
                                <div class="col-md-1 col-sm-1"></div>
                                <div class="col-md-2 col-sm-2">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">ฐาน</label></center>
                                </div>
                                <div class="col-md-1 col-sm-1"></div><div class="col-md-2 col-sm-2">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">ลึก</label></center>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ขนาด</label>
                                <div class="col-md-2 col-sm-2">
                                    <input class="form-control col-md-7 col-xs-3 required" id="high" name="high" type="text" OnKeyPress="return NumOnly(this)">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">x</label></center>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input class="form-control col-md-7 col-xs-3 required" id="base" name="base" type="text" OnKeyPress="return NumOnly(this)">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">x</label></center>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input class="form-control col-md-7 col-xs-3 required" id="Deep" name="Deep" type="text" OnKeyPress="return NumOnly(this)">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">หน่วยวัด</label>

                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="meansurement" name="meansurement" required >
                                        <option value="มิลลิเมตร">มิลลิเมตร</option>
                                        <option value="เซนติเมตร">เซนติเมตร</option>
                                        <option value="นิ้ว">นิ้ว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคา</label>
                                <div class="col-md-6 col-sm-6 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="product_sap_Price" name="product_sap_Price" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">บาท</label></center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">รายละเอียด</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <textarea class="form-control" rows="3" name="product_Detail" id="product_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">รูปภาพหลัก</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="product_Picture_1" id="product_Picture_1" accept="Photo_Product/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">รูปภาพรอง</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="product_Picture_2" id="product_Picture_2" accept="Photo_Product/*">
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
    <!-- /เพิ่มสินค้า -->
    </br></br></br>
    <!-- ล้างข้อมูลการเข้าชมสินค้า -->
    <button type="button" class="btn btn-round btn-danger pull-right" data-toggle="modal" data-target=".ClearClick">ล้างข้อมูลการเข้าชมสินค้า</button>
    <div class="modal fade ClearClick" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">ล้างข้อมูลการเข้าชมสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="del_click_pop/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label>คุณแน่ใจหรือว่าต้องการล้างข้อมูลการดูสินค้าทั้งหมด</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /ล้างข้อมูลการเข้าชมสินค้า -->
    </br>&nbsp;</br>&nbsp;

    <!-- แก้ไขสินค้า -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="update_product/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="edit_product_ID" name="edit_product_ID">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_product_Name" name="edit_product_Name" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="edit_product_type_ID" name="edit_product_type_ID" >
                                        <option value="">-- เลือกประเภทสินค้า --</option>
                                        <?php
                                        foreach($data_product_type as $type)
                                        {
                                            echo "<option value=\"" . $type['product_type_ID'] . "\">" .$type['product_type_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">กลุ่มสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="edit_product_group_ID" name="edit_product_group_ID" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>
                                        <?php
                                        foreach($data_product_group as $group)
                                        {
                                            echo "<option value=\"" . $group['product_group_ID'] . "\">" .$group['product_group_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หน่วยวัดของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="edit_meansurement" name="edit_meansurement" required >
                                        <option value="มิลลิเมตร">มิลลิเมตร</option>
                                        <option value="เซนติเมตร">เซนติเมตร</option>
                                        <option value="นิ้ว">นิ้ว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="edit_product_Detail" id="edit_product_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
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
    <!-- /แก้ไขสินค้า -->

    <!-- แก้ไขรูปภาพหลัก -->
    <div class="modal fade edit-pic1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพหลัก</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic1/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <center>
                                        <label class="col-md-12">รูปภาพหลักของสินค้า</label></br>
                                        <input type="hidden" id="edit_product_ID1" name="edit_product_ID1" />
                                        <input type="hidden" id="name_pic1" name="name_pic1" /></br>
                                        <img id="edit_product_Picture_11" style="width: 200px;" src="<?php echo base_url()?>assets/Photo_Product/product_Picture_1" alt=""></br>&nbsp;</br>
                                        <input class="btn btn-primary" type="file" name="edit_product_Picture_11" id="edit_product_Picture_11" accept="Photo_Product/*"></br>
                                    </center>
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
    <!-- /แก้ไขรูปภาพหลัก -->

    <!-- แก้ไขรูปภาพรอง -->
    <div class="modal fade edit-pic2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพรอง</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic2/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <center>
                                        <label class="col-md-12">รูปภาพรองของสินค้า</label></br>
                                        <input type="hidden" id="edit_product_ID2" name="edit_product_ID2" />
                                        <input type="hidden" id="name_pic2" name="name_pic2" /></br>
                                        <img id="edit_product_Picture_2" style="width: 200px;" src="<?php echo base_url()?>assets/Photo_Product/product_Picture_2" alt=""></br>&nbsp;</br>
                                        <input class="btn btn-primary" type="file" name="edit_product_Picture_2" id="edit_product_Picture_2" accept="Photo_Product/*"></br>
                                    </center>
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
    <!-- /แก้ไขรูปภาพรอง -->

    <!-- ลบประเภทสินค้า -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_product/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="del_product_ID" id="del_product_ID">
                                <input type="hidden" name="del_product_Picture_1" id="del_product_Picture_1">
                                <input type="hidden" name="del_product_Picture_2" id="del_product_Picture_2">

                                <label>คุณแน่ใจหรือว่าต้องการลบสินค้านี้</label>
                                <label>(การลบข้อมูลนี้อาจทำให้เกิดการ ERROR ของข้อมูลอื่นๆ)</label>

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
        <table id="product" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
                <tr class="headings" role="row">
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">ลำดับ</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">รูปภาพหลัก</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">รูปภาพรอง</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">ชื่อ</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">ประเภท</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">กลุ่ม</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">หน่วยวัด</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">ขนาด/ราคา</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">สถาณะ</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">แก้ไข</span></th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="example" style=""><span style="text-align:center">ลบ</span></th>
                </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_product as $key => $test){?>
            <tr class="pointer odd">
                <td><center><span style=""><?php echo $key+1; ?></span></center></td>
                <td>
                    <center>
                        <span style="text-align:center"><a href="#" onclick="edit_pic1('<?php echo $test['product_ID'] ?>');"><i data-toggle="modal" data-target=".edit-pic1"><img src="<?php echo base_url('assets/Photo_Product/'. $test['product_Picture_1']);?>" width="60" height="70"/></i></a></span>
                    </center>
                </td>
                <td>
                    <center>
                        <span style="text-align:center"><a href="#" onclick="edit_pic2('<?php echo $test['product_ID'] ?>');"><i data-toggle="modal" data-target=".edit-pic2"><img src="<?php echo base_url('assets/Photo_Product/'. $test['product_Picture_2']);?>" width="60" height="70"/></i></a></span>
                    </center>
                </td>
                <td><center><span style=""><?php echo $test['product_Name'];?></span></center></td>
                <td><center><span style=""><?php echo $test['product_type_Name'];?></span></center></td>
                <td><center><span style=""><?php echo $test['product_group_Name'];?></span></center></td>
                <td><center><span style=""><?php echo $test['meansurement'];?></span></center></td>
                <td><center><span style=""><a href="<?php echo base_url('backoffice/admin/product_sap/'.$test['product_ID']);?>" target="_blank" ><i class="fa fa-cogs" ></i></a></span></center></td>
                <td class=" last ">
                    <center>
                        <?php if($test['product_Status'] == 1){
                            $btn_color = "success";
                            $btn_tag = "Active";
                        }
                        else
                        {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $test['product_ID'] ?>', '<?php echo $test['product_Status']; ?>')"><?php echo $btn_tag;?></button>
                    </center>
                </td>
                <td><center><span style=""><a href="#" onclick="edit_product('<?php echo $test['product_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></center></td>
                <td><center><span style=""><a href="#" onclick="delete_product('<?php echo $test['product_ID'] ?>', '<?php echo $test['product_Picture_1']; ?>', '<?php echo $test['product_Picture_2']; ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span></center></td>
            </tr>
            <?php }?>

            </tbody>

        </table>
    </div>
</div>