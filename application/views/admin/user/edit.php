<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Cập nhật khách hàng</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>user" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="form" class="form-horizontal form-label-left" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tài khoản <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p><?php echo $info->email ?></p>
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('username') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="param_email" class="formLeft">Password:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo">
                        <input type="password" _autocheck="true" id="param_password" name="password">
                        <p>Nếu cập nhật mật khẩu thì mới nhập giá trị</p>
                        </span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('password')?></div>
                    </div>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="param_email" class="formLeft">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="password" _autocheck="true" id="param_re_password" name="re_password"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('re_password')?></div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>