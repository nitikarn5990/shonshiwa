<!--DataTables CSS--> 
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!--jQuery--> 
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>


<!-- loading ajax -->
<script type="text/javascript" charset="utf8" src="//malsup.github.io/jquery.blockUI.js"></script>


<script>
    $(document).ready(function () {

        $('#product_birthday').DataTable({
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': [4, 5]}
            ]
        });

        $('#product_type_ID').change(function () {
            
            if($(this).val() !== ''){
          
            $('.modal-content').block(); 
             
            $('#product_group_ID').html('');
            $('#product_product_ID').html('');
            $.post('<?= base_url('backoffice/admin/ajax_product_type/') ?>/' + $(this).val(), function (data) {
                var data = $.parseJSON(data);
                var select = '<option value="">เลือก</option>';
                $.each(data.result, function (i, d) {
                    select += '<option value="' + d.product_group_ID + '">' + d.product_group_Name + '</option>';
                });
             
                 $('.modal-content').unblock(); 
                $('#product_group_ID').html(select);
          
            });
        }
        });

        $('#product_group_ID').change(function () {
            if ($(this).val() !== '') {
                 $('.modal-content').block(); 
                $.post('<?= base_url('backoffice/admin/ajax_get_product/') ?>/' + $(this).val(), function (data) {
                    var data = $.parseJSON(data);
                    var select = '<option value="">เลือก</option>';
                    $.each(data.result, function (i, d) {
                        select += '<option value="' + d.product_ID + '">' + d.product_Name + '</option>';
                    });
                    $('.modal-content').unblock(); 
                    $('#product_product_ID').html(select);
                });
            }
        });


    });

    function changeStatus(product_birthday_ID, product_birthday_Status) {
        var send = {
            "product_birthday_ID": product_birthday_ID,
            "product_birthday_Status": product_birthday_Status

        }
        $.blockUI({message: null});
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/update_status_product_birthday",
                    type: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data) {
                        //console.log(data);
                        if (data.status === true) {
                            $.unblockUI();
                            location.reload();

                        }
                    }
                })
    }

    function edit(product_birthday_ID)
    {
        var send = {"product_birthday_ID": product_birthday_ID};
        $.blockUI({message: '<h3> กำลังดำเนินการ</h3>'});
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_product_birthday_ID",
                    type: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data) {
                        //  console.log(data);
                        if (data)
                        {
                            $.unblockUI();
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_birthday_ID").val(product_birthday_ID);

                                $("#product_birthday_Day option[value='" + value.product_birthday_Day + "']").attr("selected", true);

                            });
                        }
                    }
                })
    }

    function delete_product_birthday(product_birthday_ID) {
        var send = {"product_birthday_ID": product_birthday_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_product_birthday_ID",
                    type: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data)
                        {
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#product_birthday_ID1").val(product_birthday_ID);

                            });
                        }
                    }
                })
    }

</script>



<!--
<script>
    /* globals FormData, Vue */

    var AjaxFormComponent = Vue.extend({
        template: '<form id="{{ id }}" class="{{ class }}" name="{{ name }}" action="{{ action }}" method="{{ method }}" v-on:submit.prevent="handleAjaxFormSubmit"><slot></slot></form>',
        props: {
            'id': String,
            'class': String,
            'action': {
                type: String,
                required: true
            },
            'method': {
                type: String,
                required: true,
                validator: function (value) {
                    switch (value.toUpperCase()) {
                        case 'CONNECT':
                            return true
                        case 'DELETE':
                            return true
                        case 'GET':
                            return true
                        case 'HEAD':
                            return true
                        case 'OPTIONS':
                            return true
                        case 'POST':
                            return true
                        case 'PUT':
                            return true
                        case 'TRACE':
                            return true
                        case 'TRACK':
                            return true
                        default:
                            return false
                    }
                }
            },
            'v-response-type': String
        },
        methods: {
            handleAjaxFormSubmit: function () {
                // fires before we do anything
                this.$dispatch('beforeFormSubmit', this);

                // fires whenever an error occurs
                var handleError = (function (err) {
                    this.$dispatch('onFormError', this, err);
                }).bind(this);

                // set a default form method
                if (!this.method) {
                    this.method = 'post';
                }

                // fires when the form returns a result
                var handleFinish = (function (data) {
                    if (xhr.readyState === 4) {
                        // a check to make sure the result was a success
                        if (xhr.status < 400) {
                            this.$dispatch('onFormComplete', this, xhr.response);
                        } else {
                            this.$dispatch('onFormError', this, xhr.statusText);
                        } 
                    }
                }).bind(this);

                var handleProgress = (function (evt) {
                    // flag indicating if the resource has a length that can be calculated
                    if (evt.lengthComputable) {
                        // create a new lazy property for percent
                        evt.percent = (evt.loaded / evt.total) * 100;
                        this.$dispatch('onFormProgress', this, evt);
                    }
                }).bind(this);

                var xhr = new XMLHttpRequest();
                xhr.open(this.method, this.action, true);

                // you can set the form response type via v-response-type
                if (this.vResponseType) {
                    xhr.responseType = this.vResponseType;
                } else {
                    xhr.responseType = 'json';
                }

                xhr.upload.addEventListener('progress', handleProgress);
                xhr.addEventListener('readystatechange', handleFinish);
                xhr.addEventListener('error', handleError);
                xhr.addEventListener('abort', handleError);
                var data = new FormData(event.target);
                xhr.send(data);
                // we have setup all the stuff we needed to
                this.$dispatch('afterFormSubmit', this);
            }
        }
    });

