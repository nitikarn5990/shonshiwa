<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
    $(document).ready( function () {
        $('#product_sap').DataTable();
    } );

    function changeStatus(product_sap_ID, product_sap_Status) {
        var send = {
            "product_sap_ID": product_sap_ID,
            "product_sap_Status": product_sap_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_sap",
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


    function edit_sap(product_sap_ID)
    {
        var send = {"product_sap_ID": product_sap_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_sap_byID",
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
                        $("#edit_product_sap_ID").val(product_sap_ID);
                        $("#e_high").val(value.high);
                        $("#e_base").val(value.base);
                        $("#e_Deep").val(value.Deep);
                        $("#edit_product_sap_Price").val(value.product_sap_Price);
                    });
                }
            }
        });
    }

    function delete_sap(product_ID)
    {
        var send = {
            "product_ID": product_ID
        };
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_sap_byID",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#d_product_sap_ID").val(product_sap_ID);
                    });
                }
            }
        })
    }

</script>
<div class="x_title">
    <h2>จัดการขนาดและราคาของสินค้า</h2>
</div>
<?php echo $this->session->flashdata('msg'); ?>
<div class="x_content">
    <!-- เพิ่มขนาดและราคาของสินค้า -->
    <?php foreach($data_sap as $key => $sap)
    {
       $p_name = $sap['product_Name'];
       $p_meansurement = $sap['meansurement'];
       $p_id = $sap['product_ID'];
    }
    ?>
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_sap/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="d_product_sap_ID" id="d_product_sap_ID">

                                <label>คุณแน่ใจหรือว่าต้องการลบข้อมูลนี้</label>
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
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มขนาดและราคาของสินค้าของ<?php echo $p_name;?></button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มขนาดและราคาของสินค้าของ<?php echo $p_name;?></h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="<?=base_url('backoffice/admin/add_sap')?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อของสินค้า</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <label class="control-label"><?php echo $p_name;?></label>
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
                                    <label class="control-label"><?php echo $p_meansurement;?></label>
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
                            <input type="hidden" value="<?=$p_id?>" id="product_ID" name="product_ID">

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
    <!-- /เพิ่มขนาดและราคาของสินค้า -->

    <!-- แก้ไขขนาดและราคาของสินค้าา -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขกลุ่มสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="<?=base_url('backoffice/admin/update_sap')?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อสินค้า</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <label class="control-label"><?php echo $p_name;?></label>
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
                                    <input class="form-control col-md-7 col-xs-3 required" id="e_high" name="e_high" type="text" OnKeyPress="return NumOnly(this)">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">x</label></center>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input class="form-control col-md-7 col-xs-3 required" id="e_base" name="e_base" type="text" OnKeyPress="return NumOnly(this)">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">x</label></center>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <input class="form-control col-md-7 col-xs-3 required" id="e_Deep" name="e_Deep" type="text" OnKeyPress="return NumOnly(this)">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">หน่วยวัด</label>
                                <div class="col-md-8 col-sm-8 col-xs-9">
                                    <label class="control-label"><?php echo $p_meansurement;?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคา</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_product_sap_Price" name="edit_product_sap_Price" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <center><label class="control-label col-md-3 col-sm-3 col-xs-12">บาท</label></center>
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
    <!-- /แก้ไขขนาดและราคาของสินค้า -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_sap" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ขนาดของสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ราคาของสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">สถาณะของขนาดและราคาสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">แก้ไขขนาดและราคาของสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">ลบขนาดและราคาของสินค้า</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_sap as $key => $sap){?>
            <tr class="pointer odd">
                <td class=" "><span style="text-align:center"><?php echo $key+1; ?></span></td>
                <td class=" "><span style="text-align:center"><?php echo $sap['product_sap_Size']." ".$sap['meansurement'];?></span></td>
                <td class=" "><span style="text-align:center"><?php echo $sap['product_sap_Price'];?></span></td>
                <td class=" last ">
                    <?php if($sap['product_sap_Status'] == 1){
                        $btn_color = "success";
                        $btn_tag = "Active";
                    }
                    else
                    {
                        $btn_color = "danger";
                        $btn_tag = "UnActive";
                    }
                    ?>
                    <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $sap['product_sap_ID'] ?>', '<?php echo $sap['product_sap_Status']; ?>')"><?php echo $btn_tag;?></button>
                </td>
                <td><span style="text-align:center"><a href="#" onclick="edit_sap('<?php echo $sap['product_sap_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                <td><span style="text-align:center"><a href="#" onclick="delete_sap('<?php echo $sap['product_sap_ID'] ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>




























