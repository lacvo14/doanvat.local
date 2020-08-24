<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <?php $this->load->view('admin/message', $this->data) ?>
    <div class="x_panel">
        <div class="x_title">
            <h2>Thông tin liên hệ</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-3 col-xs-12"> Tên shop
                    </label>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <input type="text" name="name" class="form-control" value="<?php echo $name->content ?>" data-original-title="Tên trường" data-toggle="tooltip" data-placement="top" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-3 col-xs-12"> Địa chỉ
                    </label>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <input type="text" name="address" class="form-control" value="<?php echo $address->content ?>" data-original-title="Địa chỉ" data-toggle="tooltip" data-placement="top" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-1 col-sm-3 col-xs-12"> Số điện thoại
                    </label>
                    <div class="col-md-8 col-sm-10 col-xs-10">
                        <input type="text" name="phone" class="form-control" value="<?php echo $phone->content ?>" data-original-title="Số điện thoại liên hệ" data-toggle="tooltip" data-placement="top" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12"> Địa chỉ website
                    </label>
                    <div class="col-md-8 col-sm-10 col-xs-10">
                        <input type="text" name="website" class="form-control" value="<?php echo $website->content ?>" data-original-title="Số điện thoại liên hệ" data-toggle="tooltip" data-placement="top" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-11"> Email
                    </label>
                    <div class="col-md-8 col-sm-10 col-xs-10">
                        <input type="text" name="email" class="form-control" value="<?php echo $email->content ?>" data-original-title="Địa chỉ email liên hệ" data-toggle="tooltip" data-placement="top" />
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-1">
                        <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Cập nhật dữ liệu </button>
                    </div>
                </div>
            </form>
            <br />
        </div>
    </div>
</div>