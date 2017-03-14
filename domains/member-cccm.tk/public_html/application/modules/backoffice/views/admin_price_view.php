<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">

    $(document).ready(function () {
        $('#price').DataTable({
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': [1 ,5 ,6]}  
            ]
        });
    });

    function changeStatus(price_ID, price_Status) {
        var send = {
            "price_ID": price_ID,
            "price_Status": price_Status

        }
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/update_status_price",
                    type: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data) {
                        //console.log(data);
                        if (data.status == true) {
                            location.reload();
//
                        }
                    }
                })
    }

    function edit_price(price_ID){
        var send = {"price_ID": price_ID};
        $.ajax
                ({
                    url: "<?php echo base_url() ?>backoffice/admin/get_price_byID",
                    method: "POST",
                    data: send,
                    dataType: "json",
                    success: function (data)
                    {
                        
                       // var obj = JSON.parse(data);
                     console.log(data);

                        if (data)
                        {
                            $("#modal-sizes-3").modal('show');
                            $("#edit_price_ID").val(price_ID);

                            $("#edit_price_Number").val(data.price_Number);
                            
                            
                                $("#edit_price_Title1").val(data.price_Title.en);
                                $("#edit_price_Title2").val(data.price_Title.nl);
                                
                                 $("#edit_price_Cost1").val(data.price_Cost.en); //ราคา
                                 $("#edit_price_Cost2").val(data.price_Cost.nl); //ราคา
                                
                                 tinymce.get('edit_price_Detail1').setContent(data.price_Detail.en);
                                tinymce.get('edit_price_Detail2').setContent(data.price_Detail.nl);

//                            $.each(data.price_Title, function (key, value)
//                            {
//                            //   alert(value);
//                              //console.log(key.en);
//                              //  $("#edit_price_Title1").val(value);
//                            //    $("#edit_price_Title2").val(value.price_Title[key].nl);
//
//                            });
////                            $.each(data.price_Detail, function (key, value)
////                            {
////                               // alert('1');
////                                tinymce.get('edit_price_Detail1').setContent(value.en);
////                                tinymce.get('edit_price_Detail2').setContent(value.nl);
////
////
////                            });
                        }
                    }
                });
    }
    function delete_price(price_ID, price_Picture)
    {
        
           $("#del_price_ID").val(price_ID);
           $("#del_price_Picture").val(price_Picture);
      //  var send = {"price_ID": price_ID};
//        $.ajax
//                ({
//                    url: "<?php echo base_url() ?>backoffice/Admin/delete_price_Picture",
//                    type: "POST",
//                    data: send,
//                    dataType: "json",
//                    success: function (data) {
//                        console.log(data);
//                        if (data)
//                        {
//                            $("#modal-sizes-3").modal('show');
//                            $.each(data, function (key, value)
//                            {
//                                $("#del_price_ID").val(price_ID);
//                                $("#del_price_Picture").val(value.price_Picture);
//                            });
//                        }
//                    }
//                })
    }
    function edit_pic(price_ID, price_Picture)
    {
        $("#show_price_Picture11").attr('src', '<?php echo base_url('assets/pic_price') ?>/' + price_Picture);
        $(".edit-pic1 #edit_price_ID").val(price_ID);
        $(".edit-pic1 #edit_price_Picture").val(price_Picture);


//        var send = {"price_ID": price_ID}
//        $.ajax({
//                    url: "<?php echo base_url() ?>backoffice/admin/data_edit_pic_price",
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
//                                $("#edit_price_ID").val(value.price_ID);
//                                $("#edit_price_Picture").val(value.price_Picture);
//
//                                $("#show_price_Picture11").attr('src', '<?php echo base_url('assets/pic_price') ?>/' + value.price_Picture);
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
                    source: availableTags
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
                        // hours
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
                height: "400",
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
                // Example content CSS (should be your site CSS)
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

<!--<script>
$(document).ready(function() {
    tinymce.init({
        selector: 'textarea',
        setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the hobbies field
                $('#tinyMCEForm').formValidation('revalidateField', 'edit_price_Detail');
            });
        }
    });

    $('#tinyMCEForm')
        .formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fullName: {
                    validators: {
                        notEmpty: {
                            message: 'The full name is required and cannot be empty'
                        }
                    }
                },
                edit_price_Detail: {
                    validators: {
                        callback: {
                            message: 'The edit_price_Detail must be between 5 and 200 characters long',
                            callback: function(value, validator, $field) {
                                // Get the plain text without HTML
                                var text = tinyMCE.activeEditor.getContent({
                                    format: 'text'
                                });

                                return text.length <= 200 && text.length >= 5;
                            }
                        }
                    }
                }
            }
        });
});
</script>-->


 <script>
        function detailValidate1() {
            var text1 = tinyMCE.get('price_Detail1').getContent();
            var text2 = tinyMCE.get('price_Detail2').getContent();

            if (text1.trim().length > 0 && text2.trim().length > 0) {
                //$(this).closest('form').submit();
                return true;
            } else {
                alert('กณุณากรอกรายละเอียด');
               // tinyMCE.activeEditor.focus();
               // tinyMCE.get('home_detail1').getContent();
                return false;
            }

//            }
        }
    </script>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>จัดการอัตราค่าบริการ</h2>
            <div class="clearfix"></div>
        </div>  
        <div class="x_content ">
            <?php echo $this->session->flashdata('msg'); ?>
            <!-- เพิ่มอัตราค่าบริการ -->
            <div class="btn-group">

                <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i>  เพิ่มอัตราค่าบริการ</button>
            </div>
            <p>&nbsp;</p>
            <div class="modal fullscreen fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg" style="width: 80%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel2">เพิ่มอัตราค่าบริการ</h4>
                        </div>
                        <form class="form-horizontal form-label-left" onsubmit="return detailValidate1()"  method="post" id="tinyMCEForm" action="add_price/" enctype="multipart/form-data">
                            <div class="modal-body"> 

                                <div class="row form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อ (Eng)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">

                                        <input class="form-control col-md-7 col-xs-12 required" id="price_Title" name="price_Title[en]" type="text" placeholder="กรุณากรอกข้อมูล" required="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อ (Netherlands)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">

                                        <input class="form-control col-md-7 col-xs-12 required" id="price_Title" name="price_Title[nl]" type="text" placeholder="กรุณากรอกข้อมูล" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดอัตราค่าบริการ (Eng)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9 " >
                                        <textarea class="form-control tinymce" rows="3" name="price_Detail[en]" id="price_Detail1" placeholder="กรุณากรอกข้อมูล" ></textarea>

                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดอัตราค่าบริการ (Netherlands)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9 ">
                                        <textarea class="form-control tinymce" rows="3" name="price_Detail[nl]" id="price_Detail2" placeholder="กรุณากรอกข้อมูล" ></textarea>

                                    </div>
                                </div>
                                    <div class="row form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ราคา (Eng)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-7 col-xs-9">
                                        <input class="form-control col-md-7 col-xs-12 required" required="required" id="" name="price_Cost[en]" type="text" placeholder="กรุณากรอก" required="">
                                    </div>
                                </div>
                                  <div class="row form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ราคา (Netherlands)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-7 col-xs-9">
                                        <input class="form-control col-md-7 col-xs-12 required" required="required" id="" name="price_Cost[nl]" type="text" placeholder="กรุณากรอก" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปของอัตราค่าบริการ</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                        <input class="btn btn-primary col-md-12" type="file"  name="price_Picture" id="price_Picture" accept="pic_price/*" required="">
                                    </div>
                                </div>
                            
                                <div class="row form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ลำดับอัตราค่าบริการ<span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-7 col-xs-9">
                                        <input class="form-control col-md-7 col-xs-12 required" required="required" id="" name="price_Number" type="number" placeholder="กรุณากรอก" required="">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /เพิ่มอัตราค่าบริการ -->

            <!-- แก้ไขอัตราค่าบริการ -->
            <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลอัตราค่าบริการ</h4>
                        </div>

                        <form class="form-horizontal form-label-left" id="tinyMCEForm"  onsubmit="return detailValidate()" method="post"  action="update_price/" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="row form-group">
                                    <input type="hidden" id="edit_price_ID" name="edit_price_ID">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อ (Eng)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">

                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_price_Title1" name="edit_price_Title[en]" type="text" placeholder="กรุณากรอกข้อมูล" required="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                 
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อ (Netherland) </label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">

                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_price_Title2" name="edit_price_Title[nl]" type="text" placeholder="กรุณากรอกข้อมูล" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดอัตราค่าบริการ (Eng)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                        <textarea class="form-control tinymce" rows="3" name="edit_price_Detail[en]" id="edit_price_Detail1" placeholder="กรุณากรอกข้อมูล" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดอัตราค่าบริการ (Netherland)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                        <textarea class="form-control tinymce" rows="3" name="edit_price_Detail[nl]" id="edit_price_Detail2" placeholder="กรุณากรอกข้อมูล" ></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                   
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ราคา (Eng)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">

                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_price_Cost1" name="edit_price_Cost[en]" type="text" placeholder="กรุณากรอกข้อมูล" required="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ราคา (Netherland)</label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">

                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_price_Cost2" name="edit_price_Cost[nl]" type="text" placeholder="กรุณากรอกข้อมูล" required="">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ลำดับอัตราค่าบริการ</label>
                                    <div class="col-md-4 col-sm-7 col-xs-9">
                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_price_Number" name="edit_price_Number" type="number" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น" required="">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-primary">แก้ไขข้อมูล</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /แก้ไขอัตราค่าบริการ -->

            <!-- แก้ไขรูปภาพ -->
            <div class="modal fade edit-pic1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพ</h4>
                        </div>
                        <form class="form-horizontal form-label-left"  method="post" action="edit_pic_price/" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <center>
                                            <label class="col-md-12">รูปภาพของอัตราค่าบริการ</label></br>
                                            <input type="hidden" id="edit_price_ID" name="edit_price_ID">
                                            <input type="hidden" id="edit_price_Picture" name="edit_price_Picture">
                                            <img id="show_price_Picture11" class="img-responsive" src="" alt=""></br>&nbsp;</br>
                                            <input class="btn btn-primary" type="file" name="edit_price_Picture11" id="edit_price_Picture11" accept="pic_price/*" required="" ></br>
                                        </center>
                                    </div>

                                </div> 
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- /แก้ไขรูปภาพ -->

            <!-- ลบอัตราค่าบริการ -->
            <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบอัตราค่าบริการ</h4>
                        </div>
                        <form class="form-horizontal form-label-left" method="post" action="delete_price/" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="row form-group" align="center" style="color: red">
                                    <input type="hidden" name="del_price_ID" id="del_price_ID">
                                    <input type="hidden" name="del_price_Picture" id="del_price_Picture">

                                    <label>คุณแน่ใจหรือว่าต้องการลบอัตราค่าบริการ</label>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /ลบอัตราค่าบริการ -->
            <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                <div class="clear"></div>
                <div class="dataTables_filter" id="example_filter">
                </div>
                <table id="price" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
                    <thead>
                        <tr class="headings" role="row">
                            <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลำดับ</span></th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>รูปภาพ</span></th>
                            <th class="text-center" role="columnheader" tabindex="0" aria-controls="example" width="35%"><span>หัวข้อ</span></th>
                            <th class="text-center" role="columnheader" tabindex="0" aria-controls="example" width="15%"><span>ลำดับอัตราค่าบริการ</span></th>
                            <th class="text-center" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถานะ</span></th>
                            <th class="text-center" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>แก้ไข</span></th>
                            <th class="text-center" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลบ</span></th>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php
                        foreach ($data_price as $key => $sl) {
                            ?>
                            <tr class="pointer odd">
                                <td class="text-center"><span style="text-align:center"><?= $key + 1; ?></span></td>
                                <td>
                                    <span style="text-align:center"><a href="javascript:;" onclick="edit_pic('<?php echo $sl['price_ID'] ?>', '<?php echo $sl['price_Picture'] ?>');"><i data-toggle="modal" data-target=".edit-pic1"><img src="<?php echo base_url('assets/pic_price/' . $sl['price_Picture']); ?>" width="150" height="150"/></i></a></span>
                                </td>
                                <td class="text-center"><span style="text-align:center">
                                        <?php $xx =  @unserialize($sl['price_Title']); echo $xx['en']?>
                                    </span></td>
                                <td class="text-center"><span style="text-align:center"><?= ($sl['price_Number']); ?></span></td>
                                <td class="text-center last ">
                                    <?php
                                    if ($sl['price_Status'] == 1) {
                                        $btn_color = "success";
                                        $btn_tag = "Active";
                                    } else {
                                        $btn_color = "danger";
                                        $btn_tag = "UnActive";
                                    }
                                    ?>
                                    <button style="width: 60px;" class="btn btn-<?php echo $btn_color; ?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $sl['price_ID'] ?>', '<?php echo $sl['price_Status']; ?>')"><?php echo $btn_tag; ?></button>
                                </td>
                                <td class="text-center"><span style="text-align:center"><a href="javascript:;" onclick="edit_price('<?php echo $sl['price_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                                <td class="text-center"><span style="text-align:center"><a href="javascript:;" onclick="delete_price('<?php echo $sl['price_ID'] ?>','<?php echo $sl['price_Picture'] ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

