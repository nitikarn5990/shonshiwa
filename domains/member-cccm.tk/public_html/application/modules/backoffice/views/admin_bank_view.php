<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#bank').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1,4,6,7 ] }
            ]
        } );
    } );

    function NumOnly(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }

    function changeStatus(bank_ID, bank_Status)
    {
        var send = {
            "bank_ID": bank_ID,
            "bank_Status": bank_Status
        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_bank",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    location.reload();
                }
            }
        })
    }

    function edit_bank(bank_ID)
    {
        var send = {"bank_ID": bank_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_bank_byID",
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
                        $("#edit_bank_ID").val(bank_ID);
                        $("#edit_bank_Name").val(value.bank_Name);
                        $("#edit_bank_User").val(value.bank_User);
                        $("#edit_bank_Number").val(value.bank_Number);

                    });
                }
            }
        });
    }

    function del_bank(bank_ID)
    {
        var send = {"bank_ID": bank_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_bank_byID",
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
                        $("#bank_ID1").val(bank_ID);
                        $("#bank_Picture_del").val(value.bank_Picture);
                    });



                }
            }
        });
    }

    function edit_pic(bank_ID)
    {
        var send = {"bank_ID": bank_ID}
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_bank_byID",
            type: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
//                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_pic_bank_ID").val(value.bank_ID);
                        $("#edit_pic_bank_Picture").val(value.bank_Picture);

                        $("#data_pic").attr('src','<?php echo base_url('assets/pic_bank')?>/'+value.bank_Picture);
                    });
                }
            }
        });
    }

</script>

<div class="x_title">
    <h2>จัดการบัญชีธนาคาร</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

    <!-- เพิ่มบัญชีธนาคาร -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มบัญชีธนาคาร</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มบัญชีธนาคาร</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" id="" action="add_bank/" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อธนาคาร</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="bank_Name" name="bank_Name" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อบัญชี</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="bank_User" name="bank_User" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เลขบัญชี</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="bank_Number" name="bank_Number" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพของบัญชีธนาคาร</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="bank_Picture" id="bank_Picture" accept="image/*">
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
    <!-- /เพิ่มบัญชีธนาคาร -->

    <!-- แก้ไขบัญชีธนาคาร -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลบัญชีธนาคาร</h4>
                </div>
                <form class="form-horizontal form-label-left"  method="post" id="" action="edit_bank/" enctype="multipart/form-data">
                    <div class="modal-body">
                    
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อธนาคาร</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="edit_bank_ID" name="edit_bank_ID">
                                    <input class="form-control col-md-7 col-xs-12" required id="edit_bank_Name" name="edit_bank_Name" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อบัญชี</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="edit_bank_User" name="edit_bank_User" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เลขบัญชี</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12" required id="edit_bank_Number" name="edit_bank_Number" type="text" placeholder="กรุณากรอก">
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
    <!-- /แก้ไขบัญชีธนาคาร -->

    <!-- แก้ไขรูปภาพ -->
    <div class="modal fade edit-picpromo" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพ</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพ</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="promotion_ID" name="promotion_ID">
                                    <input type="hidden" id="promotion_Picture0" name="promotion_Picture0">
                                    <img id="promotion_Picture1" style="width: 50px;" src="" alt="">
                                    <input type="file" name="bank_Picture" id="bank_Picture" accept="image/*">
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
    <!-- /แก้ไขรูปภาพ -->

    <!-- ลบประเภทสินค้า -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบบัญชีธนาคาร</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_bank/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="bank_ID1" id="bank_ID1">
                                <input type="hidden" name="bank_Picture_del" id="bank_Picture_del">

                                <label>คุณแน่ใจหรือว่าต้องการลบบัญชีธนาคารนี้</label>
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

    <!-- แก้ไขรูปภาพ -->
    <div class="modal fade edit-pic" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพ</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic_bank_Picture/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <center>
                                            <label class="col-md-12">รูปภาพของธนาคาร</label></br>
                                            <input type="hidden" id="edit_pic_bank_Picture" name="edit_pic_bank_Picture">
                                            <input type="hidden" id="edit_pic_bank_Picture" name="edit_pic_bank_Picture"></br>
                                            <img id="data_pic" style="width: 200px;"></br>&nbsp;</br>
                                            <input class="btn btn-primary" type="file" name="edit_pic_bank_Picture1" id="edit_pic_bank_Picture1" accept="image/*"></br>
                                        </center>
                                    </div>
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
    <!-- /แก้ไขรูปภาพ -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="bank" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="2%"><span>ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="2%"><span>รูปภาพ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="40%"><span>ชื่อธนาคาร</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="30%"><span>ชื่อบัญชี</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="20%"><span>เลขบัญชี</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถาณะ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="2%"><span>แก้ไข</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="2%"><span>ลบ</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_bank as $key => $bank) {

                ?>
                <tr class="pointer odd">
                    <td class=" "><span style="text-align:center"><?= $key + 1 ?></span></td>
                    <td class=" ">
                        <span style="text-align:center">
                            <a href="#" onclick="edit_pic('<?php echo $bank['bank_ID'] ?>');">
                                <i data-toggle="modal" data-target=".edit-pic">
                                    <img src="<?php echo base_url('assets/pic_bank/' . $bank['bank_Picture']); ?>" width="133" height="133"/>
                                </i>
                            </a>
                        </span>
                    </td>
                    <td class=" "><span style="text-align:center"><?= $bank['bank_Name']; ?></span></td>
                    <td class=" "><span style="text-align:center"><?= $bank['bank_User']; ?>์</span></td>
                    <td class=" "><span style="text-align:center"><?= $bank['bank_Number']; ?></span></td>
                    <td class=" last "><?php if ($bank['bank_Status'] == 1) {
                            $btn_color = "success";
                            $btn_tag = "Active";
                        } else {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" class="btn btn-<?php echo $btn_color; ?> btn-xs" id="stt_emp"
                                onclick="changeStatus('<?php echo $bank['bank_ID'] ?>', '<?php echo $bank['bank_Status']; ?>')"><?php echo $btn_tag; ?></button>
                    </td>
                    <td>
                        <span style="text-align:center">
                            <a href="#" onclick="edit_bank('<?php echo $bank['bank_ID'] ?>');">
                                <i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2">
                                </i>
                            </a>
                        </span>
                    </td>
                    <td><span style="text-align:center">
                            <a href="#" onclick="del_bank('<?php echo $bank['bank_ID'] ?>');">
                                <i class="fa fa-times" data-toggle="modal" data-target=".CheckDel">
                                </i>
                            </a>
                        </span>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>