<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>



    function product_type(ele) {
        $('#product_group_ID').html('<option value="">--เลือกกลุ่ม--</option>');
        $('#product_product_ID').html('<option value="">--เลือกสินค้า--</option>');
        $.post('<?= base_url('backoffice/admin/ajax_product_type/') ?>/' + $(ele).val(), function (data) {
            var data = $.parseJSON(data);
            var select = '<option value="">--เลือกกลุ่ม--</option>';
            $.each(data.result, function (i, d) {
                select += '<option value="' + d.product_group_ID + '">' + d.product_group_Name + '</option>';
            });
            $('#product_group_ID').html(select);
        });
    }

    function product_group(ele) {
        if ($(ele).val() != '') {
            $.post('<?= base_url('backoffice/admin/ajax_get_product/') ?>/' + $(ele).val(), function (data) {
                var data = $.parseJSON(data);
                var select = '<option value="">--เลือกสินค้า--</option>';
                $.each(data.result, function (i, d) {
                    select += '<option value="' + d.product_ID + '">' + d.product_Name + '</option>';
                });
                $('#product_product_ID').html(select);
            });
        }
    }


</script>
<div class="x_title">
    <h2>กราฟแสดงยอดการดู/การซื้อสินค้า</h2>
</div>

<div class="x_content">

    <button type="button" class="btn btn-round btn-success pull-left" data-toggle="modal" data-target=".select_product">เลือกสินค้า</button>
    <div class="modal fade select_product" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เลือกสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_type_ID" name="product_type_ID" onchange="product_type(this)">
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
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_group_ID" name="product_group_ID" onchange="product_group(this)" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>

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

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>


<script>
                                        $(function () {
                                            $('#container').highcharts({
                                                chart: {
                                                    zoomType: 'xy'
                                                },
                                                title: {
                                                    text: 'กราฟแสดงยอดการดู/การซื้อสินค้า'
                                                },
                                                subtitle: {
                                                    text: 'ชื่อสินค้า'
                                                },
                                                xAxis: [{
                                                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                                            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                                        crosshair: true
                                                    }],
                                                yAxis: [{  // Primary yAxis
                                                        labels: {
                                                            format: '{value} view',
                                                            style: {
                                                                color: Highcharts.getOptions().colors[0]
                                                            }
                                                        },
                                                        title: {
                                                            text: 'การดู',
                                                            style: {
                                                                color: Highcharts.getOptions().colors[0]
                                                            } 
                                                        },
                                                       // opposite: true

                                                    }, {// Tertiary yAxis
                                                      //  gridLineWidth: 0,
                                                        title: { 
                                                            text: 'การสั่งซื้อ',
                                                            style: {
                                                                color: Highcharts.getOptions().colors[1]
                                                            }
                                                        },
                                                        labels: {
                                                            format: '{value} ครั้ง',
                                                            style: {
                                                                color: Highcharts.getOptions().colors[1]
                                                            }
                                                        },
                                                        opposite: true
                                                    }],
                                                tooltip: {
                                                    shared: true
                                                },
                                                legend: {
                                                    layout: 'vertical',
                                                    align: 'left',
                                                    x: 80,
                                                    verticalAlign: 'top',
                                                    y: 55,
                                                    floating: true,
                                                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                                                },
                                                series: [{
                                                        name: 'การดู',
                                                        type: 'line',
                                                        yAxis: 0,
                                                        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                                        tooltip: {
                                                            valueSuffix: ' view'
                                                        },
                                                        index : 2

                                                    }, {
                                                        name: 'การสั่งซื้อ',
                                                        type: 'column',
                                                        yAxis: 1,
                                                        data: [1016, 1016, 1015.9, 1015.5, 1012.3, 1009.5, 1009.6, 1010.2, 1013.1, 1016.9, 1018.2, 1016.7],
                                                        marker: {
                                                            enabled: false
                                                        },
                                                       // dashStyle: 'shortdot',
                                                        tooltip: {
                                                            valueSuffix: ' ครั้ง'
                                                        }

                                                    }, ]
                                            });
                                        });



</script>

</body>

</html>