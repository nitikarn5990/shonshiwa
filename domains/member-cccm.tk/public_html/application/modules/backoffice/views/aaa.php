<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
    $(document).ready( function () {
        $('#product').DataTable();
    } );


    function changeStatus(promotion_ID, promotion_Status) {
        var send = {
            "promotion_ID": promotion_ID,
            "promotion_Status": promotion_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_promotion",
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

    function edit_promotion(promotion_ID)
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
                        $("#edit_promotion_Title").val(value.promotion_Title);
                        $("#edit_promotion_Detail").val(value.promotion_Detail);

                    });
                }
            }
        });
    }

    function delete_promotion(promotion_ID)
    {
        var send = {"promotion_ID": promotion_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/delete_promotion",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    $("#alert_msg").modal("show");
                    $("#text_msg").text("ลบสำเร็จ.");
                    setTimeout(function () {
                        $("#alert_msg").modal("hide");
                        location.reload();
                    }, 2000);
                }
            }
        })
    }



</script>
<div class="x_title">
    <h2>จัดการโปรโมชั้น</h2>
</div>

<div class="x_content">
    <!-- เพิ่มโปรโมชั้น -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มโปรโมชั้น</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มโปรโมชั้น</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="add_promotion/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="promotion_Title" name="promotion_Title" type="text" placeholder="กรุณากรอก">
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
                                    <input class="btn btn-primary" type="file" name="promotion_Picture" id="promotion_Picture" accept="pic_promotion/*">
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
    <!-- /เพิ่มโปรโมชั้น -->

    <!-- แก้ไขโปรโมชั้น -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลโปรโมชั้น</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="update_promotion/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="edit_promotion_ID" name="edit_promotion_ID">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_promotion_Title" name="edit_promotion_Title" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของโปรโมชั้น</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="edit_promotion_Detail" id="edit_promotion_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
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
    <!-- /แก้ไขโปรโมชั้น -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="promotion" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">รูปภาพโปรโมชั้น</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">หัวข้อโปรโมชั้น</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">สถาณะโปรโมชั้น</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">แก้ไขโปรโมชั้น</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">ลบโปรโมชั้น</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_promotion as $key => $promotion){?>
                <tr class="pointer odd">
                    <td class=" "><span style="text-align:center"><?php echo $key+1; ?></span></td>
                    <td class=" "><span style="text-align:center"><img src="<?php echo base_url('assets/pic_promotion/'. $promotion['promotion_Picture']);?>" width="133" height="133" /></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $promotion['promotion_Title'];?></span></td>
                    <!--                    <td class=" "><span style="text-align:center"><a href="--><?php //echo base_url('backoffice/admin/product_sap/'.$promotion['product_ID']);?><!--" target="_blank" ><i class="fa fa-cogs" ></i></a></span></td>-->

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
                        <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $promotion['promotion_ID'] ?>', '<?php echo $promotion['promotion_Status']; ?>')"><?php echo $btn_tag;?></button>
                    </td>
                    <td><span style="text-align:center"><a href="#" onclick="edit_promotion('<?php echo $promotion['promotion_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                    <td><span style="text-align:center"><a href="#" onclick="delete_promotion('<?php echo $promotion['promotion_ID'] ?>');"><i class="fa fa-times"></i></a></span></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>