<div class="x_content">
    <!-- แก้ไขข้อมูลผู้ใช้ -->
    <div class="modal signUpContent fade" id="EditAdmin" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
                </div>
                <form method="post" id="" action="edit_data_admin/" enctype="multipart/form-data">
                    <?php
               
                    foreach($data_admin as $admin) {


                        ?>
                        <div class="col-xs-10 col-sm-10">
                            <div class="form-group required">
                                <label for="InputName"> ชื่อ </label>
                                <input required="required" type="text" class="form-control" id="admin_Name"
                                       name="admin_Name" value="<?= $admin['admin_Name'] ?>">
                            </div>
                            <div class="form-group required">
                                <label for="InputLastname"> นามสกุล </label>
                                <input required="required" type="text" class="form-control" id="admin_Lastname"
                                       name="admin_Lastname"
                                       value="<?= $admin['admin_Lastname'] ?>"></br>&nbsp;
                            </div>
                        </div>
                        <?
                    }
                    ?>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; บันทึกข้อมูล</button></br>&nbsp;
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container main-container headerOffset">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7">
                <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-user"></i> แก้ไขข้อมูลส่วนตัว </span></h1>
                <div class="row userInfo">
                    <form method="post" id="" action="/" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group required">
                                <label for="InputUserame"> ชื่อที่ใช้ในการล็อคอิน </label>
                                <input required="required" readonly="readonly" type="text" class="form-control" id="adimn_Username" name="admin_Username" placeholder="Username" value="<?= $data_admin[0]['admin_Username'] ?>">
                            </div>
                            <div class="form-group required">
                                <label for="InputName"> ชื่อ </label></br>
                               <input class="form-control" readonly="readonly" type="text" value="<?= $data_admin[0]['admin_Name'] ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group required">
                                &nbsp;</br>&nbsp;</br>&nbsp;</br>
                            </div>
                            <div class="form-group required">
                                <label for="InputLastname"> นามสกุล </label></br>
                             
                                <input class="form-control" readonly="readonly" type="text" value="<?= $data_admin[0]['admin_Lastname'] ?>">
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12">
                        <a href="#" onclick="EditAdmin"  class="btn btn-primary " data-toggle="modal" data-target="#EditAdmin">
                            <i class="fa fa-cogs"></i> &nbsp; แก้ไขข้อมูลส่วนตัว &nbsp;
                        </a>
                    </div>
                </div>
                <!--/row end-->

            </div>
        </div>
        <!--/row-->

        <div style="clear:both"></div>
    </div>
    <!-- /main-container -->

    <div class="gap"></div>

</div>

