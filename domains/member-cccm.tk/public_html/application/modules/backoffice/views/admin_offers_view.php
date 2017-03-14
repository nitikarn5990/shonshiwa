<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">

    $(document).ready(function () {
        $('#slider').DataTable({
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': [1, 5, 6]}
            ]
        });
    });

    function changeStatus(slider_ID, slider_Status) {
        var send = {
            "slider_ID": slider_ID,
            "slider_Status": slider_Status

        }
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/update_status_slider",
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

    function edit_slider(slider_ID)
    {
        var send = {"slider_ID": slider_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_slider_byID",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        console.log(data);
                        if (data)
                        {
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#edit_slider_ID").val(slider_ID);
                                $("#edit_slider_Title").val(value.slider_Title);
                                $("#edit_slider_Number").val(value.slider_Number);
                                $("#edit_slider_Detail").val(value.slider_Detail);
                                //   alert('ss')
                                tinyMCE.activeEditor.setContent(value.slider_Detail);

                            });
                        }
                    }
                });
    }
    function delete_slider(slider_ID)
    {
        var send = {"slider_ID": slider_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/Admin/get_slider_byID",
                    type: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data)
                        {
                            $("#modal-sizes-3").modal('show');
                            $.each(data, function (key, value)
                            {
                                $("#del_slider_ID").val(slider_ID);
                                $("#del_slider_Picture").val(value.slider_Picture);
                            });
                        }
                    }
                })
    }
    function edit_pic(slider_ID, slider_Picture)
    {
        $("#show_slider_Picture11").attr('src', '<?php echo base_url('assets/pic_slider') ?>/' + slider_Picture);
        $(".edit-pic1 #edit_slider_ID").val(slider_ID);
        $(".edit-pic1 #edit_slider_Picture").val(slider_Picture);


//        var send = {"slider_ID": slider_ID}
//        $.ajax({
//                    url: "<?php echo base_url() ?>backoffice/admin/data_edit_pic_slider",
//                    type: "POST",
//                    data: send,
//                    dataType: "json",
//                    success: function (data)
//                    {
//
//                        if (data)
//                        {
//                            $("#modal-sizes-3").modal('show');
//                            $.each(data, function (key, value)
//                            {
//                                $("#edit_slider_ID").val(value.slider_ID);
//                                $("#edit_slider_Picture").val(value.slider_Picture);
//
//                                $("#show_slider_Picture11").attr('src', '<?php echo base_url('assets/pic_slider') ?>/' + value.slider_Picture);
//                            });
//                        }
//                    }
//                });
    }
</script>

