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

    function changeStatus(product_ID, product_New) {
        var send = {
            "product_ID": product_ID,
            "product_New": product_New

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/edit_product_new",
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
    <h2>จัดการสินค้ามาใหม่</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

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
            <?php foreach($product_new as $key => $pronew) {

                ?>
                <tr class="pointer odd">
                    <td>
                        <center><span><?= $key + 1; ?></span></center>
                    </td>
                    <td><span><?= $pronew['product_Name']; ?></span></td>
                    <td>
                        <center>
                        <span><?php if ($pronew['product_New'] == 1) {
                                $btn_color = "success";
                                $btn_tag = "Active";
                            } else {
                                $btn_color = "danger";
                                $btn_tag = "UnActive";
                            }
                            ?>
                            <button style="width: 60px;" class="btn btn-<?php echo $btn_color; ?> btn-xs" id="stt_emp"
                                    onclick="changeStatus('<?php echo $pronew['product_ID'] ?>', '<?php echo $pronew['product_New']; ?>')"><?php echo $btn_tag; ?></button>
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