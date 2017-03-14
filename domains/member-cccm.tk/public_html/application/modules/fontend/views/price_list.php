<!DOCTYPE html>
<html lang='en'>

    <head>
        <title>Tamarind Village</title>
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <meta content='Tamarind Village is a unique and charming boutique property that nestles in the heart of historic Chiang Mai. Surrounded by ancient temples and quaint shopping streets, it takes its name from magnificent 200 years old tamarind tree that shelters the hotel in a shady embrace. Set around a series of garden courtyards, the 41 guest rooms and 5 suites reflect the rich ethnic diversity of northern Thailand by using fabrics and patterns drawn from various tribes of the region. Intimate, serene and relaxing, Tamarind Village is an oasis of calm and tranquility, the perfect base for exploring Chiang Mai and beyond.&#x000A;&#x000A;' name='description'>
        <link rel="stylesheet" media="screen" href="https://dkgzabag3frbh.cloudfront.net/assets/public-d0e92257a877a782482d702d42065cd5.css" />

        <!--[if lte IE 7]>
    <link rel="stylesheet" media="screen" href="https://dkgzabag3frbh.cloudfront.net/assets/public-ie-8d041f8d3628873c34228ea097af88e0.css" />
    <![endif]-->
        <!--[if gte IE 7]>
    <link rel="stylesheet" media="screen" href="https://dkgzabag3frbh.cloudfront.net/assets/public-ie-corners-e8cf34f6ee863ae371c890e681d7fb59.css" />
    <![endif]-->

        <!--  <link rel="stylesheet" href="/resources/demos/style.css">-->
        <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>assets/gallery_plugin/dist/magnific-popup.css">
        <script src="<?= base_url() ?>assets/gallery_plugin/dist/jquery.magnific-popup.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.image-link').magnificPopup({type: 'image'});



                $('.video').magnificPopup({
                    type: 'iframe',

                    iframe: {
                        patterns: {
                            dailymotion: {

                                index: 'dailymotion.com',

                                id: function (url) {
                                    var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                                    if (m !== null) {
                                        if (m[4] !== undefined) {

                                            return m[4];
                                        }
                                        return m[2];
                                    }
                                    return null;
                                },

                                src: 'http://www.dailymotion.com/embed/video/%id%'

                            }
                        }
                    }


                });

            });


        </script>

    <style>
                 #main {
                width: 1030px; 
                margin: 0 auto;
                overflow: hidden; 
                background: white;
                box-shadow: 0 0 0 0 #000000;
            }
            body{
                background: #FFF;
            }
        </style>

    </head>

    <body>
        <div id='main'>
            <div id='content'>
                <div class='overview' >
                    <!--                    <div class='header'>
                                            <h1>Shon Shi wa</h1>
                                        </div>-->
                    <div class=''>
                        <h3>Please Book Date and Time</h3>
                    </div>
                    <script>
                        $(function () {
                            $(".datepicker").datepicker({
                                minDate: 0,
                                dateFormat: 'yy-mm-dd',
                            });
                            
                            
                            $(".datepicker").on("change", function () {
                                var date_book = $(this).val();
                                var dataAmt = $('#amount').val();
                                // alert(selected);
                                console.log(date_book);
                                location.href = "<?= base_url() ?>reservations/" + date_book +'/'+dataAmt;
                            });
                        });
                    </script>
                    <div class='availability'>
                        <table cellspacing='0' class='rates'>
                            <thead class='controls'>
                            <form action="/properties/tamarindvildirect?locale=en" accept-charset="UTF-8" method="get">
                                <input name="utf8" type="hidden" value="&#x2713;" />
                                <input type="hidden" name="locale" id="locale" value="en" />

                                <tr>
                                    <th class='date_navigation' colspan='18'>
                                        <table>
                                            <tr>
                                                <th class='date_nav date_from_nav'>
                                                    <div class='date_from'>
                                                        <label for="Date_from">Date from : </label>
                                                        <input style="cursor: text;" type="text" readonly="" name="start_date_view" id="datepicker" value="<?= $get_select_date ?>" class="datepicker calendar"/>
                                                        <img class="ui-datepicker-trigger datepicker" src="https://dkgzabag3frbh.cloudfront.net/assets/cal_button-9ef4427f2df5642f217a7dffcf9aa36a.png" alt="Select a date" title="Select a date">

                                                    </div>

                                                </th>

                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                <tr>
                                    <th class='date_navigation' colspan='18'>
                                        <table>
                                            <tr>
                                                <th class='date_nav date_from_nav'>

                                                    <div class='date_from'>
                                                        <label for="Date_from">Amount : </label>
