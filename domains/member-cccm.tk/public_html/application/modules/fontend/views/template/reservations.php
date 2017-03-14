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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div id='main'>

            <div id='content'>


                <div class='overview' >
                    <div class='header'>
                        <h1>Shon Shi wa</h1>



                    </div>
                    <div class=''>
                        <h3>Please Book Date and Time</h3>



                    </div>

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
<!--                                                <th class='date_nav top_left_corner'>
                                                    <ul class='back'>
                                                        <li><a class="week" data-date="12 Mar 2017" href="/properties/tamarindvildirect?check_in_date=2017-03-12&amp;check_out_date=2017-03-13&amp;currency=THB&amp;locale=en&amp;number_adults=1&amp;number_children=0&amp;start_date=2017-03-12">back 1 week</a>
                                                        </li>
                                                        <li><a class="day" data-date="12 Mar 2017" href="/properties/tamarindvildirect?check_in_date=2017-03-12&amp;check_out_date=2017-03-13&amp;currency=THB&amp;locale=en&amp;number_adults=1&amp;number_children=0&amp;start_date=2017-03-12">back 1 day</a>
                                                        </li>
                                                    </ul>

                                                </th>-->
                                            <script>
                                                $(function () {
                                                    $(".datepicker").datepicker({
                                                        minDate: 0,
                                                        dateFormat: 'yy-mm-dd',
                                                    });
                                                    $(".datepicker").on("change", function () {
                                                        var date_book = $(this).val();
                                                        // alert(selected);
                                                        console.log(date_book);
                                                        location.href = "<?= base_url() ?>reservations/" + date_book;
                                                    });
                                                });
                                            </script>
                                            <th class='date_nav date_from_nav'>
                                                <div class='date_from'>
                                                    <label for="Date_from">Date from</label>
                                                    <input style="cursor: text;" type="text" readonly="" name="start_date_view" id="datepicker" value="<?= $get_select_date ?>" class="datepicker calendar"/>
                                                    <img class="ui-datepicker-trigger datepicker" src="https://dkgzabag3frbh.cloudfront.net/assets/cal_button-9ef4427f2df5642f217a7dffcf9aa36a.png" alt="Select a date" title="Select a date">
                                                    <input type="hidden" name="start_date" id="start_date" value="2017-03-12" />
                                                    <input type="hidden" name="check_in_date" id="check_in_date" value="2017-03-12" />
                                                    <input type="hidden" name="check_out_date" id="check_out_date" value="2017-03-13" />
                                                    <input type="hidden" name="number_adults" id="number_adults" value="1" />
                                                    <input type="hidden" name="number_children" id="number_children" value="0" />
                                                </div>
                                            </th>
