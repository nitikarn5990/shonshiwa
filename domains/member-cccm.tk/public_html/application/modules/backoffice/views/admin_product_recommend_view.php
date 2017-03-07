<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#product_birthday').DataTable();

        $('#product_type_ID').change(function(){
            $('#product_group_ID').html('');
            $('#product_product_ID').html('');
            $.post('<?=base_url('backoffice/admin/ajax_product_type/')?>/'+$(this).val(),function(data){
                var data = $.parseJSON(data);
                var select = '';
                $.each(data.result,function(i,d){
                    select += '<option value="'+ d.product_group_ID +'">'+ d.product_group_Name+'</option>';
                });
                $('#product_group_ID').html(select);
            });
        });

        $('#product_group_ID').change(function(){
            if($(this).val() != ''){
                $.post('<?=base_url('backoffice/admin/ajax_get_product/')?>/'+$(this).val(),function(data){
                    var data = $.parseJSON(data);
                    var select = '';
                    $.each(data.result,function(i,d){
                        select += '<option value="'+ d.product_ID +'">'+ d.product_Name+'</option>';
                    });
                    $('#product_product_ID').html(select);
                });
            }
        });


    } );

    function changeStatus(product_ID, product_Recommend) {
        var send = {
            "product_ID": product_ID,
            "product_Recommend": product_Recommend

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/edit_product_Recommend",
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

</script>

<div class="x_title">
    <h2>จัดการสินค้าแนะนำ</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

    <!-- ลบ -->
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
    <!-- /ลบ -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_birthday" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="10%"><center><span>ลำดับ</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="60%"><span>ชื่อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="15%"><center><span>สถาณะ</span></center></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($product_recommend as $key => $pro_recommend) {

                ?>
                <tr class="pointer odd">
                    <td>
                        <center><span><?= $key + 1; ?></span></center>
                    </td>
                    <td><span><?= $pro_recommend['product_Name']; ?></span></td>
                    <td>
                        <center>
                        <span><?php if ($pro_recommend['product_Recommend'] == 1) {
                                $btn_color = "success";
                                $btn_tag = "Active";
                            } else {
                                $btn_color = "danger";
                                $btn_tag = "UnActive";
                            }
                            ?>
                            <button style="width: 60px;" class="btn btn-<?php echo $btn_color; ?> btn-xs" id="stt_emp"
                                    onclick="changeStatus('<?php echo $pro_recommend['product_ID'] ?>', '<?php echo $pro_recommend['product_Recommend']; ?>')"><?php echo $btn_tag; ?></button>
                        </span>
                        </center>
                    </td>
                </tr>
                <?
            }
            ?>
            </tbody>

        </table>
    </div>
</div>