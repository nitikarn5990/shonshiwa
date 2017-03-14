<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
    $(document).ready( function () {
        $('#portfolio').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1,2,4,5 ] }
            ]
        } );
    } );


    function changeStatus(portfolio_ID, portfolio_Status) {
        var send = {
            "portfolio_ID": portfolio_ID,
            "portfolio_Status": portfolio_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_portfolio",
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

    function edit_portfolio(portfolio_ID)
    {
        var send = {"portfolio_ID": portfolio_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_portfolio_byID",
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
                        $("#edit_portfolio_ID").val(portfolio_ID);
                        $("#edit_portfolio_Title").val(value.portfolio_Title);
                        $("#edit_portfolio_Detail").val(value.portfolio_Detail);
                        $("#edit_days option[value='" + value.days + "']").attr("selected", true);
                        $("#edit_months option[value='" + value.months + "']").attr("selected", true);
                        $("#edit_years option[value='" + value.years + "']").attr("selected", true);

                    });
                }
            }
        });
    }

    function delete_portfolio(portfolio_ID)
    {
        var send = {"portfolio_ID": portfolio_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_portfolio_byID",
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
                        $("#del_portfolio_ID").val(portfolio_ID);
                        $("#del_portfolio_Picture").val(value.portfolio_Picture);

                    });
                }
            }
        })
    }

    function edit_pic(portfolio_ID)
    {
        var send = {"portfolio_ID": portfolio_ID}
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_portfolio_byID",
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
                        $("#edit_pic_portfolio_ID").val(value.portfolio_ID);
                        $("#edit_pic_portfolio_Picture").val(value.portfolio_Picture);

                        $("#data_pic").attr('src','<?php echo base_url('assets/pic_portfolio')?>/'+value.portfolio_Picture);
                    });
                }
            }
        });
    }



</script>

