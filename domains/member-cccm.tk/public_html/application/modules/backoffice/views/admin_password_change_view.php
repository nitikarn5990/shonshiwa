<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

    <!-- เปลี่ยนรหัสผ่าน -->
    <div class="modal signUpContent fade" id="EditAdmin" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h3 class="modal-title-site text-center"> Puttapisake.com </h3>
                </div>
                <form method="post" id="" action="/" enctype="multipart/form-data">
                    <div class="col-xs-10 col-sm-10">
                        <div class="form-group required">
                            <label for="InputPassword"> รหัสผ่าน </label>
                            <input required="required" type="password" class="form-control" id="adimn_Password" name="admin_Password" placeholder="Password">
                        </div>
                        <div class="form-group required">
                            <label for="ConfermPassword" for="admin_Password"> ยืนยันรหัสผ่าน </label>
                            <input required="required" type="password" class="form-control" id="adimn_Password" name="admin_Password" data-validate-linked="admin_Password" placeholder="Password">
                        </div>
                    </div>&nbsp;</br>&nbsp;

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
                <h1 class="section-title-inner"><span><i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน </span></h1>
                <?php foreach($data_admin as $admin) {
                    ?>
                    <div class="row userInfo">
                        <form method="post" id="" action="check_password/" enctype="multipart/form-data">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group required">
                                    <label for="InputUserame"> ชื่อที่ใช้ในการล็อคอิน </label>
                                    <input required="required" readonly="readonly" type="text" class="form-control"
                                           id="adimn_Username" name="admin_Username" value="<?=$admin['admin_Username']?>">
                                </div>
                                <div class="form-group required">
                                    <label for="InputPassword"> รหัสผ่านใหม่ </label>
                                    <input required="required" type="password" class="form-control" id="NewPass"
                                           name="NewPass" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group required">
                                    <label for="InputOldPassword"> รหัสผ่านเก่า </label>
                                    <input required="required" type="password" class="form-control" id="OldPass"
                                           name="OldPass" placeholder="Password">
                                </div>
                                <div class="form-group required">
                                    <label for="InputConfermPassword"> ยืนยันรหัสผ่าน </label>
                                    <input required="required" type="password" class="form-control" id="ConfirmPass"
                                           name="ConfirmPass" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;
                                    บันทึกข้อมูล
                                </button>
                            </div>
                        </form>
                    </div>
                    <?
                }
                ?>
                <!--/row end-->

            </div>
        </div>
        <!--/row-->

        <div style="clear:both"></div>
    </div>
    <!-- /main-container -->

    <div class="gap"></div>

</div>