<script>
    /*
     * Dandelion Admin v2.0 - Form Demo JS
     *
     * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
     * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
     *
     * Development Started:
     * March 25, 2012
     * Last Update:
     * December 07, 2012
     *
     */

    (function ($) {
        $(document).ready(function (e) {
            if ($.fn.autocomplete) {
                var availableTags = [
                    "ActionScript",
                    "AppleScript",
                    "Asp",
                    "BASIC",
                    "C",
                    "C++",
                    "Clojure",
                    "COBOL",
                    "ColdFusion",
                    "Erlang",
                    "Fortran",
                    "Groovy",
                    "Haskell",
                    "Java",
                    "JavaScript",
                    "Lisp",
                    "Perl",
                    "PHP",
                    "Python",
                    "Ruby",
                    "Scala",
                    "Scheme"
                ];

                $("#da-ex-autocomplete").autocomplete({
                    sce: availableTags
                });
            }

            $.fn.iButton && $(".i-button").iButton();

            $.fn.select2 && $(".select2-select").select2();

            $.fn.fileInput && $('.da-custom-file').fileInput();

            if ($.fn.ColorPicker) {
                $("#da-ex-colorpicker").ColorPicker({
                    onSubmit: function (hsb, hex, rgb, el) {
                        $(el).val(hex);
                        $(el).ColorPickerHide();
                    },
                    onBeforeShow: function () {
                        $(this).ColorPickerSetColor(this.value);
                    }
                });
            }

            $.fn.picklist && $("#da-ex-picklist").picklist();

            if ($.fn.spinner) {

                $('.da-spinner').spinner();

                $('.da-decimal-spinner').spinner({
                    step: 0.01,
                    numberFormat: "n"
                });

                $.widget("ui.timespinner", $.ui.spinner, {
                    options: {
                        // seconds
                        step: 60 * 1000,
                        // hs
                        page: 60
                    },

                    _parse: function (value) {
                        if (typeof value === "string") {
                            // already a timestamp
                            if (Number(value) == value) {
                                return Number(value);
                            }
                            return +Globalize.parseDate(value);
                        }
                        return value;
                    },

                    _format: function (value) {
                        return Globalize.format(new Date(value), "t");
                    }
                });

                $(".da-time-spinner").timespinner({
                    value: new Date().getTime()
                });
            }

            if ($.fn.autosize)
                $("#da-ex-autosize").autosize();

            if ($.fn.elrte) {
                var opts = {
                    cssClass: 'el-rte',
                    height: 300,
                    toolbar: 'normal',
                    cssfiles: ['<?php echo base_url() ?>assets/plugins/elrte/css/elrte-inner.css'],
                    fmAllow: true,
                    fmOpen: function (callback) {
                        $('<div id="myelfinder"></div>').elfinder({
                            url: '<?php echo base_url() ?>assets/plugins/elfinder/connectors/php/connector.php',
                            lang: 'en',
                            height: 300, /*
                             toolbar : [
                             ['back', 'reload'], 
                             ['select', 'open'], 
                             ['quicklook', 'info', 'rename'], 
                             ['resize', 'icons', 'list', 'help']
                             ], 
                             contextmenu : {
                             // Commands that can be executed for current directory
                             cwd : ['reload', 'delim', 'info'], 
                             // Commands for only one selected file
                             file : ['select', 'open', 'rename'], 
                             }, */
                            dialog: {width: 640, modal: true, title: 'Select Image'},
                            closeOnEditorCallback: true,
                            editorCallback: callback
                        });
                    }
                    /*fmOpen : function(callback) {
                     $('<div id="myelfinder"></div>').elfinder({
                     url : 'plugins/elfinder/connectors/php/connector.php', 
                     lang : 'en', 
                     height: 300, 
                     dialog : { width : 640, modal : true, title : 'Select Image' }, 
                     closeOnEditorCallback : true,
                     editorCallback : callback
                     });
                     }*/
                }
                $('.wysiwyg').elrte(opts);
            }

            tinyMCE.init({
                // General options
                selector: "textarea.tinymce",
                theme: "advanced",
                height: "350",
                plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
                // Theme options
                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
                theme_advanced_toolbar_location: "top",
                theme_advanced_toolbar_align: "left",
                theme_advanced_statusbar_location: "bottom",
                theme_advanced_resizing: true,
                theme_advanced_resizing_use_cookie: false,
                file_browser_callback: 'elFinderBrowser',
                // Example content CSS (should be y site CSS)
                content_css: "<?php echo base_url() ?>assets/css/styletinymce.css",
                // Drop lists for link/image/media/template dialogs
                //template_external_list_url: "lists/template_list.js",
                //external_link_list_url: "lists/link_list.js",
                //external_image_list_url: "lists/image_list.js",
                //media_external_list_url: "lists/media_list.js",
                // Style formats
                /*style_formats: [
                 {title: 'Bold text', inline: 'b'},
                 {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                 {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                 {title: 'Example 1', inline: 'span', classes: 'example1'},
                 {title: 'Example 2', inline: 'span', classes: 'example2'},
                 {title: 'Table styles'},
                 {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                 ],*/
            });

        });
    })(jQuery);

    function elFinderBrowser(field_name, url, type, win) {
        var elfinder_url = '<?php echo base_url() ?>assets/plugins/elfinder/elfindertmc.html';    // use an absolute path!
        tinyMCE.activeEditor.windowManager.open({
            file: elfinder_url,
            title: 'Files Manager',
            width: 1100,
            height: 430,
            resizable: 'yes',
            inline: 'yes', // This parameter only has an effect if you use the inlinepopups plugin!
            popup_css: false, // Disable TinyMCE's default popup CSS
            close_previous: 'no'
        }, {
            window: win,
            input: field_name
        });
        return false;
    }
</script>
<script src="<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>จัดการ Special Offers</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $this->session->flashdata('msg'); ?>
            <br />
            <form class="form-horizontal form-label-left" id="tinyMCEForm"  onsubmit="return detailValidate()" method="post"  action="<?= base_url()?>backoffice/Admin/edit_offers" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">หัวข้อ (Eng) <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" required=""  name="offers_title[en]" id="" placeholder="กรุณากรอกข้อมูล" value="<?php $data1 = unserialize($data_offers[0]['offers_title']);
            echo $data1['en'] ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">หัวข้อ (Netherland) <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" required=""  name="offers_title[nl]" id="" placeholder="กรุณากรอกข้อมูล" value="<?php $data2 = unserialize($data_offers[0]['offers_title']);
            echo $data2['nl'] ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รายละเอียด Special Offers (Eng)<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control tinymce" rows="3" name="offers_detail[en]" id="offers_detail1" placeholder="กรุณากรอกข้อมูล" ><?php $data3 = unserialize($data_offers[0]['offers_detail']); echo $data3['en']; ?></textarea>
                    </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รายละเอียด Special Offers (Netherland)<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control tinymce" rows="3" name="offers_detail[nl]" id="offers_detail2" placeholder="กรุณากรอกข้อมูล" ><?php $data4 = unserialize($data_offers[0]['offers_detail']); echo $data4['nl']; ?></textarea>
                    </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="submit" class="btn btn-file">Cancel</button>
                      
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>