// register
    Vue.component('ajax-form', AjaxFormComponent);
</script>-->

<!--<script>
    var App = new Vue({
        el: 'body',
        data: {
            response: {},
            progress: 0
        },
        events: {
            beforeFormSubmit: function (el) {
                // fired after form is submitted
                console.log('beforeFormSubmit', el);
                //Pace.start();
               // $(".loading-progress").show();
                 this.progress = 0;
                  $(".loading-progress").show();


            },
            afterFormSubmit: function (el) {
                // fired after fetch is called
                console.log('afterFormSubmit', el);

            },
            onFormComplete: function (el, res) {
                // the form is done, but there could still be errors
                console.log('onFormComplete', el, res);
                // console.warn(el.$el.name);
                // indicate the changes
                this.response = res;
              
                // $.unblockUI();
             //   $(".loading-progress").hide();
                
                $(".loading-progress").fadeOut();

            },
            onFormProgress: function (el, e) {
                // the form is done, but there could still be errors
                console.log('onFormProgress', el, e);

                //  console.warn('onFormProgress', e);

                // indicate the changes

                this.progress = e.percent;
                //  $.blockUI({ message: "<div class='meter animate'><span style='width: "+ this.progress +"%;height: 15px;'></span></div>" });

            },
            onFormError: function (el, err) {
                // handle errors
                console.log('onFormError', err);
                 $(".loading-progress").fadeOut();
                // indicate the changes
                this.response = err;
                alert('เกิดข้อผิดพลาดในการดำเนินการ กรุณาลองใหม่อีกครั้ง')
            }
        }
    });

</script>-->

<!--
<style type="text/css">
    body
    {
        font-family: Arial;
        font-size: 10pt;
    }
    .loading-progress
    {
        position: fixed;
        z-index: 999;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-color: rgba(30, 30, 30, 0.58);
        filter: alpha(opacity=60);
       
        -moz-opacity: 0.8;
    }
.center {
    z-index: 1000;
    margin: 300px auto;
    padding: 10px;
    width: 30%;
    background-color: #fff;
    border-radius: 10px;
    filter: alpha(opacity=100);
    opacity: 1;
    -moz-opacity: 1;
}
    .center img
    {
        height: 128px;
        width: 128px;
    }
</style>-->


<div class="x_title">
    <h2>จัดการสินค้าตามวันเกิด</h2>


</div>




