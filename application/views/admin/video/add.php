<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm Video</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>video" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Tiêu đề
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo set_value('title') ?>" type="text" name="title" class="form-control" data-original-title="Tiêu đề" placeholder="Tiêu đề" data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('title') ?></li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Link Video
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo set_value('link') ?>" type="text" name="link" class="form-control" data-original-title="Link" placeholder="VD : https://www.youtube.com/watch?v=gdBZLueegq8 " data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('link') ?></li>
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
                        <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Thêm video mới </button>
                    </div>
                </div>
            </form>
            <br />
        </div>
    </div>
</div>