<!--                                                        <input  type="number"  name="" id="" value="1" class="" placeholder="Amount"/>-->
                                                        <select id="amount" style="border: 1px solid #d1d1d1; padding: 0px 3px; height: 22px;line-height: 22px;width: 100px; float: left;">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>

                                                    </div>
                                                </th>

                                            </tr>
                                        </table>
                                    </th>
                                </tr>

                            </form>

                            </thead>
                            <thead>
                                <tr>
                                    <?php
                                    if ($data) {
                                        // print_r($data);
                                    }
                                    ?>
                                    <th class='note' colspan='2' style="text-align: center;"><b>Infomation Detail</b></th>
                                    <th class='rack_rate'>Price Rate</th>
                                    <?php foreach ($data as $value) { ?>
                                        <th class='date <?= $value['weekend'] ?>'>
                                            <span class='day_name'><?= $value['dayofweek'] ?></span>
                                            <span class='day'><?= $value['day'] ?></span>
                                            <span class='month'><?= $value['M'] ?></span>
                                            <span class='year'><?= $value['year'] ?></span>
                                        </th>

                                    <?php } ?>

                                </tr>
                            </thead>
                            <tbody>

                            <script>

                                var old_index = '';
                                var cnt = 0;
                                var select_date = '';
                                var select_time = '';
                                var select_treatment_id = '';

                                function show_time(ele, date, treatment_id) {

                                    var html_time = '';
                                    select_date = date

                                    $.ajax({
                                        url: "<?= base_url('ajax_get_time_bydate_treatment_id') ?>/" + date + "/" + treatment_id,
                                        method: "GET",
                                        //   data: send,
                                        dataType: "json",
                                        success: function (data) {

                                            $.each(data, function (key, value) {
                                                //   console.log(value);
                                                var booked = value.booked;
                                                var time = value.time;
                                                var treatment_id = value.treatment_id;
                                                var c_book = booked === '' ? 'Select' : 'Booked';

                                                html_time += "<td class='text-center " + booked + "'>";
                                                html_time += " <div>" + time.toString() + "</div>";
                                                if (booked === '') {
                                                    html_time += "  <div>  <input type='hidden' value='" + treatment_id + "' class='c_treatment_id'><input type='hidden' value='" + time + "' class='c_time'><a  href='javascript:;' onclick=select_this_time(this) >" + c_book + "</a></div></td>";
                                                } else {
                                                    html_time += "  <div>  <input type='hidden' value='" + treatment_id + "' class='c_treatment_id'><input type='hidden' value='" + time + "' class='c_time'>" + c_book + "</div></td>";
                                                }




                                            });

                                            // var detail_time = $('.detail_time').show();
                                            // detail_time.find('.insert_html tbody tr').append('<p>asdasdsadasd</p>');
                                            //  detail_room
                                            //  insert_html
                                            $(ele).closest('tbody').find('.detail_time').hide();

                                            $(ele).closest('tr').next().show();
                                            var ele_insert = $(ele).closest('tr').next().find('.insert_html tbody tr');
                                            ele_insert.html('');
                                            ele_insert.append(html_time);

                                            //  $(ele).closest('td').removeClass('active_select');

                                            //  $(ele).closest('td').addClass('active_select');

                                            $(ele).closest('tbody').each(function (i, tr) {
                                                // tr.each(function (i, td) {
                                                console.log(this);
                                                //});
                                            });
                                            var tbl = $(ele).closest('tbody');
                                            tbl.find('td').each(function () {
                                                $(this).removeClass('active_select');


                                            });
                                            $(ele).closest('td').addClass('active_select');





                                        }

                                    });
                                    $('.booking_now').css('opacity', '0.5');
                                    $('.booking_now').hide();



                                }



                                function select_this_time(ele) {



                                    var c_time = $(ele).closest('div').find('.c_time').val();
                                    var c_treatment_id = $(ele).closest('div').find('.c_treatment_id').val();
                                    select_treatment_id = c_treatment_id;
                                    select_time = c_time;

                                    var arr_select_time = select_time.split(':');
                                    console.log(arr_select_time);


                                    var tbl = $(ele).closest('tbody');
                                    tbl.find('td').each(function () {
                                        $(this).removeClass('active_selected');
                                        //  $(this).text('Select');
                                        $(this).find('a').text('Select');


                                    });

                                    $(ele).text('Selected').closest('td').addClass('active_selected');
                                    console.log(c_treatment_id);
                                    //  $('.data_user_select_time').html('Date ' + select_date + ' Time ' + select_time);


                                    $('.booking_now').css('opacity', '1');
                                    $('.booking_now').show();
                                    
                                    var val_amount =  $('#amount').val();
                                   


                                    $('.booking_now').attr('href', '<?= base_url() ?>' + 'reservations_confirm/' + select_date + '/' + arr_select_time[0] + '-' + arr_select_time[1] + '/' + select_treatment_id + '/' + val_amount);








                                }

                            </script>

                            <?php foreach ($data_price as $value) { ?>
                                <tr>
                                    <td class='room_name' colspan="2">
                                        <table class='rate_name_table'>
                                            <tr>
                                                <td>
                                                    <div class='tooltip_content'style="display: block;" >
                                                        <?= $value['price_Title']['en'] ?>
                                                    </div>

                                                    <a class="details gotodetail" id="price_<?= $value['price_ID'] ?>link" href="#"><i class="fa fa-file-text"></i>Details</a>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                    <td class='rack_rate'><?= $value['price_Cost']['en'] ?></td>

                                    <?php foreach ($data as $value2) { ?>

                                        <td class='rate' >
                                            <a href="javascript:;" onclick="show_time(this, '<?= $value2['date'] ?>', '<?= $value['price_ID'] ?>')"><?= $value['price_Cost']['en'] ?> </a>
                                        </td>

                                    <?php } ?>


                                </tr>
                                <tr class="detail_room detail_time" style="display: none;">
                                    <td class='room_name'>
                                        <table class='rate_name_table'>
                                            <tr>
                                                <td>
                                                    <div class='tooltip_content'>Select Time <i class="fa fa-clock-o"></i></div>

                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class='book'>
                                        <?php $data_time ?>
                                    </td>
                                    <td class='rack_rate' colspan="19">
                                        <div  style="overflow-x:  scroll;    width: 734px;">
                                            <table class='insert_html' style="margin: 0;min-width: 100%;">
                                                <tr>


                                                </tr>
                                            </table>
                                        </div>

                                    </td> 

                                </tr>

                            <?php } ?>     


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class='bottom_left_corner bottom_right_corner' colspan='17'>

                                        <a class="booking_now book_now confirm " href=""  style="display: none;">
                                            <i class="fa fa-chevron-circle-right"></i>

                                            Book Now

                                        </a>

                                    </th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                    <div class='property' >


                        <h2>Details List</h2>
                        <div class='rooms'>


                            <?php foreach ($data_price as $value) { ?>
                                <div class='room' id="price_<?= $value['price_ID'] ?>">


                                    <div class='photo'>
                                        <a  class="photo_small image-link" href="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>">
                                            <img alt="" src="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>" />
                                        </a>
                                        <p style="margin: 0;text-align: center;font-weight: bold;">Pirce: 5000</p>
                                        <a class="photos image-link" href="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>"><i class="fa fa-camera"></i>Photos</a>
                                    </div>
                                    <div class='description_features'>
                                        <div class='description'>
                                            <h3>
                                                <?= $value['price_Title']['en'] ?>
                                            </h3>
                                            <?= $value['price_Detail']['en'] ?>
                                        </div>

                                    </div>
                                </div>                           
                            <?php } ?>


                        </div>


                    </div>


                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                </div>


            </div>
            <div id='footer'></div>
        </div>
        <div id='loading'></div>
        <!--<script src="https://dkgzabag3frbh.cloudfront.net/assets/public-25ab609eff3dd2810b030540da823230.js"></script>-->
        <!--[if lte IE 6]>
    <script src="https://dkgzabag3frbh.cloudfront.net/assets/jquery.bgiframe.min-8f147967cac49f794fd36f58cdd5c85b.js"></script>
    <![endif]-->

        <div class='tip' id='room_rate_date_tooltip'></div>
        <div class='tip' id='extra_tooltip'></div>
        <div class='tip' id='room_tooltip'></div>
        <style>
            a.book_now, a.book_now:hover, a.book, a.book:hover, a.book:visited, a.book_room, a.book_room:hover, a.room_enquiry, a.room_enquiry:hover, a.enquire, a.enquire:hover, a.next, a.next:hover, a.next:visited {
                background-color: #45bec3;
            }
            table.rates tfoot th, .reservation .pricing table tfoot th, dl.rating, .reservation .header dl.rating, input.check_availability {
                background-color: #a7d2d4;
            }
            body{
                background: #a7d2d4;
            }
            .room {
                display: inline-block;
                clear: both;
                background-color: rgb(228, 253, 254);
                padding: 10px 0;
            }

            a, a.details, a.photos, .room .photo a {
                color: #39a3a8;
            }
            a:visited, a.details:visited, a.photos:visited, .room .photo a:visited {
                color: #39a3a8;
            }

            h1,h2,h3{
                color: #008d93 !important; 
            }
            .room a{
                color: #FFF;
            }
            .room .photo .photo_small {
                border: 1px solid #cee9ea;
                padding: 5px;
                margin: 0 5px 5px 0;
                background-color: white;
                margin-left: 10px;
                display: inline-block;
            }

            a:hover, a.details:hover, a.photos:hover, .room .photo a:hover {
                color: #208180;
            }
            a:visited, a.details:visited, a.photos:visited, .room .photo a:visited {
                color: #208180;
            }
            .text-center{
                text-align: center;
            }
            .booked{
                opacity: 0.4;
            }
            .booked a{
                text-decoration: none;
            }


            form.reservation .actions {
                margin-left: 0;
                padding: 20px 0 10px 420px;
                display: inline-block;
            }

            .ui-state-active, .ui-widget-content .ui-state-active, .reservation h3 em, .ui-datepicker .ui-datepicker-title {
                background: #0b8e95;
            }
            form.reservation .sections {

                background: #e4fdfe;
            }
            table th{
                line-height: 19px;
            }
            input.calendar {
                border: 1px solid #d1d1d1;
                padding: 0px 3px;
                height: 22px;
                line-height: 22px;
                width: 100px;
                float: left;
            }
            table.rates table.rate_name_table td {
                line-height: 19px;
            }
            table.rates td {
                background-color: #e2f1f6;
                height: 45px;
                padding: 2px 9px;
                /* border-bottom: 2px solid white; */
            }
            th.date span.year {
                display:none;
            }
            .active_select{
                background:  #089099 !important;
                color: #FFF !important;
            }
            .active_select > a{

                color: #FFF !important;
            }

            .active_selected{
                background:  #089099 !important;
                color: #FFF !important;
            }
            .active_selected a{
                color: #FFF !important;
            }
            a:hover,a:active,a:visited,a:focus{
                text-decoration: none !important;
            }
            .booking_now{
                opacity: 0.5;
            }
            .description{
                /* white-space: pre-wrap; */
                white-space: -moz-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                word-wrap: break-word;

            }
            .active_detail{
                background: #fff2f2;
            }
            .mfp-iframe-holder .mfp-content {
                line-height: 0;
                width: 100%;
                max-width: 1052px;
            }
        </style>


        <!--                 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

        <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>-->
        <script>
            function goToByScroll(id) {
                // Reove "link" from the ID
                id = id.replace("link", "");
                // Scroll

                $('html,body').animate({
                    scrollTop: $("#" + id).offset().top - 100},
                        'slow');

                $('.rooms .room').removeClass('active_detail');

                $("#" + id).addClass('active_detail');
            }

            $("a.gotodetail").click(function (e) {
                // Prevent a page reload when a link is pressed

                e.preventDefault();
                // Call the scroll function
                goToByScroll($(this).attr("id"));
            });

//set ค่า amount จาก get url
            var amount = <?= $amount; ?>;
            $('#amount').val(amount);


        </script>
        <!--<a class="video" href="http://member-cccm.tk/reservations/2017-03-20">Open DailyMotion video</a>-->
    </body>

</html>  