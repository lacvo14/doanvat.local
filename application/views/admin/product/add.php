<div class="col-md-12 col-sm-12 col-xs-12 wrap-box">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm mới sản phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo admin_url('') ?>product" class="btn btn-primary"><i class="fa fa-list"></i> Danh sách </a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Tên sản phẩm
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <input value="<?php echo set_value('name')?>" type="text" name="name" class="form-control" data-original-title="Tên sản phẩm" placeholder="Tên sản phẩm" data-toggle="tooltip" data-placement="top" />
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('name') ?></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12"> Chuyên mục
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <select name="catalog_id" data-original-title="Chọn Chuyên mục" data-toggle="tooltip" data-placement="top">
                            <?php foreach ($cat_list as $row ): ?>
                            <option value="<?php echo  $row->id?>" style="padding:3px 0 3px 10px; border-top:1px solid; font-weight:600">
                                <?php echo  $row->name ?>
                            </option>
                                
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12"> Giá 
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <textarea name="price" placeholder="Nhập giá sản phẩm, 1 dòng 1 loại giá" class="form-control" rows="6"><?php echo set_value('price')?></textarea> 
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required"><?php echo form_error('price') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12 "> Sản phẩm nổi bật
                    </label>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <label class="checkbox-inline"><input name="feature" type="checkbox" value="1"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-1 col-sm-3 col-xs-12"> Hình minh họa
                    </label>
                    <div class="col-md-5 col-sm-10 col-xs-10">
                        <input type="file" name="image" class="form-control" data-original-title="Chọn hình minh họa cho sản phẩm" data-toggle="tooltip" data-placement="top" multiple />
                    </div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-1">
                        <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Thêm sản phẩm mới </button>
                    </div>
                </div>
            </form>
            <br />
        </div>
    </div>
</div>
