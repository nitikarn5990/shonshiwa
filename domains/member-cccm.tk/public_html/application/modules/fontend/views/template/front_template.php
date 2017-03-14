


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title></title>
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />

        <link href="http://www.tamarindvillage.com/en/style.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="http://www.tamarindvillage.com/en/js/dd.css" />



        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

        <link href="http://www.tamarindvillage.com/en/test/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />

        <link href="http://www.tamarindvillage.com/en/js/offerslide.css" rel="stylesheet" type="text/css" />

        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
                <style type="text/css">
                    body{
                        background-color: #a7d2d4;
                    }
                    .mainmenu A:link {
                        font-family: 'Prompt', sans-serif;
                        font-size: 16px;
                        color: #29596d;
                        text-decoration: none;
                        padding-right: 72px;
                    }
                    .boxcontext {
                        padding: 20px;
                        border: 1px solid #84babd;
                    }
                </style>
                <style>
                    .button{
                        -moz-box-shadow: inset 0px 1px 0px 0px #97c4fe;

                        background-color: #0d6671;
                        -moz-border-radius: 6px;
                        -webkit-border-radius: 6px;
                        border-radius: 6px;
                        /* border: 1px solid #a8b6b7; */
                        display: inline-block;
                        color: #ffffff!important;
                        text-decoration: none !important;
                        font-family: 'Prompt', sans-serif;
                        font-size: 11px;
                        font-weight: bold;
                        width: 186px;
                        height: 35px;
                        line-height: 35px;
                        text-align: center;
                        text-shadow: 2px 2px 0px #142e48;
                        margin-left: 17px;
                        margin-top: 5px;
                        -webkit-box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.75);
                        -moz-box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.75);
                        box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.75);
                    }


                    .date-pick {

                        border: 1px solid #0d6671;
                        height: 15px;

                    }

                    /*                ภาพใส่ใน input text*/
                    #input_container {
                        position:relative;

                        direction: rtl;

                    }
                    #input {
                        height:20px;
                        margin:0;
                        padding-right: 30px;
                        width: 100%;
                    }
                    #input_img {
                        position: absolute;
                        bottom: 5px;
                        right: 3px;
                        width: 13px;
                        height: 13px;
                    }
                    .amount{
                        width: 100%;
                        background: #bcdcde;
                        border: 1px solid #0d6671;
                        font-size: 11px;
                        height: 18px;
                        margin-bottom: 2px;
                        /*padding-bottom: 2px;*/
                    }
                </style>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script>
                    $(function () {
                        $(".datepicker").datepicker({
                            minDate: 0,
                            dateFormat: 'yy-mm-dd',

                        });
                        $(".datepicker").on("change", function () {
                            var date_book = $(this).val();
                            // alert(selected);
                            // console.log(date_book);
                            // location.href = "<?= base_url() ?>reservations/" + date_book;
                        });
                        //  $(".datepicker").datepicker().datepicker("setDate", new Date());
                    });
                </script>

                <style>

                    .ui-state-default,
                    .ui-widget-content .ui-state-default {
                        border: 1px solid #cacaca;
                        font-weight: bold;
                        color: #787878;
                        outline: none
                    }
                    .ui-state-default a {
                        color: #434a50;
                        text-decoration: none;
                        outline: none
                    }
                    .ui-state-default a:link,
                    .ui-state-default a:visited {
                        color: #787878;
                        text-decoration: none;
                        outline: none
                    }
                    .ui-state-hover,
                    .ui-widget-content .ui-state-hover,
                    .ui-state-focus,
                    .ui-widget-content .ui-state-focus {
                        border: 1px solid #434a50;
                        background: #f3f3f3;
                        font-weight: bold;
                        color: #2a2f34;
                        outline: none
                    }
                    .ui-state-hover a {
                        color: #2a2f34 !important;
                        text-decoration: none;
                        outline: none
                    }
                    .ui-state-hover a:hover {
                        color: black;
                        text-decoration: none;
                        outline: none
                    }
                    .ui-state-active,
                    .ui-widget-content .ui-state-active {
                        font-weight: bold;
                        color: white !important;
                        outline: none;
                        background: #509e2f
                    }
                    .ui-state-active a {
                        color: #eb8f00;
                        outline: none;
                        text-decoration: none
                    }
                    .ui-state-active a:link,
                    .ui-state-active a:visited {
                        color: #eb8f00;
                        outline: none;
                        text-decoration: none
                    }
                    .ui-state-highlight,
                    .ui-widget-content .ui-state-highlight {
                        background: #a8a8a8;
                        color: white !important
                    }
                    .ui-state-highlight a,
                    .ui-widget-content .ui-state-highlight a {
                        color: #363636
                    }
                    .ui-state-error,
                    .ui-widget-content .ui-state-error {
                        border: 1px solid #cd0a0a;
                        background: #b81900;
                        color: white
                    }
                    .ui-state-error a,
                    .ui-widget-content .ui-state-error a,
                    .ui-state-error-text,
                    .ui-widget-content .ui-state-error-text {
                        color: white
                    }
                    .ui-state-disabled,
                    .ui-widget-content .ui-state-disabled {
                        opacity: 0.35;
                        filter: Alpha(Opacity=35);
                        background-image: none
                    }
                    .ui-datepicker {
                        width: 14em;
                        padding: 0;
                        z-index: 10001 !important;
                        background: white
                    }
                    .ui-datepicker .ui-datepicker-header {
                        position: relative;
                        padding: 0
                    }
                    .ui-datepicker .ui-datepicker-prev,
                    .ui-datepicker .ui-datepicker-next {
                        position: absolute;
                        width: 20px;
                        height: 20px;
                        cursor: pointer;
                        border: 1px solid #a8a8a8
                    }
                    .ui-datepicker .ui-datepicker-prev-hover,
                    .ui-datepicker .ui-datepicker-next-hover {
                        border: 1px solid #434a50
                    }
                    .ui-datepicker .ui-datepicker-prev {
                        cursor: pointer;
                        display: block;
                        text-indent: -119988px;
                        overflow: hidden;
                        text-align: left;
                        text-transform: capitalize;
                        border: none;
                        line-height: 9999;
                        background: url(https://dkgzabag3frbh.cloudfront.net/assets/calendar_arrow_sprite-10b319103bafb35dae1e1d8db8d2c268.png) no-repeat;
                        width: 20px;
                        height: 20px;
                        overflow: hidden;
                        background-color: transparent;
                        background-position: 0px 0px;
                        left: 4px;
                        top: 4px
                    }
                    .ui-datepicker .ui-datepicker-prev:active,
                    .ui-datepicker .ui-datepicker-prev:focus {
                        outline: none
                    }
                    .ui-datepicker .ui-datepicker-prev:active {
                        background-position: 0px -20px
                    }
                    .ui-datepicker .ui-datepicker-next {
                        cursor: pointer;
                        display: block;
                        text-indent: -119988px;
                        overflow: hidden;
                        text-align: left;
                        text-transform: capitalize;
                        border: none;
                        line-height: 9999;
                        background: url(https://dkgzabag3frbh.cloudfront.net/assets/calendar_arrow_sprite-10b319103bafb35dae1e1d8db8d2c268.png) no-repeat;
                        width: 20px;
                        height: 20px;
                        overflow: hidden;
                        background-color: transparent;
                        background-position: -20px 0px;
                        right: 4px;
                        top: 4px
                    }
                    .ui-datepicker .ui-datepicker-next:active,
                    .ui-datepicker .ui-datepicker-next:focus {
                        outline: none
                    }
                    .ui-datepicker .ui-datepicker-next:active {
                        background-position: -20px -20px
                    }
                    .ui-datepicker .ui-datepicker-calendar th {
                        background: white
                    }
                    .ui-datepicker .ui-datepicker-calendar th.ui-datepicker-week-end,
                    .ui-datepicker .ui-datepicker-calendar td.ui-datepicker-week-end {
                        background: #f3f3f3
                    }
                    .ui-datepicker .ui-datepicker-title {
                        /*margin: 0 0 10px 0;*/
                        text-align: center;
                        height: 16px;
                        padding: 8px;
                        border-bottom: 1px solid #f3f3f3;
                        background: #0c536f;
                        display: block;
                        font-size: 12px;
                        font-weight: bold
                    }
                    .ui-datepicker .ui-datepicker-title .ui-datepicker-month {
                        color: white
                    }
                    .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
                        color: #f3f3f3
                    }
                    .ui-datepicker .ui-datepicker-title select {
                        float: left;
                        font-size: 1em;
                        margin: 1px 0
                    }
                    .ui-datepicker select.ui-datepicker-month-year {
                        width: 100%
                    }
                    .ui-datepicker select.ui-datepicker-month,
                    .ui-datepicker select.ui-datepicker-year {
                        width: 49%
                    }
                    .ui-datepicker .ui-datepicker-title select.ui-datepicker-year {
                        float: right
                    }
                    .ui-datepicker table {
                        width: 100%;
                        font-size: 0.9em;
                        border-collapse: collapse;
                        margin: 0 0 0.2em
                    }
                    .ui-datepicker th {
                        padding: 0.7em 0.3em;
                        text-align: center;
                        font-weight: bold;
                        border: 0
                    }
                    .ui-datepicker td {
                        border: 0;
                        padding: 1px
                    }
                    .ui-datepicker td td.ui-datepicker-today a {
                        background: #787878 !important
                    }
                    .ui-datepicker td span,
                    .ui-datepicker td a {
                        display: block;
                        padding: 0.2em;
                        text-align: right;
                        text-decoration: none
                    }
                    .ui-datepicker .ui-datepicker-buttonpane {
                        background-image: none;
                        margin: 0.7em 0 0 0;
                        padding: 0 0.2em;
                        border-left: 0;
                        border-right: 0;
                        border-bottom: 0
                    }
                    .ui-datepicker .ui-datepicker-buttonpane button {
                        float: right;
                        margin: 0.5em 0.2em 0.4em;
                        cursor: pointer;
                        padding: 0.2em 0.6em 0.3em 0.6em;
                        width: auto;
                        overflow: visible
                    }
                    .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
                        float: left
                    }
                    .ui-datepicker.ui-datepicker-multi {
                        width: auto
                    }
                    .ui-datepicker-multi .ui-datepicker-group {
                        float: left
                    }
                    .ui-datepicker-multi .ui-datepicker-group table {
                        width: 95%;
                        margin: 0 auto 0.4em
                    }
                    .ui-datepicker-multi-2 .ui-datepicker-group {
                        width: 50%
                    }
                    .ui-datepicker-multi-3 .ui-datepicker-group {
                        width: 33.3%
                    }
                    .ui-datepicker-multi-4 .ui-datepicker-group {
                        width: 25%
                    }
                    .ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,
                    .ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
                        border-left-width: 0
                    }
                    .ui-datepicker-multi .ui-datepicker-buttonpane {
                        clear: left
                    }
                    .ui-datepicker-row-break {
                        clear: both;
                        width: 100%
                    }
                    .ui-datepicker-cover {
                        display: none;
                        position: absolute;
                        z-index: -1;
                        filter: mask();
                        top: -4px;
                        left: -4px;
                        width: 200px;
                        height: 200px
                    }

                    .bottommenu A:link {
                        font-family: Arial;
                        font-size: 11px;
                        color: #000000;
                        text-decoration: none;
                    }
                    .bottommenu  {

                        color: #000000;

                    }

                    /*nav main menu*/
                    #primary_nav_wrap
                    {
                        /*margin-top:15px*/
                    }

                    #primary_nav_wrap ul
                    {
                        list-style:none;
                        position:relative;
                        float:left;
                        margin:0;
                        padding:0
                    }

                    #primary_nav_wrap ul a
                    {
                        display:block;
                        color:#333;
                        text-decoration:none;
                        font-weight:bold;
                        font-size:12px;
                        line-height:32px;
                        padding:0 15px;
                        font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif;
                        text-shadow: 0px 1px 0px #fff;
                    }

                    #primary_nav_wrap ul li
                    {
                        position:relative;
                        float:left;
                        margin:0;
                        padding:0
                    }

                    #primary_nav_wrap ul li.current-menu-item
                    {
                        background:#ddd;
                        -webkit-border-top-right-radius: 8px; 
                        -webkit-border-top-left-radius: 8px; 
                        -moz-border-radius-topright: 8px;
                        -moz-border-radius-topleft: 8px;
                        border-top-right-radius: 8px;
                        border-top-left-radius: 8px;

                    }

                    #primary_nav_wrap ul li:hover
                    {
                        background:#f6f6f6;

                        -webkit-border-top-right-radius: 8px; 
                        -webkit-border-top-left-radius: 8px; 
                        -moz-border-radius-topright: 8px;
                        -moz-border-radius-topleft: 8px;
                        border-top-right-radius: 8px;
                        border-top-left-radius: 8px;

                    }
                    #primary_nav_wrap ul li:hover :last-child{

                        -webkit-border-bottom-right-radius: 8px;
                        -webkit-border-bottom-left-radius: 8px;
                        -moz-border-radius-bottomright: 8px;
                        -moz-border-radius-bottomleft: 8px;
                        border-bottom-right-radius: 8px;
                        border-bottom-left-radius: 8px;
                    }

                    #primary_nav_wrap ul ul
                    {
                        display:none;
                        position:absolute;
                        top:100%;
                        left:0;
                        background:#fff;
                        padding:0
                    }

                    #primary_nav_wrap ul ul li
                    {
                        float:none;
                        width:250px
                    }

                    #primary_nav_wrap ul ul a
                    {
                        line-height:120%;
                        padding:10px 15px
                    }

                    #primary_nav_wrap ul ul ul
                    {
                        top:0;
                        left:100%
                            -webkit-border-bottom-right-radius: 8px;
                        -webkit-border-bottom-left-radius: 8px;
                        -moz-border-radius-bottomright: 8px;
                        -moz-border-radius-bottomleft: 8px;
                        border-bottom-right-radius: 8px;
                        border-bottom-left-radius: 8px;
                    }

                    #primary_nav_wrap ul li:hover > ul
                    {
                        display:block;

                        -webkit-border-bottom-right-radius: 8px;
                        -webkit-border-bottom-left-radius: 8px;
                        -moz-border-radius-bottomright: 8px;
                        -moz-border-radius-bottomleft: 8px;
                        border-bottom-right-radius: 8px;
                        border-bottom-left-radius: 8px;
                    }

                    nav#primary_nav_wrap ul > li > a{
                        font-family: 'Prompt', sans-serif;
                        font-size: 16px;
                        color: #29596d;
                        text-decoration: none;
                        padding-right: 60px;

                        -webkit-border-bottom-right-radius: 8px;
                        -webkit-border-bottom-left-radius: 8px;
                        -moz-border-radius-bottomright: 8px;
                        -moz-border-radius-bottomleft: 8px;
                        border-bottom-right-radius: 8px;
                        border-bottom-left-radius: 8px;
                    }

                    nav#primary_nav_wrap ul > li > a:hover{

                        -webkit-border-bottom-right-radius: 8px;
                        -webkit-border-bottom-left-radius: 8px;
                        -moz-border-radius-bottomright: 8px;
                        -moz-border-radius-bottomleft: 8px;
                        border-bottom-right-radius: 8px;
                        border-bottom-left-radius: 8px;
                    }
                    ul > li > ul >li >a{
                        padding: 8px 5px 8px 5px !important;
                        font-size: 14px !important;
                    }
                    ul li a.nav-contact{
                        padding: 0 !important;
                        font-size: 12px !important;
                        font-weight: normal !important;
                        font-family: Arial !important;
                        color: #000 !important; 

                        text-align: center;
                    }
                    ul li ul.nav-contact-sub li a{
                        text-align: center;
                        font-size: 12px !important;
                        padding-top: 5px !important;
                        padding-bottom:  5px !important;
                        font-weight: normal !important;
                    }
                    .nav-contact-sub li{
                        width: 150px !important;
                    }

                    .boxcontext h1{
                        font-family: 'Oleo Script', cursive !important;
                        font-size: 19px;
                    }

                </style>

                <!--ifram popup dialog-->
                <link rel="stylesheet" href="<?= base_url() ?>assets/gallery_plugin/dist/magnific-popup.css">

                    <script src="<?= base_url() ?>assets/gallery_plugin/dist/jquery.magnific-popup.min.js"></script>
                    <script>
                    $(document).ready(function () {
                        //  $('.image-link').magnificPopup({type: 'image'});

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



                    </head>

                    <body>


                        <div>

                            <div style="" align="center">

                                <table width="949" border="0" cellspacing="0" cellpadding="0" >
                                    <tr>
                                        <td height="100" align="left" valign="bottom"><table width="949" border="0" cellspacing="0" cellpadding="0" style=" height: 151px;">
                                                <tbody><tr style="text-align: center;">
                                                        <td width="199" align="center" valign="top" style="text-align: center;">
                                                            <a href="">
                                                                <img src="http://member-cccm.tk/assets/shonshiwa/images/logo.png" width="193" height="164" border="0" alt="" style="margin-left: 399px;text-align: center;"></a>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td align="right" valign="top" style="padding-top: 20px;">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tbody><tr>
                                                                        <td align="left" valign="middle" class="browntext">
                                                                            <a href="" class="bottommenu">Main page</a>
                                                                        </td> <!-- Link PAGE Home -->

                                                                        <td width="10" align="center" valign="middle" class="bltext">|</td>
                                                                        <td align="left" valign="middle" class="browntext">

                                                                            <nav id="primary_nav_wrap" style="z-index: 999;">
                                                                                <ul>

                                                                                    <li><a href="#" class="nav-contact" style="text-shadow: 0 0 0 rgba(222, 216, 216, 0);">Contact us</a>
                                                                                        <ul class="nav-contact-sub">
                                                                                            <li><a href="<?= base_url() ?>">Postal address</a></li>
                                                                                            <li><a href="<?= base_url() ?>">Map</a></li>
                                                                                            <li><a href="<?= base_url() ?>"> Etiquette & Tips</a></li>


                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                        </td> <!-- Link PAGE Contact Us -->

                                                                        <td width="10" align="center" valign="middle" class="bltext">&nbsp;</td>
                                                                        <td align="left" valign="middle" class="browntext" style="padding-right: 5px;">
                                                                            <a href="<?= base_url()?>nl"><img src="<?= base_url()?>/assets/shonshiwa/images/netherlands.jpg" border="0" width="24" height="18" alt="Language"></a>
                                                                        </td>
                                                                        <td align="left" valign="middle" class="browntext">
                                                                            <a href="<?= base_url()?>en"><img src="<?= base_url()?>/assets/shonshiwa/images/eng.jpg" border="0" width="24" height="18" alt="Language"></a>
                                                                        </td> 


                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>

                                                    </tr>

                                                </tbody></table>

                                        </td>
                                    </tr>
                                    <tr >

                                        <td width="100%" align="center" valign="bottom">
                                            <table border="0" cellspacing="0" cellpadding="0" style="/* text-align: center; *//* margin-left: 199px; */">

                                                <tbody><tr>
                                                        <td height="40" align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>

                                                                    <tr>
                                                                        <nav id="primary_nav_wrap" style="z-index: 999;">
                                                                            <ul>
                                                                                <li class=""><a href="<?= base_url() ?>">Home</a></li>
                                                                                <li><a>Our Philosophy</a>
                                                                                    <ul>
                                                                                        <li><a href="<?= base_url() ?>shon-shiwa-experience">Shon-Shiwa Experience</a></li>
                                                                                        <li><a href="<?= base_url() ?>terms-conditions">Terms & Conditions</a></li>

                                                                                    </ul>
                                                                                </li>
                                                                                <li><a>Treatments</a>
                                                                                    <ul>
                                                                                        <li><a href="<?= base_url() ?>treatment-signature">Signature Treatment </a></li>
                                                                                        <li><a href="<?= base_url() ?>price-list" >Price list  </a></li>
                                                                                        <li><a href="<?= base_url() ?>reservations/<?= date('Y-m-d') ?>/1" class="video">Booking service  </a></li>

                                                                                    </ul>
                                                                                </li>
                                                                                <li><a href="<?= base_url() ?>special-offers">Special Offers</a>

                                                                                </li>
                                                                                <li><a >Gallery</a>
                                                                                    <ul>
                                                                                        <li class="dir"><a href="<?= base_url() ?>photos">Photos </a></li>
                                                                                        <li><a href="<?= base_url() ?>facilities">Facilities </a></li>

                                                                                    </ul>
                                                                                </li>

                                                                                <li><a href="<?= base_url() ?>news-event" style="padding-right: 11px;">News &amp; Event</a></li>


                                                                            </ul>
                                                                        </nav>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="422" align="left" valign="top" bgcolor="#39b3c2">

                                            <div id="holder" style="width:949px; height:422px; overflow:hidden; background:#D9D0BF;">
                                                <img src="<?= base_url() ?>assets/shonshiwa/img/slide.jpg"/>
                                            </div>
                                    </tr>

                                    <tr>
                                        <td height="3" align="left" valign="top"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            <table width="949" border="0" cellspacing="0" cellpadding="0" >
                                                <tr>
                                                    <td width="268" align="left" valign="top">
                                                        <table width="268" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="left" valign="top">
                                                                    <table width="268" border="0" cellspacing="0" cellpadding="0" style="box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.54);">
                                                                        <tr>
                                                                            <td align="left" valign="top">
                                                                                <img src="<?= base_url() ?>assets/shonshiwa/images/check_search.jpg" width="268" height="32" alt="reservation" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" valign="top" bgcolor="#39b3c2">
                                                                                <div id="regisdiv">
                                                                                    <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">

                                                                                        <tr>
                                                                                            <td>
                                                                                                <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td width="122" align="left" valign="top" id="input_container">
                                                                                                            <input name="Input2" onchange="SetData1(this);" value="<?= date('Y-m-d') ?>" class="date-pick datepicker" id="bookdateA" style="width:90px;background: #bcdcde;padding-right: 38px;font-size: 12px;" readonly="readonly"/>
                                                                                                            <img id="input_img" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDUxMS42MzQgNTExLjYzNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTExLjYzNCA1MTEuNjM0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTQ4Mi41MTMsODMuOTQyYy03LjIyNS03LjIzMy0xNS43OTctMTAuODUtMjUuNjk0LTEwLjg1aC0zNi41NDF2LTI3LjQxYzAtMTIuNTYtNC40NzctMjMuMzE1LTEzLjQyMi0zMi4yNjEgICBDMzk3LjkwNiw0LjQ3NSwzODcuMTU3LDAsMzc0LjU5MSwwaC0xOC4yNjhjLTEyLjU2NSwwLTIzLjMxOCw0LjQ3NS0zMi4yNjQsMTMuNDIyYy04Ljk0OSw4Ljk0NS0xMy40MjIsMTkuNzAxLTEzLjQyMiwzMi4yNjF2MjcuNDEgICBoLTEwOS42M3YtMjcuNDFjMC0xMi41Ni00LjQ3NS0yMy4zMTUtMTMuNDIyLTMyLjI2MUMxNzguNjQsNC40NzUsMTY3Ljg4NiwwLDE1NS4zMjEsMEgxMzcuMDUgICBjLTEyLjU2MiwwLTIzLjMxNyw0LjQ3NS0zMi4yNjQsMTMuNDIyYy04Ljk0NSw4Ljk0NS0xMy40MjEsMTkuNzAxLTEzLjQyMSwzMi4yNjF2MjcuNDFINTQuODIzYy05LjksMC0xOC40NjQsMy42MTctMjUuNjk3LDEwLjg1ICAgYy03LjIzMyw3LjIzMi0xMC44NSwxNS44LTEwLjg1LDI1LjY5N3YzNjUuNDUzYzAsOS44OSwzLjYxNywxOC40NTYsMTAuODUsMjUuNjkzYzcuMjMyLDcuMjMxLDE1Ljc5NiwxMC44NDksMjUuNjk3LDEwLjg0OWg0MDEuOTg5ICAgYzkuODk3LDAsMTguNDctMy42MTcsMjUuNjk0LTEwLjg0OWM3LjIzNC03LjIzNCwxMC44NTItMTUuODA0LDEwLjg1Mi0yNS42OTNWMTA5LjYzOSAgIEM0OTMuMzU3LDk5LjczOSw0ODkuNzQzLDkxLjE3NSw0ODIuNTEzLDgzLjk0MnogTTEzNy4wNDcsNDc1LjA4OEg1NC44MjN2LTgyLjIzaDgyLjIyNFY0NzUuMDg4eiBNMTM3LjA0NywzNzQuNTlINTQuODIzdi05MS4zNTggICBoODIuMjI0VjM3NC41OXogTTEzNy4wNDcsMjY0Ljk1MUg1NC44MjN2LTgyLjIyM2g4Mi4yMjRWMjY0Ljk1MXogTTEzMC42MjcsMTM0LjMzM2MtMS44MDktMS44MDktMi43MTItMy45NDYtMi43MTItNi40MjNWNDUuNjg2ICAgYzAtMi40NzQsMC45MDMtNC42MTcsMi43MTItNi40MjNjMS44MDktMS44MDksMy45NDYtMi43MTIsNi40MjMtMi43MTJoMTguMjcxYzIuNDc0LDAsNC42MTcsMC45MDMsNi40MjMsMi43MTIgICBjMS44MDksMS44MDcsMi43MTQsMy45NDksMi43MTQsNi40MjN2ODIuMjI0YzAsMi40NzgtMC45MDksNC42MTUtMi43MTQsNi40MjNjLTEuODA3LDEuODA5LTMuOTQ2LDIuNzEyLTYuNDIzLDIuNzEySDEzNy4wNSAgIEMxMzQuNTc2LDEzNy4wNDYsMTMyLjQzNiwxMzYuMTQyLDEzMC42MjcsMTM0LjMzM3ogTTI0Ni42ODMsNDc1LjA4OGgtOTEuMzY1di04Mi4yM2g5MS4zNjVWNDc1LjA4OHogTTI0Ni42ODMsMzc0LjU5aC05MS4zNjUgICB2LTkxLjM1OGg5MS4zNjVWMzc0LjU5eiBNMjQ2LjY4MywyNjQuOTUxaC05MS4zNjV2LTgyLjIyM2g5MS4zNjVWMjY0Ljk1MXogTTM1Ni4zMjMsNDc1LjA4OGgtOTEuMzY0di04Mi4yM2g5MS4zNjRWNDc1LjA4OHogICAgTTM1Ni4zMjMsMzc0LjU5aC05MS4zNjR2LTkxLjM1OGg5MS4zNjRWMzc0LjU5eiBNMzU2LjMyMywyNjQuOTUxaC05MS4zNjR2LTgyLjIyM2g5MS4zNjRWMjY0Ljk1MXogTTM0OS44OTYsMTM0LjMzMyAgIGMtMS44MDctMS44MDktMi43MDctMy45NDYtMi43MDctNi40MjNWNDUuNjg2YzAtMi40NzQsMC45LTQuNjE3LDIuNzA3LTYuNDIzYzEuODA4LTEuODA5LDMuOTQ5LTIuNzEyLDYuNDI3LTIuNzEyaDE4LjI2OCAgIGMyLjQ3OCwwLDQuNjE3LDAuOTAzLDYuNDI3LDIuNzEyYzEuODA4LDEuODA3LDIuNzA3LDMuOTQ5LDIuNzA3LDYuNDIzdjgyLjIyNGMwLDIuNDc4LTAuOTAzLDQuNjE1LTIuNzA3LDYuNDIzICAgYy0xLjgwNywxLjgwOS0zLjk0OSwyLjcxMi02LjQyNywyLjcxMmgtMTguMjY4QzM1My44NDYsMTM3LjA0NiwzNTEuNjk3LDEzNi4xNDIsMzQ5Ljg5NiwxMzQuMzMzeiBNNDU2LjgxMiw0NzUuMDg4aC04Mi4yMjh2LTgyLjIzICAgaDgyLjIyOFY0NzUuMDg4eiBNNDU2LjgxMiwzNzQuNTloLTgyLjIyOHYtOTEuMzU4aDgyLjIyOFYzNzQuNTl6IE00NTYuODEyLDI2NC45NTFoLTgyLjIyOHYtODIuMjIzaDgyLjIyOFYyNjQuOTUxeiIgZmlsbD0iIzBkNjY3MSIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=">
                                                                                                        </td>
                                                                                                        <td width="6" align="left" valign="top">&nbsp;</td>
                                                                                                        <td width="122" align="left" valign="">

                                                                                                            <select name="" id="val_amount" onchange="SetData2(this)" class="amount">
                                                                                                                <option value="">Amount</option>
                                                                                                                <option value="1">&nbsp;1</option>
                                                                                                                <option value="2">&nbsp;2</option>
                                                                                                                <option value="3">&nbsp;3</option>
                                                                                                                <option value="4">&nbsp;4</option>
                                                                                                                <option value="5">&nbsp;5</option>
                                                                                                                <option value="6">&nbsp;6</option>
                                                                                                                <option value="7">&nbsp;7</option>
                                                                                                                <option value="8">&nbsp;8</option>
                                                                                                                <option value="9">&nbsp;9</option>
                                                                                                                <option value="10">&nbsp;10</option>
                                                                                                            </select>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td height="7"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td align="left" valign="" class="browntext ">

                                                                                                            </td>
                                                                                                            <td width="15" align="left" valign="top">&nbsp;</td>

                                                                                                            <td width="110" rowspan="2" align="center" valign="middle" class="browntext">
                                                                                                                <a  id="open_popup_booking" class="button video" > BOOK

                                                                                                                </a>

                                                                                                            </td>
                                                                                                            <script>
                                                                                                                //$('#open_popup_booking')
                                                                                                                // $a
                                                                                                                var has_select_date = 1;
                                                                                                                var has_select_amount = 0;

                                                                                                                var data_date = '<?= date('Y-m-d') ?>';


                                                                                                                var data_amt = '';
                                                                                                                function SetData1(ele) {
                                                                                                                    //  bookdateA  c

                                                                                                                    has_select_date = 1;
                                                                                                                    data_date = $(ele).val();
                                                                                                                    //console.log('ss');
                                                                                                                    //return false;
                                                                                                                    if (allow_alink()) {
                                                                                                                        // alert('open');
                                                                                                                        $('#open_popup_booking').attr('href', '<?= base_url() ?>reservations/' + data_date + '/' + data_amt);
                                                                                                                    } else {
                                                                                                                        //alert('cc');
                                                                                                                        $('#open_popup_booking').removeAttr('href');
                                                                                                                    }
                                                                                                                }
                                                                                                                function SetData2(ele) {
                                                                                                                    //  bookdateA  c

                                                                                                                    if ($(ele).val() !== '') {
                                                                                                                        has_select_amount = 1;
                                                                                                                        data_amt = $(ele).val();
                                                                                                                    } else {
                                                                                                                        has_select_amount = 0;
                                                                                                                    }


                                                                                                                    //console.log('ss');
                                                                                                                    //return false;
                                                                                                                    if (allow_alink()) {
                                                                                                                        // alert('open');
                                                                                                                        $('#open_popup_booking').attr('href', '<?= base_url() ?>reservations/' + data_date + '/' + data_amt);
                                                                                                                    } else {
                                                                                                                        //alert('cc');
                                                                                                                        $('#open_popup_booking').removeAttr('href');
                                                                                                                    }
                                                                                                                }

                                                                                                                function allow_alink() {
                                                                                                                    if (has_select_date === 1 && has_select_amount === 1) {
                                                                                                                        return true;
                                                                                                                    } else {
                                                                                                                        return false;
                                                                                                                    }
                                                                                                                }

                                                                                                                $(document).ready(function () {
                                                                                                                    var url = window.location;
                                                                                                                    // Will only work if string in href matches with location
                                                                                                                    // alert(url);
                                                                                                                    $('ul.nav a[href="' + url + '"]').parent().addClass('current-menu-item');

                                                                                                                    // Will also work for relative and absolute hrefs
                                                                                                                    $('#primary_nav_wrap ul li a').filter(function () {
                                                                                                                        console.log(this.href);
                                                                                                                        return this.href == url;
                                                                                                                    }).parent().addClass('current-menu-item').parent().parent().addClass('current-menu-item');
                                                                                                                });


                                                                                                            </script>
                                                                                                        </tr>

                                                                                                    </tbody>

                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td height="7"></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="10" align="left" valign="top" bgcolor="#39b3c2"></td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="3" align="left" valign="top"></td>
                                                            </tr>

                                                        </table></td>
                                                    <td width="681" align="right" valign="top">

                                                        <table width="675" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="left" valign="top">

                                                                    <table width="673" border="0" align="right" cellpadding="0" cellspacing="0" id="content">

                                                                        <tr>
                                                                            <td class="boxcontext">
                                                                                <?= $content ?>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <div style="position:relative;">

                                                                                    <!-- <div style="position:absolute; bottom:-10px; right:10px; font-family: Arial; font-size: 11px; color: #7D766E; width:600px; color:#ff0000;">
                                                                                    On Saturday, April 30th our reservation office’s telephone lines will be under repair between the hours of 8am and 19:00hrs Thailand time. During this time, you can contact us on either +66 84 611 3260 or +66 96 075 3070 or send an enquiry to reservation@rayavadee.com and we will reply soonest. We apologize for any inconvenience caused.
                                                                                    </div> -->
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div style="width:1px; height:1px; overflow:hidden;">
                                                                        <div id="jquery_jplayer_1" class="jp-jplayer" style="margin-top:5px;"></div>

                                                                        <div id="jp_container_1" class="jp-audio" style="display:none;">
                                                                            <div class="jp-type-single">
                                                                                <div class="jp-gui jp-interface">
                                                                                    <ul class="jp-controls">
                                                                                        <li id="PlayBut"><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                                                                        <li id="PauseBut"><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                                                                        <li id="StopBut"><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                                                                        <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                                                                        <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                                                                        <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                                                                                    </ul>
                                                                                    <div class="jp-progress">
                                                                                        <div class="jp-seek-bar">
                                                                                            <div class="jp-play-bar"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="jp-volume-bar">
                                                                                        <div class="jp-volume-bar-value"></div>
                                                                                    </div>
                                                                                    <div class="jp-time-holder">
                                                                                        <div class="jp-current-time"></div>
                                                                                        <div class="jp-duration"></div>

                                                                                        <ul class="jp-toggles">
                                                                                            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                                                                                            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="jp-title">
                                                                                    <ul>
                                                                                        <li>Cro Magnon Man</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="jp-no-solution">
                                                                                    <span>Update Required</span>
                                                                                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.				</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>						</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" valign="top"><table width="673" border="0" align="right" cellpadding="0" cellspacing="0">

                                                                        <tr>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><table width="666" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                                    <tr>
                                                                                        <td align="center" valign="top">
                                                                                            <img src="http://www.familiahiguerasgaete.com/images/slider-shadow.png?crc=203708595" width="666" height="12" alt="" style="opacity: 0.3;"/>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="5" align="left" valign="top"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center" valign="top" class="bottommenu">
                                                                                            <!--                                                                                        <a href="index2.php">Home</a>&nbsp;|&nbsp;<a href="about.php">Our Philosophy</a>&nbsp;|&nbsp;<a href="room.php">Treatments</a>&nbsp;|&nbsp;<a href=""> </a> <a href="room.php">Special offers</a>&nbsp;|&nbsp; <a href="facilities.php">Gallery</a> &nbsp;|&nbsp;<a href="destination.php">News & Event</a><br />-->
                                                                                            <!--                                                                                        &nbsp;&copy; Copyright 2017. All rights reserved<br />-->
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tbl_footer');
                                                                                            $this->db->where('id', 1);

                                                                                            $arrData = $this->db->get()->result_array();
                                                                                            //echo $arrData[0]['footer_detail']['en']

                                                                                            $data_footer_detail = unserialize($arrData[0]['footer_detail']);
                                                                                           echo $data_footer_detail[$this->session->userdata('lang')]
                                                                                            ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left" valign="top">&nbsp;</td>
                                                                                    </tr>
                                                                                </table></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                        </table>					
                                                    </td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">&nbsp;</td>
                                    </tr>
                                </table> 
                            </div>

                        </div>


                        <style>

                        </style>

                    </body>
                    </html>
