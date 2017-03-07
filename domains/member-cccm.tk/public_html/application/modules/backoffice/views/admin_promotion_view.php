<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#promotion').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1,4,8,9 ] }
            ]
        } );
    } );

    function changeStatus(promotion_ID, promotion_Status) {
        var send = {
            "promotion_ID": promotion_ID,
            "promotion_Status": promotion_Status

        };
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_promotion_byID",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                if(data)
                {
                    console.log(data);

                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {

                        $("#promotion_ID0").val(promotion_ID);
                        $("#promotion_Status0").val(promotion_Status);

                    });
                }
            }
        });
    }

    function edit_pmt(promotion_ID)
    {
        var send = {"promotion_ID": promotion_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_promotion_byID",
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
                        $("#edit_promotion_ID").val(promotion_ID);
                        $("#promotion_Title1").val(value.promotion_Title);
                        $("#promotion_Condition1").val(value.promotion_Condition);
                        $("#promotion_Discount1").val(value.promotion_Discount);
                        $("#promotion_Start1").val(value.promotion_Start);
                        $("#promotion_End1").val(value.promotion_End);
                        $("#promotion_Detail1").val(value.promotion_Detail);

                    });
                }
            }
        });
    }

    function del_pmt(promotion_ID)
    {
        var send = {"promotion_ID": promotion_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_promotion_byID",
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
                        $("#promotion_ID2").val(promotion_ID);

                    });
                }
            }
        })
    }

    function edit_pic_pmt(promotion_ID)
    {
        var send = {"promotion_ID": promotion_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/data_edit_pic_promotion",
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
                        $("#promotion_ID").val(value.promotion_ID);
                        $("#promotion_Picture0").val(value.promotion_Picture);

                        $("#promotion_Picture1").attr('src','<?php echo base_url('assets/pic_promotion')?>/'+value.promotion_Picture);
                    });
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
    <h2>จัดการโปรโมชั่น</h2>
</div>

<div class="x_content">

    <?php echo $this->session->flashdata('msg'); ?>
    <!-- เพิ่มโปรโมชั้น -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มโปรโมชั้น</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มโปรโมชั้น</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" id="" action="add_promotion/" enctype="multipart/form-data">
                    <div class="modal-body">
                        
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Title" name="promotion_Title" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันที่เริ่ม</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Start" name="promotion_Start" type="date" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันที่สิ้นสุด</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_End" name="promotion_End" type="date" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เงื่อนไข</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Condition" name="promotion_Condition" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ส่วนลด</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Discount" name="promotion_Discount" type="text" placeholder="กรุณากรอก" maxlength="2" OnKeyPress="return NumOnly(this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="promotion_Detail" id="promotion_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพของโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="promotion_Picture" id="promotion_Picture" accept="image/*">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /เพิ่มโปรโมชั้น -->

    <!-- แก้ไขโปรโมชั้น -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลโปรโมชั้น</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" id="" action="update_promotion/" enctype="multipart/form-data">
                    <div class="modal-body">
                      
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="edit_promotion_ID" name="edit_promotion_ID">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Title1" name="promotion_Title1" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันที่เริ่ม</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Start1" name="promotion_Start1" type="date" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันที่สิ้นสุด</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_End1" name="promotion_End1" type="date" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เงื่อนไข</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Condition1" name="promotion_Condition1" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ส่วนลด</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="promotion_Discount1" name="promotion_Discount1" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="promotion_Detail1" id="promotion_Detail1" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                  
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /แก้ไขโปรโมชั้น -->

    <!-- แก้ไขรูปภาพหลัก -->
    <div class="modal fade edit-picpromo" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพหลัก</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic_pmt/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <center>
                                        <label class="col-md-12">รูปภาพของสินค้า</label></br>
                                        <input type="hidden" id="promotion_ID" name="promotion_ID">
                                        <input type="hidden" id="promotion_Picture0" name="promotion_Picture0"></br>
                                        <img id="promotion_Picture1" style="width: 200px;" src="<?php echo base_url()?>assets/pic_promotion/promotion_Picture" alt=""></br>&nbsp;</br>
                                        <input class="btn btn-primary" type="file" name="promotion_Picture1" id="promotion_Picture1" accept="image/*"></br>
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

    <!-- ลบประเภทสินค้า -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบโปรโมชั่น</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_promotion/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="promotion_ID2" id="promotion_ID2">

                                <label>คุณแน่ใจหรือว่าต้องการลบโปรโมชั่นนี้</label>
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

    <div class="modal fade CheckChange" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการเปลี่ยนสถานะโปรโมชั่น</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="update_status_promotion/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="promotion_ID0" name="promotion_ID0">
                                <input type="hidden" name="promotion_Status0" id="promotion_Status0">

                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-primary">เปลี่ยนสถาณะ</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /สถานะกลุ่มสินค้า -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="promotion" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="5%"><span>ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>รูปภาพ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="15%"><span>วันที่เริ่ม</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="15%"><span>วันที่จบ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="30%"><span>หัวข้อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><span>เงื่อนไข</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><span>ส่วนลด</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถาณะ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><span>แก้ไข</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><span>ลบ</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_promotion as $key => $promotion){?>
                <tr class="pointer odd">
                    <td class=" "><span style="text-align:center"><?php echo $key+1; ?></span></td>
                    <td class=" ">
                        <span style="text-align:center">
                            <a href="#" onclick="edit_pic_pmt('<?php echo $promotion['promotion_ID'] ?>');">
                                <i data-toggle="modal" data-target=".edit-picpromo">
                                    <img src="<?php echo base_url('assets/pic_promotion/'. $promotion['promotion_Picture']);?>" width="133" height="133">
                                </i>
                            </a>
                        </span>
                    </td>
                    <td class=" "><span style="text-align:center"><?php echo $promotion['promotion_Start'];?></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $promotion['promotion_End'];?></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $promotion['promotion_Title'];?></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $promotion['promotion_Condition'];?></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $promotion['promotion_Discount'];?> %</span></td>
                    <td class=" last ">
                        <?php if($promotion['promotion_Status'] == 1){
                            $btn_color = "success";
                            $btn_tag = "Active";
                        }
                        else
                        {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" data-toggle="modal" data-target=".CheckChange" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $promotion['promotion_ID'] ?>', '<?php echo $promotion['promotion_Status']; ?>')"><?php echo $btn_tag;?></button>
                    </td>
                    <td><span style="text-align:center"><a href="#" onclick="edit_pmt('<?php echo $promotion['promotion_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                    <td><span style="text-align:center"><a href="#" onclick="del_pmt('<?php echo $promotion['promotion_ID'] ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>