<div class="x_title">
    <h2>จัดการผลงาน</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>
    <!-- เพิ่มผลงาน -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มผลงาน</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มผลงาน</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="add_portfolio/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อผลงาน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="portfolio_Title" name="portfolio_Title" type="text" placeholder="กรุณากรอก" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของผลงาน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="portfolio_Detail" id="portfolio_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันที่ทำ</label>
                                <div class="col-xs-4">
                                    <select class="form-control" id="days" name="days">
                                        <option>-</option>
                                        <?php
                                        for($n=1;$n<=31;$n++)
                                        {
                                            echo "<option value=\"" . $n . "\">" . $n . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เดือนที่ทำ</label>
                                <div class="col-xs-4">
                                    <select class="form-control" name="months" id="months">
                                        <option>-</option>
                                        <option value="1">มกราคม&nbsp;</option>
                                        <option value="2">กุมภาพันธ์&nbsp;</option>
                                        <option value="3">มีนาคม&nbsp;</option>
                                        <option value="4">เมษายน&nbsp;</option>
                                        <option value="5">พฤษภาคม&nbsp;</option>
                                        <option value="6">มิถุนายน&nbsp;</option>
                                        <option value="7">กรกฎาคม&nbsp;</option>
                                        <option value="8">สิงหาคม&nbsp;</option>
                                        <option value="9">กันยายน&nbsp;</option>
                                        <option value="10">ตุลาคม&nbsp;</option>
                                        <option value="11">พฤศจิกายน&nbsp;</option>
                                        <option value="12">ธันวาคม&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ปีที่ทำ</label>
                                <div class="col-xs-4">
                                    <select class="form-control" name="years" id="years">
                                        <option>-</option>
                                        <?php
                                        for($n=2000;$n <= date('Y');$n++)
                                        {
                                            echo "<option value=\"" . $n . "\">" . $n . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพของผลงาน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="portfolio_Picture" id="portfolio_Picture" accept="pic_portfolio/*">
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
    <!-- /เพิ่มผลงาน -->

    <!-- แก้ไขผลงาน -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลผลงาน</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="update_portfolio/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อผลงาน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="edit_portfolio_ID" name="edit_portfolio_ID">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_portfolio_Title" name="edit_portfolio_Title" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของผลงาน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="edit_portfolio_Detail" id="edit_portfolio_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วันที่ทำ</label>
                                <div class="col-xs-4">
                                    <select class="form-control" id="edit_days" name="edit_days">
                                        <option>-</option>
                                        <option value="01">1&nbsp;</option>
                                        <option value="02">2&nbsp;</option>
                                        <option value="03">3&nbsp;</option>
                                        <option value="04">4&nbsp;</option>
                                        <option value="05">5&nbsp;</option>
                                        <option value="06">6&nbsp;</option>
                                        <option value="07">7&nbsp;</option>
                                        <option value="08">8&nbsp;</option>
                                        <option value="09">9&nbsp;</option>
                                        <option value="10">10&nbsp;</option>
                                        <option value="11">11&nbsp;</option>
                                        <option value="12">12&nbsp;</option>
                                        <option value="13">13&nbsp;</option>
                                        <option value="14">14&nbsp;</option>
                                        <option value="15">15&nbsp;</option>
                                        <option value="16">16&nbsp;</option>
                                        <option value="17">17&nbsp;</option>
                                        <option value="18">18&nbsp;</option>
                                        <option value="19">19&nbsp;</option>
                                        <option value="20">20&nbsp;</option>
                                        <option value="21">21&nbsp;</option>
                                        <option value="23">23&nbsp;</option>
                                        <option value="24">24&nbsp;</option>
                                        <option value="25">25&nbsp;</option>
                                        <option value="26">26&nbsp;</option>
                                        <option value="27">27&nbsp;</option>
                                        <option value="28">28&nbsp;</option>
                                        <option value="29">29&nbsp;</option>
                                        <option value="30">30&nbsp;</option>
                                        <option value="31">31&nbsp;</option>

                                        <!--                                        --><?php
//                                        for($n=1;$n<=31;$n++)
//                                        {
//                                            echo "<option value=\"" ."0".$n . "\">" . $n . "</option>";
//                                        }
//                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">เดือนที่ทำ</label>
                                <div class="col-xs-4">
                                    <select class="form-control" name="edit_months" id="edit_months">
                                        <option>-</option>
                                        <option value="01">มกราคม&nbsp;</option>
                                        <option value="02">กุมภาพันธ์&nbsp;</option>
                                        <option value="03">มีนาคม&nbsp;</option>
                                        <option value="04">เมษายน&nbsp;</option>
                                        <option value="05">พฤษภาคม&nbsp;</option>
                                        <option value="06">มิถุนายน&nbsp;</option>
                                        <option value="07">กรกฎาคม&nbsp;</option>
                                        <option value="08">สิงหาคม&nbsp;</option>
                                        <option value="09">กันยายน&nbsp;</option>
                                        <option value="10">ตุลาคม&nbsp;</option>
                                        <option value="11">พฤศจิกายน&nbsp;</option>
                                        <option value="12">ธันวาคม&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ปีที่ทำ</label>
                                <div class="col-xs-4">
                                    <select class="form-control" name="edit_years" id="edit_years">
                                        <option>-</option>
                                        <?php
                                        for($n=2000;$n <= date('Y');$n++)
                                        {
                                            echo "<option value=\"" . $n . "\">" . $n . "</option>";
                                        }
                                        ?>
                                    </select>
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
    <!-- /แก้ไขผลงาน -->

    <!-- ลบประเภทสินค้า -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบผลงาน</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_portfolio/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="del_portfolio_ID" id="del_portfolio_ID">
                                <input type="hidden" name="del_portfolio_Picture" id="del_portfolio_Picture">

                                <label>คุณแน่ใจหรือว่าต้องการลบผลงาน</label>
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
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic_portfolio_Picture/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <center>
                                        <label class="col-md-12">รูปภาพของสไลด์ภาพหน้าหลัก</label></br>
                                        <input type="hidden" id="edit_pic_portfolio_ID" name="edit_pic_portfolio_ID">
                                        <input type="hidden" id="edit_pic_portfolio_Picture" name="edit_pic_portfolio_Picture"></br>
                                        <img id="data_pic" style="width: 200px;"></br>&nbsp;</br>
                                        <input class="btn btn-primary" type="file" name="edit_pic_portfolio_Picture" id="edit_pic_portfolio_Picture" accept="image/*"></br>
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

    <!-- /แก้ไขรูปภาพ -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="portfolio" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>รูปภาพ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="50%"><span>หัวข้อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถาณะ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>แก้ไข</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลบ</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_portfolio as $key => $pfo){?>
                <tr class="pointer odd">
                    <td class=" "><span style="text-align:center"><?php echo $key+1; ?></span></td>
                    <td class=" "><span style="text-align:center"><a href="#" onclick="edit_pic('<?php echo $pfo['portfolio_ID'] ?>');"><i data-toggle="modal" data-target=".edit-pic"><img src="<?php echo base_url('assets/pic_portfolio/'. $pfo['portfolio_Picture']);?>" width="133" height="133" /></i></a></span></td>
                    <td class=" "><span style="text-align:center"><?php echo $pfo['portfolio_Title'];?></span></td>
                    <td class=" last ">
                        <?php if($pfo['portfolio_Status'] == 1){
                            $btn_color = "success";
                            $btn_tag = "Active";
                        }
                        else
                        {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $pfo['portfolio_ID'] ?>', '<?php echo $pfo['portfolio_Status']; ?>')"><?php echo $btn_tag;?></button>
                    </td>
                    <td><span style="text-align:center"><a href="#" onclick="edit_portfolio('<?php echo $pfo['portfolio_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                    <td><span style="text-align:center"><a href="#" onclick="delete_portfolio('<?php echo $pfo['portfolio_ID'] ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span></td>
                </tr>
            <?php }?>

            </tbody>

        </table>
    </div>
</div>