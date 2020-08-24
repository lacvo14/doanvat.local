<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Quản lý Chuyên mục Tin tức</a> </div>
    <h1>Quản lý chuyên mục Tin tức (<?php echo $total ?>)</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo admin_url('') ?>news_cat/add" class="btn btn-info"><i class="fa fa-plus-square-o"></i> Thêm mới </a>
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> 
                    <h5>Danh sách chuyên mục Tin tức</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                            <tr>
                                <th class="column-title">ID </th>
                                <th class="column-title">Tên chuyên mục </th>
                                <th class="column-title">Thứ tự hiển thị </th>
                                <th class="column-title">Đường dẫn </th>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr>
                                    <td class=""><?php echo $row->id ?></td>
                                    <td class=" "><?php echo $row->name ?> </td>
                                    <td class=" "><?php echo $row->sort_order ?> </td>
                                    <td class=" "><?php echo $row->slug ?> </td>
                                    <td class=" ">
                                        <a href="<?php echo admin_url('news_cat/edit/' . $row->id) ?>" title="Sửa" class="btn btn-warning btn-xs"> <i class="fa fa-pencil-square-o"></i> Sửa </a>
                                        <a href="<?php echo admin_url('news_cat/delete/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>
</div>

