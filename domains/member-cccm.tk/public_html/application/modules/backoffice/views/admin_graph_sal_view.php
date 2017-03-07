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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/drilldown.js"></script>
<script type="text/javascript">
    var chart;
    $(function () {

        Highcharts.setOptions({
            lang: {
                decimalPoint: '.',
                thousandsSep: ','
            }
        });
        $('#container').highcharts({
            chart: {
                zoomType: 'xy',
                events: {
                    load: function () {

                        //load_months();
                        $('#container').hide();
                    }
                }
            },
            title: {
                text: 'กราฟเปรียบเทียบการเข้าชม:การซื้อสินค้า'
            },
            subtitle: {
                text: ' '
            },
            xAxis: [{
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    crosshair: true
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '{value} view',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    title: {
                        text: 'การเข้าชม',
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
                shared: true,
            
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
                    name: 'การเข้าชม',
                    type: 'line',
                    yAxis: 0,
                    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                    tooltip: {
                        valueSuffix: ' view'
                    },
                    index: 2

                }, {
                    name: 'การสั่งซื้อ',
                    type: 'column',
                    yAxis: 1,
                    //  data: [1016, 1016, 1015.9, 1015.5, 1012.3, 1009.5, 1009.6, 1010.2, 1013.1, 1016.9, 1018.2, 1016.7],
                    marker: {
                        enabled: false
                    },
                    // dashStyle: 'shortdot',
                    tooltip: {
                        valueSuffix: ' ครั้ง'
                    }

                }, ]
        });


        chart = $('#container').highcharts(),
                name = false,
                enableDataLabels = true,
                enableMarkers = true,
                color = false;




    });



    var type_chart = '';
    var type_value = '';

    var year_value = '';
    var month_value = '';
    var day_value = '';
        function load_get_year() {



        $.ajax({
            url: "<?= base_url() ?>backoffice/test/getYear2",
            type: "POST",
            dataType: "json",
            success: function (data) {
                // console.log(data);
//                var list = new Array();
//                var count_order = new Array();
//                var total_view = new Array();

                var option_year = '<option value="">--เลือกปี--</option>';
                $.each(data, function (k, v) {
                    option_year += "<option value='" + v + "'>" + v + "</option>";
                });
                $('#data_year').html(option_year);

            }
        });
    }
    function load_years() {

        //type_chart = 'year';


        $.ajax({
            url: "<?= base_url() ?>backoffice/test/ajax_get_years",
            type: "POST",
            //data: send,
            dataType: "json",
            success: function (data) {

                var list = new Array();
                var price = new Array();
                $.each(data, function (k, v) {
                    //  console.log(v.formatted_date);
                    // alert(JSON.stringify(v));
                    list.push(v.formatted_date);
                    // list.push(v.formatted_date);
                    var val = {
                        name: v.formatted_date,
                        y: parseInt(v.sum_total)
                    };
                    //  xx.push(test);
                    // xx = JSON.stringify(v.formatted_date);
                    price.push(val);
                });
                // var myJsonString = JSON.stringify(xx);
                // var jsonArray = JSON.parse((xx));
                //JSON.stringify(xx2);
                //  console.log(price);
                Highcharts.charts[0].xAxis[0].update({
                    categories: list
                }, true);

                Highcharts.charts[0].yAxis[0].update({// Primary yAxis   
                    // showEmpty: false,
                    labels: {
                        format: '{value} view',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    title: {
                        text: 'การเข้าชม',
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

                });


                Highcharts.charts[0].series[0].update({
                    name: 'การเข้าชม',
                    type: 'column',
                    yAxis: 0,
                    data: price,
                    tooltip: {
                        valueSuffix: ' view'
                    },
                    index: 2
                }, {
                    name: 'การสั่งซื้อ',
                    type: 'column',
                    yAxis: 1,
                    data: [5656, 454545],
                    marker: {
                        enabled: false
                    },
                    // dashStyle: 'shortdot',
                    tooltip: {
                        valueSuffix: ' ครั้ง'
                    }
                });

            }
        });
    }
    function get_month_th(num) {
        if (num == 01)
            print2 = 'มกราคม';
        if (num == 02)
            print2 = 'กุมภาพันธ์';
        if (num == 03)
            print2 = 'มีนาคม';
        if (num == 04)
            print2 = 'เมษายน';
        if (num == 05)
            print2 = 'พฤษภาคม';
        if (num == 06)
            print2 = 'มิถุนายน';
        if (num == 07)
            print2 = 'กรกฎาคม';
        if (num == 08)
            print2 = 'สิงหาคม';
        if (num == 09)
            print2 = 'กันยายน';
        if (num == 10)
            print2 = 'ตุลาคม';
        if (num == 11)
            print2 = 'พฤศจิกายน';
        if (num == 12)
            print2 = 'ธันวาคม';

        return print2;

    }
    function get_num_month(str_month) {
        if (str_month == 'มกราคม')
            print2 = '01';
        if (str_month == 'กุมภาพันธ์')
            print2 = '02';
        if (str_month == 'มีนาคม')
            print2 = '03';
        if (str_month == 'เมษายน')
            print2 = '04';
        if (str_month == 'พฤษภาคม')
            print2 = '05';
        if (str_month == 'มิถุนายน')
            print2 = '06';
        if (str_month == 'กรกฎาคม')
            print2 = '07';
        if (str_month == 'สิงหาคม')
            print2 = '08';
        if (str_month == 'กันยายน')
            print2 = '09';
        if (str_month == 'ตุลาคม')
            print2 = '10';
        if (str_month == 'พฤศจิกายน')
            print2 = '11';
        if (str_month == 'ธันวาคม')
            print2 = '12';

        return print2;

    }


    function load_months(select_year, select_product_id, product_name) {
         $('#container').show();

        var select_year = select_year;
        var select_product_id = select_product_id;

        $.ajax({
            url: "<?= base_url() ?>backoffice/test/ajax_get_months/" + select_year + "/" + select_product_id,
            type: "POST",
//            data: {
//                year: 2016
//            },
            dataType: "json",
            success: function (data) {
                // console.log(data);
                var list = new Array();
                var count_order = new Array();
                var total_view = new Array();

//                var option_year = '<option value="">--เลือกปี--</option>';
//                $.each(data.data_year, function (k, v) {
//                    option_year += "<option value='" + v + "'>" + v + "</option>";
//                });
//                $('#data_year').html(option_year);
                
                $.each(data.data, function (k, v) {
                    //  console.log(v.formatted_date);
                    // alert(JSON.stringify(v));



                    list.push(get_month_th(v.formatted_date));
                    // list.push(v.formatted_date);

                    var val = {
                        name: get_month_th(v.formatted_date),
                        y: parseInt(v.count_order)
                    };
                    var val2 = {
                        name: get_month_th(v.formatted_date),
                        y: parseInt(v.total_view)
                    };
                    //var val = [parseInt(v.total_view)];
                    // var val2 = [parseInt(v.total_view)];
                    //  xx.push(test);
                    // xx = JSON.stringify(v.formatted_date);
                    count_order.push(val);
                    total_view.push(val2);
                });
                // var myJsonString = JSON.stringify(xx);
                // var jsonArray = JSON.parse((xx));
                //JSON.stringify(xx2);
                // console.log(list);

                //count_order = [5 ,10];
                // total_view = [50 ,30];
                //  console.log(total_view);
                chart.xAxis[0].update({
                    categories: list
                }, true);


                chart.series[0].update({
                    data: count_order

                });
                chart.series[1].update({
                    data: total_view

                });
//               chart.setTitle({text: " "});
//              chart.setTitle(null, { text: ' ' }); //sub title
//                    if (product_name != '') {
//                          chart.setTitle({text: product_name}, { text: 'ปี '+select_year });
//                    }
               

    

            }
        });
    }
    function load_days() {


        type_chart = 'day';

        chart.setTitle({
            text: " เดือน " + month_value + " ปี " + year_value
        });
        chart.series[0].update({
            name: 'ยอดขาย'
        });
        chart.yAxis[0].update({
            title: {
                text: 'บาท'
            }
        }, true);
        $.ajax({
            url: "<?= base_url() ?>backoffice/test/ajax_get_days/" + year_value + "/" + get_num_month(month_value),
            type: "POST",
            data: {
                //  year: year_value,
                // month: get_num_month(month_value)
            },
            dataType: "json",
            success: function (data) {
                //  console.log(data);
                var list = new Array();
                var price = new Array();
                $.each(data, function (k, v) {
                    //  console.log(v.formatted_date);
                    // alert(JSON.stringify(v));
                    list.push((v.formatted_date));
                    // list.push(v.formatted_date);

                    var val = {
                        name: (v.formatted_date),
                        y: parseInt(v.sum_total)
                    };
                    //  xx.push(test);
                    // xx = JSON.stringify(v.formatted_date);
                    price.push(val);
                });
                // var myJsonString = JSON.stringify(xx);
                // var jsonArray = JSON.parse((xx));
                //JSON.stringify(xx2);
                //console.log(price);
                Highcharts.charts[0].xAxis[0].update({
                    categories: list
                }, true);
                chart.series[0].update({
                    data: price
                });
                //   if (data.status == true) {
                //  location.reload();
                //  }
            }
        });
    }

    function load_order() {


        type_chart = 'load_order';


//        chart.setTitle({
//            text: "วันที่ " + day_value + " เดือน " + month_value + " ปี " + year_value
//        });
//        chart.series[0].update({
//            name: 'จำนวน'
//        });
//
//        chart.yAxis[0].update({
//            title: {
//                text: 'จำนวน'
//            }
//        }, true);
        //   alert(year_value );
        // alert(get_num_month(month_value) );
        //   return false;


        $.ajax({
            url: "<?= base_url() ?>backoffice/test/ajax_order/" + year_value + "/" + get_num_month(month_value) + "/" + day_value,
            type: "POST",
            data: {
                //  year: year_value,
                // month: get_num_month(month_value)
            },
            dataType: "json",
            success: function (data) {

                var tr = '';
                var total = 0;
                $.each(data, function (index, value) {
                    console.log(value.report_id);
                    //value.report_id
                    // value.sum_total
                    tr += "<tr><td>" + (index + 1) + "</td><td><a class='btn-link' onclick='order_detail(" + value.report_id + ")' href='javascript:void(0)'>" + value.report_id + "</a></td><td>" + value.sum_total + "</td></tr>";
                    total += parseInt(value.sum_total);

                });
                if (tr == '') {
                    tr += "<tr><td colspan='3' style='text-align: center;'>ไม่พบข้อมูล</td></tr>";
                } else {
                    tr += "<tr><td colspan='2' style='text-align: right;'>รวม</td><td>" + total + "</td></tr>";
                }

                $('#table-order tbody').html(tr);


                // var myJsonString = JSON.stringify(xx);
                // var jsonArray = JSON.parse((xx));
                //JSON.stringify(xx2);
                //console.log(price);
                //
//                Highcharts.charts[0].xAxis[0].update({
//                    categories: ['จำนวน Order']
//                }, true);
//                chart.series[0].update({
//                    data: [
//                        {
//                            name: ('จำนวน Order'),
//                            y: parseInt(data[0].count_order)
//                        }
//                    ]
//                });

            }
        });
    }

    function change_chart() {
        if (type_chart == 'month') {
            load_years();
        } else if (type_chart == 'day') {
            load_months();
        } else if (type_chart == 'count_order') {
            load_days();
        } else if (type_chart == 'order_detail') {
            $('#table-order-detail').hide();
            $('#table-order').show();

            type_chart = 'load_order';

        } else if (type_chart == 'load_order') {
            $('#table-order-detail').hide();
            $('#table-order').hide();
            $('#container').show();

            type_chart = 'day';

        }
        //  $('#table-order').hide();
        // $('#table-order-detail').hide();
    }
    function order_detail(report_id) {

        type_chart = 'order_detail';

        $('#table-order').hide();
        $('#table-order-detail').show();

        $.ajax({
            url: "<?= base_url() ?>backoffice/test/ajax_order_detail/" + report_id,
            type: "POST",
            data: {
                //  year: year_value,
                // month: get_num_month(month_value)
            },
            dataType: "json",
            success: function (data) {
                //product_order_Name
                //product_order_Unit

                var tr = '';
                var total = 0;
                //  console.log(data);
                $.each(data, function (index, value) {
                    //  console.log(value.report_id);
                    //value.report_id
                    // value.sum_total

                    var dis_percen = Math.ceil((((parseInt(value.product_report_Allprice) - parseInt(value.product_report_Discountprice)) * 100) / parseInt(value.product_report_Allprice)));
                    var after_discount = Math.ceil((parseInt(value.product_order_Unit) * parseInt(value.product_order_Price)) - ((parseInt(dis_percen) * (parseInt(value.product_order_Unit) * parseInt(value.product_order_Price)) / 100)));

                    tr += "<tr><td>" + (index + 1) + "</td><td>" + value.product_order_Name + "</td><td>" + value.product_order_Price + "</td><td>" + value.product_order_Unit + "</td><td>" + dis_percen + "%</td><td>" + after_discount + "</td></tr>";
                    // total += parseInt(value.sum_total);
                    //total_qty

                    total += after_discount;

                });
                if (tr == '') {
                    tr += "<tr><td colspan='6' style='text-align: center;'>ไม่พบข้อมูล</td></tr>";
                } else {
                    tr += "<tr><td colspan='5' style='text-align: right;'>รวม</td><td  >" + total + "</td></tr>";
                }
                // tr += "<tr><td colspan='2'>รวม</td><td>"+total+"</td></tr>";
                $('#table-order-detail tbody').html(tr);
            }
        });


    }
    $(document).ready(function () {
    load_get_year();
        $('#myForm').submit(function (event) {

            var select_years = $('#data_year').val();
            var select_product_id = $('#product_product_ID').val();
            
            var product_name = $('#product_product_ID option:selected').text();
            
           

            load_months(select_years, select_product_id, product_name);
            
            chart.setTitle({text: product_name}, { text: 'ปี '+select_years });
            

            $('#model_select_product').modal('hide');




            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });
    });

</script>

<div class="col-md-12">
    <h2>กราฟเปรียบเทียบการเข้าชม:การซื้อสินค้า</h2>
</div>
<div class="col-md-12">
    <button type="button" class="btn btn-round btn-success pull-left" data-toggle="modal" data-target=".select_product">เลือกสินค้า</button>
</div>
<div class="clearfix"></div>

<div class="col-md-12 ">
    <center>
        </br></hr></br>
        <button class="btn btn-default hidden" onclick="change_chart()">Back</button>
        <div id="container" style="height: 400px">

        </div>

    </center>
</div>
<div class="x_content">


    <div class="modal fade select_product" id="model_select_product" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เลือกสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" id="myForm" >
                    <div class="modal-body">

                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <select class="form-control col-md-7 col-xs-12  " required id="product_type_ID" name="product_type_ID" onchange="product_type(this)">
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
                                <select class="form-control col-md-7 col-xs-12 " required id="product_group_ID" name="product_group_ID" onchange="product_group(this)" >
                                    <option value="">-- เลือกกลุ่มสินค้า --</option>

                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">สินค้า</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <select class="form-control col-md-7 col-xs-12 " required id="product_product_ID" name="product_product_ID" >
                                    <option value="">-- เลือกสินค้า --</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">เลือกปี</label>
                            <div class="col-md-7 col-sm-7 col-xs-9">
                                <select class="form-control col-md-7 col-xs-12 " id="data_year" name=""  required>
                                    <option value="">-- เลือกปี --</option>
                                </select>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ดู</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</body>

</html>