<!--                                                <th class='date_nav top_right_corner'>
                                                <ul class='forward'>
                                                    <li><a class="day" data-date="13 Mar 2017" href="/properties/tamarindvildirect?check_in_date=2017-03-12&amp;check_out_date=2017-03-13&amp;currency=THB&amp;locale=en&amp;number_adults=1&amp;number_children=0&amp;start_date=2017-03-13">forward 1 day</a>
                                                    </li>
                                                    <li><a class="week" data-date="19 Mar 2017" href="/properties/tamarindvildirect?check_in_date=2017-03-12&amp;check_out_date=2017-03-13&amp;currency=THB&amp;locale=en&amp;number_adults=1&amp;number_children=0&amp;start_date=2017-03-19">forward 1 week</a>
                                                    </li>
                                                </ul>

                                            </th>-->
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




                                $('.booking_now').attr('href', '<?= base_url() ?>' + 'reservations_confirm/' + select_date + '/' + arr_select_time[0] + '-' + arr_select_time[1] + '/' + select_treatment_id);








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
                                             
                                                <a class="details" href="#room_79782"><i class="fa fa-file-text"></i>Details</a>
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


                        <h2>Details</h2>
                        <div class='rooms'>


                            <?php foreach ($data_price as $value) { ?>
                                <div class='room' id='room_79782'>
                                    <div class='photo_overlay room_photo_overlay overlay' data-id='room_79782'>
                                        <div class='header'>
                                            <h3>Tamarind Village</h3>
                                            <h4>Lanna </h4>
                                        </div>
                                        <div class='hero'>
                                            <div class='thumbs'>
                                                <ul class='carousel-thumb'>
                                                    <li class='photo'>
                                                        <a data-slide-index="0" href="#"><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/239245/239245/thumb_Lanna_Room__1_.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="100" height="100" />
                                                        </a>
                                                    </li>
                                                    <li class='photo'>
                                                        <a data-slide-index="1" href="#"><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/281948/281948/thumb_Lanna_Room_1.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="100" height="100" />
                                                        </a>
                                                    </li>
                                                    <li class='photo'>
                                                        <a data-slide-index="2" href="#"><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/113773/113773/thumb_Lanna_Room_Singles.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="100" height="100" />
                                                        </a>
                                                    </li>
                                                    <li class='photo'>
                                                        <a data-slide-index="3" href="#"><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/113772/113772/thumb_Lanna_Room_Double.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="100" height="100" />
                                                        </a>
                                                    </li>
                                                    <li class='photo'>
                                                        <a data-slide-index="4" href="#"><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/239246/239246/thumb_Bathroom_Lannna_Room.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="100" height="100" />
                                                        </a>
                                                    </li>
                                                    <li class='photo'>
                                                        <a data-slide-index="5" href="#"><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/239247/239247/thumb_Bathroom_Lanna_Deluxe_Room.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="100" height="100" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <span class='edge'></span>
                                            <span class='container'>
                                                <ul class='carousel-standard'>
                                                    <a href="#"><li class='photo'><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/239245/239245/standard_Lanna_Room__1_.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="300" height="214" /></li>
                                                    </a><a href="#"><li class='photo'><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/281948/281948/standard_Lanna_Room_1.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="300" height="219" /></li>
                                                    </a><a href="#"><li class='photo'><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/113773/113773/standard_Lanna_Room_Singles.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="220" height="300" /></li>
                                                    </a><a href="#"><li class='photo'><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/113772/113772/standard_Lanna_Room_Double.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="213" height="300" /></li>
                                                    </a><a href="#"><li class='photo'><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/239246/239246/standard_Bathroom_Lannna_Room.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="261" height="300" /></li>
                                                    </a><li class='photo'><img alt="Lanna" data-src="https://dkgzabag3frbh.cloudfront.net/attachments/room_type_photos/images/239247/239247/standard_Bathroom_Lanna_Deluxe_Room.jpg" src="https://dkgzabag3frbh.cloudfront.net/assets/placeholder-e3ebc8c829ab25371392d3c772ccdc47.png" width="249" height="300" /></li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>

                                    <div class='photo'>
                                        <a rel=".photo_overlay[data-id=room_79782]" class="photo_small" href="#">
                                            <img alt="Lanna" src="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>" />
                                        </a><a rel=".photo_overlay[data-id=room_79782]" class="photos" href="#"><i class="fa fa-camera"></i>Photos</a>
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

                    <div class='overlay' id='enquiry'>
                        <h3>Make an enquiry</h3>
                        <p>Tamarind Village
                        </p>
                        <form novalidate="novalidate" class="formtastic enquiry" action="/properties/tamarindvildirect/enquiry?locale=en" accept-charset="UTF-8" method="post">
                            <input name="utf8" type="hidden" value="&#x2713;" />
                            <input type="hidden" name="authenticity_token" value="Iv0aGwn0mYRSmaIIZLQZ+nU+7p4M7VLB4CknPS9/Lx9JwOl2zat/kM6xfLYtQBp5+76Dt8l4HGj1rbNHGQgXUQ==" />
                            <input type="hidden" name="st" id="st" value="BAhvOg1TcGFtVGVzdAY6DkBxdWVzdGlvbkkiCjEgKyAxBjoGRVQ=" />
                            <fieldset class="inputs">
                                <ol>
                                    <li class="hidden input required" id="enquiry_room_rate_id_input">
                                        <input id="enquiry_room_rate_id" type="hidden" name="enquiry[room_rate_id]" />

                                    </li>
                                    <li class="hidden input required" id="enquiry_date_input">
                                        <input id="enquiry_date" type="hidden" name="enquiry[date]" />

                                    </li>
                                    <li class="string input optional stringish" id="enquiry_name_input">
                                        <label for="enquiry_name" class="label">Name</label>
                                        <input id="enquiry_name" type="text" name="enquiry[name]" />

                                    </li>
                                    <li class="string input optional stringish" id="enquiry_phone_input">
                                        <label for="enquiry_phone" class="label">Phone</label>
                                        <input id="enquiry_phone" type="text" name="enquiry[phone]" />

                                    </li>
                                    <li class="string input optional stringish" id="enquiry_email_input">
                                        <label for="enquiry_email" class="label">Email</label>
                                        <input id="enquiry_email" type="text" name="enquiry[email]" />

                                    </li>
                                    <li class='string optional' id='enquiry_answer_input'>
                                        <label for='enquiry_answer'>
                                            Please answer the following maths question:
                                            <br> 1 + 1 =
                                            <input id='enquiry_answer' name='enquiry[answer]' size='50' type='text'>
                                            <p class='inline-hints'>Required to bypass the spam filter</p>
                                        </label>
                                    </li>
                                    <li class="text input optional" id="enquiry_message_input">
                                        <label for="enquiry_message" class="label">Message</label>
                                        <textarea rows="20" id="enquiry_message" name="enquiry[message]">
                                        </textarea>

                                    </li>
                                </ol>
                            </fieldset>
                            <fieldset class="buttons">
                                <ol>
                                    <li>
                                        <a class='enquire'>
                                            <i class="fa fa-chevron-circle-right"></i> Enquire
                                        </a>
                                    </li>
                                </ol>
                            </fieldset>
                        </form>
                    </div>

                    <form novalidate="novalidate" class="formtastic reservation" id="new_reservation" action="/reservations/tamarindvildirect/79782?locale=en" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="1lPyh4YhCdb5RbvG8MyL05OkCInAeXmAkSV2+Z3z97K9bgHqQn7vwmVtZXi5OIhQHSRloAXsNymEoeKDq4TP/A=="><input type="hidden" name="reservation[promotion_code]" id="reservation_promotion_code">
                        <div class="other_form"></div>
                        <ol class="final_step">
                            <li class="step">
                                <h3>
                                    <em>Step <strong>3</strong></em>
                                    <span class="directions">Enter guest details</span>
                                    <span class="note">Please fill in required information</span>
                                </h3>
                                <div class="sections">
                                    <div class="section section1">
                                        <fieldset class="inputs"><legend><span>Guest Details</span></legend><ol><li class="string input required stringish" id="reservation_guest_first_name_input"><label for="reservation_guest_first_name" class="label">First name<abbr title="required">*</abbr></label><input maxlength="50" size="50" id="reservation_guest_first_name" class="required" type="text" name="reservation[guest_first_name]" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

                                                </li>
                                                <li class="string input required stringish" id="reservation_guest_last_name_input"><label for="reservation_guest_last_name" class="label">Last name<abbr title="required">*</abbr></label><input maxlength="50" size="50" id="reservation_guest_last_name" class="required" type="text" name="reservation[guest_last_name]">

                                                </li>
                                                <li class="email input required stringish" id="reservation_guest_email_input"><label for="reservation_guest_email" class="label">Email<abbr title="required">*</abbr></label><input maxlength="100" size="50" id="reservation_guest_email" class="required email" type="email" name="reservation[guest_email]">

                                                </li>
                                                <li class="phone input required stringish" id="reservation_guest_phone_number_input"><label for="reservation_guest_phone_number" class="label">Contact Number (mobile preferred)<abbr title="required">*</abbr></label><input maxlength="20" size="20" id="reservation_guest_phone_number" class="required" type="tel" name="reservation[guest_phone_number]">

                                                </li>
                                                <li class="string input optional stringish" id="reservation_guest_organisation_input"><label for="reservation_guest_organisation" class="label">Organisation (if applicable)</label><input maxlength="255" size="50" id="reservation_guest_organisation" type="text" name="reservation[guest_organisation]">

                                                </li>
                                                <li class="string input required stringish" id="reservation_guest_address_input"><label for="reservation_guest_address" class="label">Address line 1<abbr title="required">*</abbr></label><input maxlength="255" size="50" id="reservation_guest_address" class="required" type="text" name="reservation[guest_address]">

                                                </li>
                                                <li class="string input optional stringish" id="reservation_guest_address2_input"><label for="reservation_guest_address2" class="label">Address line 2</label><input maxlength="255" size="50" id="reservation_guest_address2" type="text" name="reservation[guest_address2]">

                                                </li>
                                                <li class="string input required stringish" id="reservation_guest_city_input"><label for="reservation_guest_city" class="label">City<abbr title="required">*</abbr></label><input maxlength="100" size="50" id="reservation_guest_city" class="required" type="text" name="reservation[guest_city]">

                                                </li>
                                                <li class="string input optional stringish" id="reservation_guest_state_input"><label for="reservation_guest_state" class="label">State</label><input maxlength="100" size="50" id="reservation_guest_state" type="text" name="reservation[guest_state]">

                                                </li>

                                                <li class="string input required stringish" id="reservation_guest_post_code_input"><label for="reservation_guest_post_code" class="label">Post Code<abbr title="required">*</abbr></label><input maxlength="12" size="12" id="reservation_guest_post_code" class="required" type="text" name="reservation[guest_post_code]">

                                                </li>
                                            </ol>
                                        </fieldset>
                                    </div>
                                    <!--                                    <div class="section section2" style="di">
                                                                         
                                                                                <fieldset class="inputs"><legend><span>Guest Details</span></legend><ol>
                                                                                        <li class="string input required stringish" id="reservation_guest_first_name_input"><label for="reservation_guest_first_name" class="label">First name<abbr title="required">*</abbr></label><input maxlength="50" size="50" id="reservation_guest_first_name" class="required" type="text" name="reservation[guest_first_name]" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    
                                                                                    </li>
                                                                                    <li class="string input required stringish" id="reservation_guest_last_name_input"><label for="reservation_guest_last_name" class="label">Last name<abbr title="required">*</abbr></label><input maxlength="50" size="50" id="reservation_guest_last_name" class="required" type="text" name="reservation[guest_last_name]">
                                    
                                                                                    </li>
                                                                                    <li class="email input required stringish" id="reservation_guest_email_input"><label for="reservation_guest_email" class="label">Email<abbr title="required">*</abbr></label><input maxlength="100" size="50" id="reservation_guest_email" class="required email" type="email" name="reservation[guest_email]">
                                    
                                                                                    </li>
                                                                                    <li class="phone input required stringish" id="reservation_guest_phone_number_input"><label for="reservation_guest_phone_number" class="label">Contact Number (mobile preferred)<abbr title="required">*</abbr></label><input maxlength="20" size="20" id="reservation_guest_phone_number" class="required" type="tel" name="reservation[guest_phone_number]">
                                    
                                                                                    </li>
                                                                                    <li class="string input optional stringish" id="reservation_guest_organisation_input"><label for="reservation_guest_organisation" class="label">Organisation (if applicable)</label><input maxlength="255" size="50" id="reservation_guest_organisation" type="text" name="reservation[guest_organisation]">
                                    
                                                                                    </li>
                                                                                    <li class="string input required stringish" id="reservation_guest_address_input"><label for="reservation_guest_address" class="label">Address line 1<abbr title="required">*</abbr></label><input maxlength="255" size="50" id="reservation_guest_address" class="required" type="text" name="reservation[guest_address]">
                                    
                                                                                    </li>
                                                                                    <li class="string input optional stringish" id="reservation_guest_address2_input"><label for="reservation_guest_address2" class="label">Address line 2</label><input maxlength="255" size="50" id="reservation_guest_address2" type="text" name="reservation[guest_address2]">
                                    
                                                                                    </li>
                                                                                    <li class="string input required stringish" id="reservation_guest_city_input"><label for="reservation_guest_city" class="label">City<abbr title="required">*</abbr></label><input maxlength="100" size="50" id="reservation_guest_city" class="required" type="text" name="reservation[guest_city]">
                                    
                                                                                    </li>
                                                                                    <li class="string input optional stringish" id="reservation_guest_state_input"><label for="reservation_guest_state" class="label">State</label><input maxlength="100" size="50" id="reservation_guest_state" type="text" name="reservation[guest_state]">
                                    
                                                                                    </li>
                                                                                   
                                                                                    <li class="string input required stringish" id="reservation_guest_post_code_input"><label for="reservation_guest_post_code" class="label">Post Code<abbr title="required">*</abbr></label><input maxlength="12" size="12" id="reservation_guest_post_code" class="required" type="text" name="reservation[guest_post_code]">
                                    
                                                                                    </li>
                                                                                </ol>
                                                                            </fieldset>
                                                                        </div>-->

                                </div>

                                <div class="actions">
                                    <a class="book_now confirm" rel="#confirm_dialog">
                                        <i class="fa fa-chevron-circle-right"></i>
                                        Book Now
                                    </a>
                                    <input type="submit" name="commit" value="Book Now" class="create">
                                </div>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </li>
                        </ol>
                    </form>

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
        </style>


        <!--                 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    </body>

</html>  