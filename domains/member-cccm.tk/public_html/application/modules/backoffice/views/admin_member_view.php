<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
    $(document).ready( function () {
        $('#member').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3 ] }
            ]
        } );
    } );

    function changeStatus(user_ID, user_Status) {
        var send = {
            "user_ID": user_ID,
            "user_Status": user_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_member",
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

    function show_detail(user_ID)
    {
        var send = {"user_ID": user_ID};
        $.ajax
        ({
            url: "<?php echo base_url() ?>backoffice/admin/get_user",
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
                        $("#user_Username").val(value.user_Username);
                        $("#user_Name").val(value.user_Name);
                        $("#user_Lastname").val(value.user_Lastname);
                        $("#user_Sex").val(value.user_Sex);
                        $("#user_Birthday").val(value.user_Birthday);
                        $("#user_Address").val(value.user_Address);
                        $("#user_Mobile").val(value.user_Mobile);
                        $("#user_Email").val(value.user_Email);

                    });
                }
            }
        });
    }
</script>
<div class="x_title">
    <h2>จัดการสมาชิก</h2>
</div>

<div class="x_content">

    <!-- แก้ไขสินค้า -->
    <div class="modal fade lookOnly" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ดูข้อมูลผู้ใช้</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="edit_product_ID" name="edit_product_ID">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อที่ใฃ้ในการล็อคอิน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Username" name="user_Username" type="text" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อ - นามสกุล</label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Name" name="user_Name" type="text" readonly>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Lastname" name="user_Lastname" type="text" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เพศ</label>
                                <div class="col-md-4 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Sex" name="user_Sex" type="text" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันเกิด</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Birthday" name="user_Birthday" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ที่อยู่</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="user_Address" id="user_Address" readonly></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เบอร์โทรศัพท์</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Mobile" name="user_Mobile" type="text" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">อีเมลล์</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="user_Email" name="user_Email" type="text" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /แก้ไขสินค้า -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="member" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="20%"><span>รหัส</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="50%"><span>ชื่อ - นามสกุล</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ดูข้อมูล</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถาณะ</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php
                foreach($datamember  as $key => $member){
                ?>
                    <tr class="pointer odd">
                        <td class=" "><span style="text-align:center"><?= $key+1; ?></span></td>
                        <td class=" "><span style="text-align:center"><?= $member['user_ID']?></span></td>
                        <td class=" "><span style="text-align:center"><?= $member['user_Name']?></span></td>
                        <td>
                            <span style="text-align:center"><a href="#" onclick="show_detail('<?php echo $member['user_ID'] ?>')"><i class="fa fa-newspaper-o" data-toggle="modal" data-target=".lookOnly"></i></a></span>
                        </td>
                        <td class=" last ">
                            <?php if($member['user_Status'] == 1){
                                $btn_color = "success";
                                $btn_tag = "Active";
                            }
                            else
                            {
                                $btn_color = "danger";
                                $btn_tag = "UnActive";
                            }
                            ?>
                            <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $member['user_ID'] ?>', '<?php echo $member['user_Status']; ?>')"><?php echo $btn_tag;?></button>
                        </td>

                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>