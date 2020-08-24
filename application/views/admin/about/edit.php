<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chỉnh sửa bài giới thiệu</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>about" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Tên bài viết
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo $info->name ?>" type="text" name="name" class="form-control" data-original-title="Tên bài viết" placeholder="Tên bài viết" data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('name') ?></li>
                        </ul>
                    </div>
                    
                </div>                

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12"> Nội dung 
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <textarea class="ckeditor" name="content" class="form-control" data-original-title="" data-toggle="tooltip" data-placement="top"><?php echo $info->content ?></textarea> 
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('content') ?></li>
                        </ul>
                    </div>
                </div>                
                
                <script src="<?php echo public_url('admin/ckeditor/ckeditor.js') ?>"></script>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-1">
                        <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Cập nhật </button>
                    </div>
                </div>
            </form>
            <br />
        </div>
    </div>
</div>

