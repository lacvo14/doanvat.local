<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chình sửa bài đăng</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>comments" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Tên bài đăng
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo $comments->name ?>" type="text" name="name" class="form-control" data-original-title="Tên bài viết" placeholder="Tên bài viết" data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('name') ?></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12"> Chuyên mục
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <select name="cat_id" data-original-title="Chọn Chuyên mục" data-toggle="tooltip" data-placement="top">
                            <?php foreach ($comments_list as $row ): ?>
                            <option value="<?php echo  $row->id?>" <?php echo ($row->id == $comments->cat_id) ? 'selected' : '' ?> style="padding:3px 0 3px 10px; border-top:1px solid; font-weight:600">
                                <?php echo  $row->name ?>
                            </option>
                                
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12"> Nội dung 
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <textarea class="ckeditor" name="content" class="form-control" data-original-title="" data-toggle="tooltip" data-placement="top"><?php echo $comments->content ?></textarea> 
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('content') ?></li>
                        </ul>
                    </div>
                </div>
                 
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-1 col-sm-3 col-xs-12"> Hình minh họa
                    </label>
                    <div class="col-md-5 col-sm-10 col-xs-10">
                        <input type="file" name="image" class="form-control" data-original-title="Chọn hình minh họa cho bài viết" data-toggle="tooltip" data-placement="top" multiple />
                        <img src="<?php echo base_url('') ?>upload/comments/thumb/<?php echo $comments->image_link ?>" height="50">
                    </div>
                </div>
                
<!--                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12"> File download 
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input id="link_file" readonly="" name="link_file" type="text" onclick="BrowseServer()" value=""/><input id="btn" type="button" onclick="BrowseServer()" value="Browse"/> 
                    </div>
                </div>         

                <script type="text/javascript">

                    function BrowseServer()
                    {
                        var finder = new CKFinder();
                        finder.basePath = '../';
                        finder.connectorPath = '<?php echo admin_url('ckfinder/connector') ?>';
                        finder.selectActionFunction = SetFileField;
                        finder.popup();

                    }

                    function SetFileField(fileUrl)
                    {
                        document.getElementById('link_file').value = fileUrl;
                    }

                </script>-->
                
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
