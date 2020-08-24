<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm Slider</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>slider" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Mô tả
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo set_value('intro') ?>" type="text" name="intro" class="form-control" data-original-title="Mô tả Slide" placeholder="Mô tả Slide" data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('intro') ?></li>
                        </ul>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-1 col-sm-3 col-xs-12"> Hình ảnh slide
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="file" name="image" class="form-control" data-original-title="Chọn hình slide" data-toggle="tooltip" data-placement="top" multiple />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Thứ tự
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo set_value('sort_order') ?>" type="number" name="sort_order" class="form-control" data-original-title="Thứ tự slides"  data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('sort_order') ?></li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Trạng thái
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <select name="public">
                            <option value="1">Công khai</option>
                            <option value="0">Không công khai</option>
                        </select>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-1">
                        <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Thêm slider mới </button>
                    </div>
                </div>
            </form>
            <br />
        </div>
    </div>
</div>

