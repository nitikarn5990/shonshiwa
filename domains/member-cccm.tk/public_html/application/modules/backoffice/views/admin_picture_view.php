


<script>


</script>
<div class="container main-container headerOffset">

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="fa fa-file-photo-o"></i> เปลี่ยนรูป </span></h1>

            <div class="row userInfo">
                <form method="post" action="edit_pic_admin/" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <div class="form-group">
                                <img src="<?php echo base_url('assets/pic_admin/' . $this->session->userdata('admin_Picture')) ?>" width="133" height="133"/>

                            </div>
                            <div>
                                <input type="file" name="admin_Picture" id="admin_Picture" accept="image/*" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;บันทึก</button>
                    </div>
                </form>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>