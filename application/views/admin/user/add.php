<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm Khách hàng</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>user" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="form" class="form-horizontal form-label-left" method="POST" action="">

                <div class="form-group">
                    <!--
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tài khoản <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('email')?>">
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('email')?></li>
                        </ul>
                    </div>
                    -->
                    <label for="param_email" class="formLeft">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_email" value="<?php echo set_value('name')?>" name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="param_email" class="formLeft">Username:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo set_value('email')?>" id="param_email" name="email"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('email')?></div>
                    </div>
                    <!--
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password">
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('password') ?></li>
                        </ul>
                    </div>
                -->
                </div>
                <div class="form-group">
                    <label for="param_email" class="formLeft">Password:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="password" _autocheck="true" id="param_password" name="password"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('password')?></div>
                    </div>
                    <!--
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại mật khẩu <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="re_password" class="form-control col-md-7 col-xs-12" type="password" name="re_password">
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('re_password') ?></li>
                        </ul>
                    </div>
                -->
                </div>
                <div class="form-group">
                    <label for="param_email" class="formLeft">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="password" _autocheck="true" id="param_re_password" name="re_password"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"><?php echo form_error('re_password')?></div>
                    </div>
                    <!--
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại mật khẩu <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="re_password" class="form-control col-md-7 col-xs-12" type="password" name="re_password">
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('re_password') ?></li>
                        </ul>
                    </div>
                -->
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Thêm mới </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>