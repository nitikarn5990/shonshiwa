<div class="x_title">
    <h2>กราฟเปรียบเทียบ</h2>
</div>

<div class="x_content">

    <button type="button" class="btn btn-round btn-success pull-left" data-toggle="modal" data-target=".select_product">เลือกสินค้า</button>
    <div class="modal fade select_product" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เลือกสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_type_ID" name="product_type_ID" >
                                        <option value="">-- เลือกประเภทสินค้า --</option>
                                        <?php
                                        foreach($data_product_type as $type)
                                        {
                                            echo "<option value=\"" . $type['product_type_ID'] . "\">" .$type['product_type_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">กลุ่มสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_group_ID" name="product_group_ID" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>
                                        <?php
                                        foreach($data_product_group as $group)
                                        {
                                            echo "<option value=\"" . $group['product_group_ID'] . "\">" .$group['product_group_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">สินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required" id="product_product_ID" name="product_product_ID" >
                                        <option value="">-- เลือกสินค้า --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปแบบ</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="" name="" >
                                        <option value="">-- เลือกรูปแบบ --</option>
                                        <option value="">ยอดขาย</option>
                                        <option value="">จำนวนครั้งที่ถูกซื้อ</option>
                                        <option value="">จำนวนชิ้นที่ถูกซื้อ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <center>
        </br></hr></br>
        <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
    </center>
</div>
</body>

</html>