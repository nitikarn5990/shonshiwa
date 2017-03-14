<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Shon Shiwa Wellness</title>
        <meta name="description" content="Shon Shiwa Wellness" />
        <meta name="keywords" content="Shon Shiwa Wellness" />
        <link rel="shortcut icon" href="<?= base_url() ?>assets/shonshiwa/images/logo.png">
            <link href="<?= base_url() ?>assets/shonshiwa/style.css" rel="stylesheet" type="text/css" />
            <!--starslide!-->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
            <script src="<?= base_url() ?>assets/shonshiwa/dist/slippry.min.js"></script>
            <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
            <meta name="viewport" content="width=device-width">
                <link rel="stylesheet" href="<?= base_url() ?>assets/shonshiwa/slide.css">
                    <link rel="stylesheet" href="<?= base_url() ?>assets/shonshiwa/dist/slippry.css">
                        <!--end slide!-->
                        </head>
                        <body>
                            <div id="logo-language">
                                <div id="logo"><img src="<?= base_url() ?>assets/shonshiwa/images/logo.png" width="193" height="164" /></div>
                                <div id="language">Main page  |  <a href="<?= base_url('contact-us')?>">Contact us</a><label class="language"><a href="<?= base_url() ?>nl"><img src="<?= base_url() ?>assets/shonshiwa/images/netherlands.jpg" width="27" height="21" /></a> <a href="<?= base_url() ?>en"><img src="<?= base_url() ?>assets/shonshiwa/images/eng.jpg" width="27" height="21" /></a></label></div>
                            </div>
                            <div id="nav">
                                <ul>
                                    <li><a href="<?= base_url()?>">Home</a></li>
                                    <li><a href="<?= base_url('philosophy')?>">Our Philosophy</a></li>
                                    <li><a href="">Treatments</a></li>
                                    <li><a href="<?= base_url('special-offers')?>">Special Offers</a></li>
                                    <li><a href="<?= base_url('gallery')?>">Gallery</a></li>
                                    <li><a href="<?= base_url('news-event')?>">News & Event</a></li>
                                </ul>
                            </div>
                            <div id="slide">
                                <div id="sizeslide">
                                    <article class="demo_block">
                                        <ul id="demo1" style="list-style:none; position:0; margin:0;">
                                            
                                            <?php foreach ($this->F_model->get_data_slides() as $value) { ?>
                                            <li><a href="#slide1"><img src="<?= base_url() ?>assets/pic_slider/<?= $value['slider_Picture'] ?>" class="" style="max-width: 100%;"></a></li>
                                           <?php }?>
                                          
                                   
                                            
                                        </ul>
                                    </article>
                                 
                                    <script>
                                        $(function () {
                                            var demo1 = $("#demo1").slippry({
                                                transition: 'fade',
                                                useCSS: true,
                                                speed: 1000,
                                                pause: 3000,
                                                auto: true,
                                                preload: 'visible'
                                            });

                                            $('.stop').click(function () {
                                                demo1.stopAuto();
                                            });

                                            $('.start').click(function () {
                                                demo1.startAuto();
                                            });

                                            $('.prev').click(function () {
                                                demo1.goToPrevSlide();
                                                return false;
                                            });
                                            $('.next').click(function () {
                                                demo1.goToNextSlide();
                                                return false;
                                            });
                                            $('.reset').click(function () {
                                                demo1.destroySlider();
                                                return false;
                                            });
                                            $('.reload').click(function () {
                                                demo1.reloadSlider();
                                                return false;
                                            });
                                            $('.init').click(function () {
                                                demo1 = $("#demo1").slippry();
                                                return false;
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div id="content">
                                <div class="sidebar">
                                    <!--<div class="boxtxt"><img src="<?= base_url() ?>assets/shonshiwa/images/imgbook.jpg" width="334" height="154" /></div>-->
                                <table width="268" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                          <td align="left" valign="top"><table width="268" border="0" cellspacing="0" cellpadding="0">
                              <tbody><tr>
                                <td align="left" valign="top"><img src="images/reservation-head.gif" width="268" height="32" alt="reservation"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" bgcolor="#AE9A77"><div id="regisdiv">
                                    <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                                      
                                      <tbody><tr>
                                        <td><table width="250" border="0" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                              <td width="122" align="left" valign="top"><input name="Input2" class="date-pick dp-applied" id="start-dateA" style="width:120px" readonly="readonly"><a href="#" class="dp-choose-date" title="Choose date">Choose date</a></td>
                                              <td width="6" align="left" valign="top">&nbsp;</td>
                                              <td width="122" align="left" valign="top"><input name="Input2" class="date-pick dp-applied" id="end-dateA" style="width:120px" readonly="readonly"><a href="#" class="dp-choose-date" title="Choose date">Choose date</a></td>
                                            </tr>
                                        </tbody></table></td>
                                      </tr>
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                      <tr>
                                        <td><table border="0" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                              <td align="left" valign="bottom" class="browntext"># Adults: </td>
                                              <td width="15" align="left" valign="top">&nbsp;</td>
                                              <td align="left" valign="bottom" class="browntext"># Children: </td>
                                              <td width="15" align="left" valign="top">&nbsp;</td>
                                              <td width="110" rowspan="2" align="center" valign="middle" class="browntext"><a href="javascript:checkForm();"><img src="images/new-check-button-small.jpg" border="0"></a></td>
                                            </tr>
                                            <tr>
                                              <td align="left" valign="top"><span style="padding-top:3px">
                                                <div style="height:0px;overflow:hidden;position:absolute;" id="adult_msddHolder"><select name="select" id="adult" style="width:auto;">
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
                                                </select></div><div id="adult_msdd" class="dd" style="width: 40px;"><div id="adult_title" class="ddTitle"><span id="adult_arrow" class="arrow"></span><span class="textTitle" id="adult_titletext">&nbsp;1</span></div><div id="adult_child" class="ddChild" style="width: 38px; height: 157px;"><a href="javascript:void(0);" class="selected enabled" style="undefined" id="adult_msa_0">&nbsp;1</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_1">&nbsp;2</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_2">&nbsp;3</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_3">&nbsp;4</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_4">&nbsp;5</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_5">&nbsp;6</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_6">&nbsp;7</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_7">&nbsp;8</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_8">&nbsp;9</a><a href="javascript:void(0);" class="enabled" style="undefined" id="adult_msa_9">&nbsp;10</a></div></div>
                                              </span></td>
                                              <td align="left" valign="top">&nbsp;</td>
                                              <td align="left" valign="top"><span style="padding-top:3px">
                                                <div style="height:0px;overflow:hidden;position:absolute;" id="kid_msddHolder"><select name="select2" id="kid" style="width:auto;">
												  <option value="0">&nbsp;0</option>
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
                                                </select></div><div id="kid_msdd" class="dd" style="width: 40px;"><div id="kid_title" class="ddTitle"><span id="kid_arrow" class="arrow" style="background-position: 0px 0px;"></span><span class="textTitle" id="kid_titletext">&nbsp;0</span></div><div id="kid_child" class="ddChild" style="width: 38px; height: 157px;"><a href="javascript:void(0);" class="selected enabled" style="undefined" id="kid_msa_0">&nbsp;0</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_1">&nbsp;1</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_2">&nbsp;2</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_3">&nbsp;3</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_4">&nbsp;4</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_5">&nbsp;5</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_6">&nbsp;6</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_7">&nbsp;7</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_8">&nbsp;8</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_9">&nbsp;9</a><a href="javascript:void(0);" class="enabled" style="undefined" id="kid_msa_10">&nbsp;10</a></div></div>
                                              </span></td>
                                              <td align="left" valign="top">&nbsp;</td>
                                            </tr>
                                        </tbody></table></td>
                                      </tr>
                                      
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                    </tbody></table>
                                </div></td>
                              </tr>
                              <tr>
                                <td height="10" align="left" valign="top" bgcolor="#B09776"></td>
                              </tr>
                          </tbody></table></td>
                        </tr>
                        <tr>
                          <td height="3" align="left" valign="top"></td>
                        </tr>
                        <tr> 
                        	<td>        
                            	<div id="gallery">
<a href="early-bird.pdf" style="opacity: 0;" class=""><img src="images/early-bird.jpg" rel="Special&nbsp;Offer"></a>
<a href="spa-suite-offer.pdf" style="opacity: 0;" class=""><img src="images/spa-suite.jpg" rel="Special&nbsp;Offer"></a>
<a href="simply-lanna.pdf" style="opacity: 0;" class=""><img src="images/simply-lanna.jpg" rel="Special&nbsp;Offer"></a>
<a href="tam-suite-offer.pdf" style="opacity: 0;" class=""><img src="images/tamarind-suite.jpg" rel="Special&nbsp;Offer"></a>
<!--a href="rate-th.php"><img src="images/roto.jpg" rel="Special&nbsp;Offer"></a-->
<a href="Tamarind%20Village%20Residents%20of%20Thailand%20Offer%202014-2015.pdf" style="opacity: 1;" class="show"><img src="images/residents-of-thailand.jpg" rel="Special&nbsp;Offer"></a>
<!-- <a href="press-releases/ancient-roots.php"><img src="images/TV-Banner-Austin-Bush.jpg" rel="Special&nbsp;Offer"></a> -->
</div>                          </td>
                        </tr>
                    </tbody></table>
                                </div>
                                <div class="txtcontent">
                                  <?php echo $content;?>
                                </div>
                            </div>
                            <div id="footer">
                                <div class="line"></div>
                                <p><?=$footer?></p>
                            </div>
                        </body>
                        </html>
