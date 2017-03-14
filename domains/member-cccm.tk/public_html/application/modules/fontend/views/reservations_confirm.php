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

        <!--          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.js.map"></script>-->

        <link rel="stylesheet" href="<?= base_url() ?>assets/gallery_plugin/dist/magnific-popup.css">
        <script src="<?= base_url() ?>assets/gallery_plugin/dist/jquery.magnific-popup.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.image-link').magnificPopup({type: 'image'});

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
                    <div class='header'>
                        <h1><i class="fa fa-check-square"></i> Confirm reservation</h1>
                        <span class="note" style="
                              float: right; color:#008d93;">
                            <i class="fa fa-star fa-2x"></i>
                            <i class="fa fa-star fa-2x"></i>
                            <i class="fa fa-star fa-2x"></i>
                            <i class="fa fa-star fa-2x"></i>
                            <i class="fa fa-star fa-2x"></i>
                        </span>



                    </div>
                    <div class=''>
                        <h2><i class="fa fa-clock-o"></i> Date & Time Details </h2>



                    </div>
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
                                                        <label for="Date_from">Reservation Date :</label>

                                                        <label for="Date_from"><?= $fulldate ?>  <i class="fa fa-calendar-check-o"></i></label>

                                                    </div>

                                                </th>
                                            </tr>
                                            <tr>
                                                <th class='date_nav date_from_nav'>
                                                    <div class='date_from'>
                                                        <label for="Date_from">Reservation Time :</label>

                                                        <label for="Date_from"><?= $fulltime ?>  <i class="fa fa-clock-o"></i></label>

                                                    </div>

                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>

                            </form>


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



                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class='bottom_left_corner bottom_right_corner' colspan='17'>

                                        <a class="booking_now book_now confirm " href=""  style="display: none;color: #FFF;">
                                            <i class="fa fa-chevron-circle-right"></i>

                                            Confirm Book

                                        </a>

                                    </th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                    <div class='property' >


                        <h2><i class="fa fa-file-text"></i> Details of your choice.</h2>
                        <div class='rooms'>


                            <?php foreach ($data_price as $value) { ?>
                                <div class='room' id='room_79782'>

                                    <div class='photo'>
                                        <a rel=".photo_overlay[data-id=room_79782]" class="photo_small image-link" href="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>">
                                            <img alt="Lanna" src="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>" />
                                        </a>
                                        <a rel="" class="photos image-link" href="<?= base_url() ?>assets/pic_price/<?= $value['price_Picture'] ?>"><i class="fa fa-camera"></i>Photos</a>
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
                        <form  class="formtastic enquiry" action="/properties/tamarindvildirect/enquiry?locale=en" accept-charset="UTF-8" method="post">
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

                    <form  class=" reservation" id="" action="<?= base_url() ?>reservations_confirm" accept-charset="UTF-8" method="post">
                        <input type="hidden" name="treatment_id"  value="<?= $treatment_id ?>">
                        <input type="hidden" name="bookdate" value="<?= $datetime ?>">
                         <input type="hidden" name="amount" value="<?= $amount ?>">

                        <div class="other_form"></div>
                        <ol class="final_step">
                            <li class="step">
                                <h3>
                                    <em>Final Step</em>
                                    <span class="directions">Enter guest details</span>
                                    <span class="note">Please fill in required information</span>
                                </h3>
                                <div class="sections">
                                    <div class="section section1">
                                        <fieldset class="inputs"><legend><span>Guest Details</span></legend><ol><li class="string input required stringish" id="reservation_guest_first_name_input"><label for="reservation_guest_first_name" class="label">First name<abbr title="required">*</abbr></label><input maxlength="50" size="50" id="reservation_guest_first_name" class="" type="text" name="firstname" style="" required="">

                                                </li>
                                                <li class="string input required stringish" id="reservation_guest_last_name_input"><label for="reservation_guest_last_name" class="label">Last name<abbr title="required">*</abbr></label><input maxlength="50" size="50" id="reservation_guest_last_name" class="" type="text" name="lastname"  required="">

                                                </li>
                                                <li class="email input required stringish" id="reservation_guest_email_input"><label for="reservation_guest_email" class="label">Email<abbr title="required">*</abbr></label><input maxlength="100" size="50" id="reservation_guest_email" class=" email" type="email" name="email"  required="">

                                                </li>
                                                <li class="phone input required stringish" id="reservation_guest_phone_number_input"><label for="reservation_guest_phone_number" class="label">Contact Number (mobile preferred)<abbr title="required">*</abbr></label><input maxlength="20" size="20" id="reservation_guest_phone_number" class="" type="tel" name="phone"  required="">

                                                </li>

                                                <li class="string input required stringish" id="reservation_guest_address_input"><label for="reservation_guest_address" class="label">Address<abbr title="required">*</abbr></label>

                                                    <textarea rows="4" cols="50" name="address"  required=""></textarea>
                                                </li>
                                            </ol>
                                        </fieldset>
                                    </div>


                                </div>

                                <div class="actions">


                                    <button type="button" onclick="history.back();" name="btn_submit" class="classname2">  
                                        <i class="fa fa-arrow-left"></i> Back 
                                    </button>
                                    <button type="submit" name="btn_submit" value="booknow" class="classname">  
                                        <i class="fa fa-arrow-circle-right"></i>   Book now 
                                    </button>

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
                padding: 20px 0 10px 377px;
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

            .description{
                /* white-space: pre-wrap; */
                white-space: -moz-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                word-wrap: break-word;

            }
        </style>
        <style type="text/css">
            .classname {
                -moz-box-shadow: inset 0px 1px 0px 0px #bbdaf7;
                -webkit-box-shadow: inset 0px 1px 0px 0px #63d2d8;
                box-shadow: inset 0px 1px 0px 0px #a3ecf0;
                background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, rgb(57, 174, 181)), color-stop(1, #0b8e95) );
                background: -moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
                background-color: #32b0b7;
                -webkit-border-top-left-radius: 3px;
                -moz-border-radius-topleft: 3px;
                border-top-left-radius: 3px;
                -webkit-border-top-right-radius: 3px;
                -moz-border-radius-topright: 3px;
                border-top-right-radius: 3px;
                -webkit-border-bottom-right-radius: 3px;
                -moz-border-radius-bottomright: 3px;
                border-bottom-right-radius: 3px;
                -webkit-border-bottom-left-radius: 3px;
                -moz-border-radius-bottomleft: 3px;
                border-bottom-left-radius: 3px;
                text-indent: 0;
                border: 1px solid #80e5ea;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                font-size: 15px;
                font-weight: bold;
                font-style: normal;
                height: 40px;
                line-height: 35px;
                width: 86px;
                text-decoration: none;
                text-align: center;
                text-shadow: 1px 1px 0px #327d81;
                /* padding: 0 14px; */
                width: 109px;
                /* padding-bottom: 21px; */
            }
            .classname:hover {
                background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #41c9cf), color-stop(1, #3cbfc5) );
                background: -moz-linear-gradient( center top, #a7d2d4 5%, #a7d2d4 100% );
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a7d2d4', endColorstr='#a7d2d4');
                background-color: #a7d2d4;
                cursor: pointer;
            }.classname:active {
                position:relative;
                top:1px;
            }

            .classname2 {
                cursor: pointer;
                -moz-box-shadow: inset 0px 1px 0px 0px #bbdaf7;
                -webkit-box-shadow: inset 0px 1px 0px 0px #bbbbbb;
                box-shadow: inset 0px 1px 0px 0px #b3b3b3;
                background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, rgb(195, 195, 195)), color-stop(1, #929292) );
                background: -moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
                /* background-color: #32b0b7; */
                -webkit-border-top-left-radius: 3px;
                -moz-border-radius-topleft: 3px;
                border-top-left-radius: 3px;
                -webkit-border-top-right-radius: 3px;
                -moz-border-radius-topright: 3px;
                border-top-right-radius: 3px;
                -webkit-border-bottom-right-radius: 3px;
                -moz-border-radius-bottomright: 3px;
                border-bottom-right-radius: 3px;
                -webkit-border-bottom-left-radius: 3px;
                -moz-border-radius-bottomleft: 3px;
                border-bottom-left-radius: 3px;
                text-indent: 0;
                border: 1px solid #e8e8e8;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                font-size: 15px;
                font-weight: bold;
                font-style: normal;
                height: 40px;
                line-height: 35px;
                width: 86px;
                text-decoration: none;
                text-align: center;
                text-shadow: 1px 1px 0px #656565;
                /* padding: 0 14px; */
                width: 109px;
                /* padding-bottom: 21px; */
            }
            .classname2:active {
                position: relative;
                top: 1px;
            }
        </style>




        <!--                 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    </body>

</html>  