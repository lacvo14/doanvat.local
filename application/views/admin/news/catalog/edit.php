<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chỉnh sửa Chuyên Mục Tin tức</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>news_cat" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="form" class="form-horizontal form-label-left" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên Chuyên Mục <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="name" class="form-control col-md-7 col-xs-12" value="<?php echo $news->name ?>">
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('name') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự hiển thị </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="sort_order" name="sort_order" class="form-control col-md-7 col-xs-12" value="<?php echo $news->sort_order ?>">
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('sort_order') ?></li>
                        </ul>
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
