<!DOCTYPE html>
<html lang='en'>

    <head>
        <title></title>
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <meta content='' name='description'>
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
                color: #008d93; 
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
            #main {
                width: 1030px; 
                margin: 0 auto;
                overflow: hidden; 
                background: white;
                box-shadow: 0 0 0 0 #000000;
            }
            body{
/*                background: #FFF;*/
            }
            #content{
                height: 1200px;
            }
        </style>

    </head>

    <body>

        <div id='main'>
            <div id='content'>
                <div class='overview_s' >
                    <div class='header'>
                        <h1> <i class="fa fa-calendar-check-o " aria-hidden="true"></i> Reservation Success</h1>
                        <span class="note" style="
                              float: right; color:#008d93;">
                            <h5>DONE</h5>


                        </span>



                    </div>
                    <div class=''>


                        <div style="text-align: center;">
                            <img style="width: 70px;" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUyIDUyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MiA1MjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgo8Zz4KCTxwYXRoIGQ9Ik0yNiwwQzExLjY2NCwwLDAsMTEuNjYzLDAsMjZzMTEuNjY0LDI2LDI2LDI2czI2LTExLjY2MywyNi0yNlM0MC4zMzYsMCwyNiwweiBNMjYsNTBDMTIuNzY3LDUwLDIsMzkuMjMzLDIsMjYgICBTMTIuNzY3LDIsMjYsMnMyNCwxMC43NjcsMjQsMjRTMzkuMjMzLDUwLDI2LDUweiIgZmlsbD0iIzI1YWU4OCIvPgoJPHBhdGggZD0iTTM4LjI1MiwxNS4zMzZsLTE1LjM2OSwxNy4yOWwtOS4yNTktNy40MDdjLTAuNDMtMC4zNDUtMS4wNjEtMC4yNzQtMS40MDUsMC4xNTZjLTAuMzQ1LDAuNDMyLTAuMjc1LDEuMDYxLDAuMTU2LDEuNDA2ICAgbDEwLDhDMjIuNTU5LDM0LjkyOCwyMi43OCwzNSwyMywzNWMwLjI3NiwwLDAuNTUxLTAuMTE0LDAuNzQ4LTAuMzM2bDE2LTE4YzAuMzY3LTAuNDEyLDAuMzMtMS4wNDUtMC4wODMtMS40MTEgICBDMzkuMjUxLDE0Ljg4NSwzOC42MiwxNC45MjIsMzguMjUyLDE1LjMzNnoiIGZpbGw9IiMyNWFlODgiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                            <h1 style="font-weight: bold;color: #8e8e8e ;">Thank you!</h1>
                            <h3 style="font-weight: 100;font-size: 16px;color: #8e8e8e ;">You have already booked</h3>
                            <div style="padding: 11px; border: 6px solid #ddd;">
                                <div style="font-weight: 100;font-size: 16px;color: #8e8e8e ;"><i class="fa fa-calendar-check-o"></i> Reservation Date  : <?= $date_show ?></div>
                                <div style="font-weight: 100;font-size: 16px;color: #8e8e8e ;"><i class="fa fa-clock-o"></i> Reservation Time : <?= $time_show ?></div>
                            </div>
                        </div>

                    </div>
                    <p>&nbsp;</p>

                    <div class='availability'>




                    </div>


                </div>


            </div>
            <div id='footer'></div>
        </div>


    </body>

</html>  