<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>


<script>
    $(document).ready(function ()
    {
        $('#report_success').dataTable({
            "ordering": false
        });
    });
</script>

<div class="x_title">
    <h2>จัดการรายงานสินค้า</h2>
</div>

<div class="x_content">
    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="report_success" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="25%"><span style="text-align:center">เวลา</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="25%"><span style="text-align:center">วันที่</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="25%"><span style="text-align:center">รหัสใบสั่งซื้อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="25%"><span style="text-align:center">ราคา</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($report_success as $key => $r_success) {
                list($day, $time) = explode(" ", $r_success['product_report_DateTime']);
                ?>
                <tr class="pointer odd">
                    <td class=" "><span style="text-align:center"><?=$day?></span></td>
                    <td class=" "><span style="text-align:center"><?=$time?></span></td>
                    <td class=" "><a href="<?php echo base_url('backoffice/admin/report_show/'.$r_success['product_report_ID']);?>" target="_blank"><span style="text-align:center"><?=$r_success['product_report_ID']?></span></a></td>
                    <td class=" "><span style="text-align:center"><?=$r_success['product_report_Discountprice']?></span></td>
                </tr>
                <?
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