<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

    <div class="">
        <!-- เพิ่ม -->
        <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มสินค้าตามวันเกิด</button>
    </div>
    <p>&nbsp;</p>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มสินค้าตามวันเกิด</h4>
                </div>
                <form class="form-horizontal form-label-left"  method="post" id="" action="add_product_birthday/" enctype="multipart/form-data">

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="modal-body">

                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <select class="form-control col-md-7 col-xs-12 required " id="product_type_ID" name="product_type_ID" >
                                    <option value="">-- เลือกประเภทสินค้า --</option>
                                    <?php
                                    foreach ($data_product_type as $type) {
                                        echo "<option value=\"" . $type['product_type_ID'] . "\">" . $type['product_type_Name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">กลุ่มสินค้า</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <select class="form-control col-md-7 col-xs-12 required " id="product_group_ID" name="product_group_ID" >
                                    <option value="">-- เลือกกลุ่มสินค้า --</option>
                                    <?php
                                    foreach ($data_product_group as $group) {
                                        echo "<option value=\"" . $group['product_group_ID'] . "\">" . $group['product_group_Name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">สินค้า</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <select class="form-control col-md-7 col-xs-12 required" id="product_product_ID" name="product_product_ID" >
                                    <option value="">-- เลือกสินค้า --</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">วัน</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <label class="radio inline">
                                    <input  class="" id="select_all_day" type="checkbox" value="0" name="aa[]"> ทุกวัน
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 col-sm-12 col-xs-9">
                                <div id="select_day">
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Sunday" name="ConfirmStatus[]"> วันอาทิตย์
                                    </label>
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Monday" name="ConfirmStatus[]"> วันจันทร์
                                    </label>
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Tuesday" name="ConfirmStatus[]"> วันอังคาร
                                    </label>
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Wednesday" name="ConfirmStatus[]"> วันพุธ
                                    </label>
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Thursday" name="ConfirmStatus[]"> วันพฤหัสบดี
                                    </label>
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Friday" name="ConfirmStatus[]"> วันศุกร์
                                    </label>
                                    <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                        <input id="CanclStatuse" class="" type="checkbox" value="Saturday" name="ConfirmStatus[]"> วันเสาร์
                                    </label>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('#select_all_day').change(function () {
                                $('#select_day input[type="checkbox"]').prop('checked', this.checked);
                            });
                        </script>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /เพิ่ม -->

    <!-- แก้ไข -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left"  method="post" id="" action="edit_product_birthday_Day/" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">วัน</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <input type="hidden" id="product_birthday_ID" name="product_birthday_ID">

                                <select class="form-control col-md-7 col-xs-12 required " id="product_birthday_Day" name="product_birthday_Day" >
                                    <option value="Sunday">วันอาทิตย์</option>
                                    <option value="Monday">วันจันทร์</option>
                                    <option value="Tuesday">วันอังคาร</option>
                                    <option value="Wednesday">วันพุธ</option>
                                    <option value="Thursday">วันพฤหัสบดี</option>
                                    <option value="Friday">วันศุกร์</option>
                                    <option value="Saturday">วันเสาร์</option>
                                </select>
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
    <!-- /แก้ไข -->

    <!-- ลบ -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบสินค้าสินค้าตามวันเกิด</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_product_birthday/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="product_birthday_ID1" id="product_birthday_ID1">

                                <label>คุณแน่ใจหรือว่าต้องการลบสินค้าตามวนเกิดนี้</label>
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
    <!-- /ลบ -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_birthday" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
                <tr class="headings" role="row">
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="5%"><center><span>ลำดับ</span></center></th>
            <th class="" role="columnheader" tabindex="0" aria-controls="example" width="55%"><span>ชื่อ</span></th>
            <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><center><span>วัน</span></center></th>
            <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><center><span>สถานะ </span></center></th>
            <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><center><span>แก้ไข</span></center></th>
            <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><center><span>ลบ</span></center></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php foreach ($data_product_birthday as $key => $product_birthday) {
                    ?>
                    <tr class="pointer odd">
                        <td>
                <center><span><?= $key + 1 ?></span></center>
                </td>
                <td><span><?= $product_birthday['product_Name'] ?></span></td>
                <td>
                <center>
                    <span>
                        <?php
                        if ($product_birthday['product_birthday_Day'] == 'Sunday') {
                            echo 'วันอาทิตย์';
                        } elseif ($product_birthday['product_birthday_Day'] == 'Monday') {
                            echo 'วันจันทร์';
                        } elseif ($product_birthday['product_birthday_Day'] == 'Tuesday') {
                            echo 'วันอังคาร';
                        } elseif ($product_birthday['product_birthday_Day'] == 'Wednesday') {
                            echo 'วันพุธ';
                        } elseif ($product_birthday['product_birthday_Day'] == 'Thursday') {
                            echo 'วันพฤหัสบดี';
                        } elseif ($product_birthday['product_birthday_Day'] == 'Friday') {
                            echo 'วันศุกร์';
                        } elseif ($product_birthday['product_birthday_Day'] == 'Saturday') {
                            echo 'วันเสาร์';
                        }
                        ?>
                    </span>
                </center>
                </td>
                <td class=" last ">
                    <?php
                    if ($product_birthday['product_birthday_Status'] == 1) {
                        $btn_color = "success";
                        $btn_tag = "Active";
                    } else {
                        $btn_color = "danger";
                        $btn_tag = "UnActive";
                    }
                    ?>
                    <button style="width: 60px;" class="btn btn-<?php echo $btn_color; ?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $product_birthday['product_birthday_ID'] ?>', '<?php echo $product_birthday['product_birthday_Status']; ?>')"><?php echo $btn_tag; ?></button>
                </td>
                <td>
                <center><span><a href="#" onclick="edit('<?php echo $product_birthday['product_birthday_ID'] ?>')"><i class="fa fa-clipboard" data-toggle="modal"
                                                                                                                      data-target=".bs-example-modal-sm2"></i></a></span>
                </center>
                </td>
                <td>
                <center><span><a href="#"onclick="delete_product_birthday('<?php echo $product_birthday['product_birthday_ID'] ?>');"><i class="fa fa-times" data-toggle="modal"
                                                                                                                                         data-target=".CheckDel"></i></a></span></center>
                </td>
                </tr>
                <?
                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
 

