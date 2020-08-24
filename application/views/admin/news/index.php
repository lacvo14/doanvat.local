<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Danh sách bài đăng Feedback</a> </div>
    <h1>Quản lý bài đăng (<?php echo $total ?>)</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo admin_url('') ?>news/add" class="btn btn-info"><i class="fa fa-plus-square-o"></i> Thêm mới </a>
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon">
                        <input type="checkbox" id="title-checkbox" name="title-checkbox" />
                    </span>
                    <h5>Danh sách bài đăng</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                            <tr>
                                <th><i class="icon-resize-vertical"></i></th>
                                <th class="column-title">ID </th>
                                <th class="column-title">Hình minh họa </th>
                                <th class="column-title">Tên bài viết </th>
                                <th class="column-title">Chuyên mục </th>
                                <th class="column-title">Đường dẫn </th>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr class="row_<?php echo $row->id ?>">
                                    <td><input type="checkbox" id="id[]" value="<?php echo $row->id ?>"/></td>
                                    <td class=""><?php echo $row->id ?></td>
                                    <td class=" "><img src="<?php echo base_url('') ?>upload/news/thumb/<?php echo $row->image_link ?>" height="50"></td>
                                    <td class=" "><?php echo $row->name ?> </td>
                                    <td class=" "><?php echo $row->cat_id ?> </td>
                                    <td class=" "><?php echo $row->slug ?> </td>
                                    <td class=" ">
                                        <a href="<?php echo base_url('tintuc/' . $row->slug . '-' . $row->id . '.html') ?>" target="_blank" class="btn btn-success btn-xs" title="Xem"><i class="fa fa-eye"></i> Xem </a>
                                        <a href="<?php echo admin_url('news/edit/' . $row->id) ?>" title="Sửa" class="btn btn-warning btn-xs"> <i class="fa fa-pencil-square-o"></i> Sửa </a>
                                        <a href="<?php echo admin_url('news/delete/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        <button class="btn btn-danger" id="delete_all" url="<?php echo admin_url('news/delete_all') ?>"  ><i class="fa fa-trash" aria-hidden="true"></i> Xóa mục đã chọn </button>
                    </label>
                    <div class="table-responsive">
                        <ul class="nav navbar-right pageadmin"><?php echo $this->pagination->create_links() ?></ul>
                    </div>

                </div>
            </div>   
        </div>
    </div>
</div>