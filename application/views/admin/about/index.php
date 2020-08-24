<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Danh sách bài giới thiệu</a> </div>
    <h1>Quản lý bài giới thiệu (<?php echo $total ?>)</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo admin_url('') ?>about/add" class="btn btn-info"><i class="fa fa-plus-square-o"></i> Thêm mới </a>
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> 
                    <h5>Danh sách bài giới thiệu</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                            <tr>
                                <th class="column-title">ID </th>
                                <th class="column-title">Tên bài viết </th>
                                <th class="column-title">Đường dẫn </th>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                            <tr class="row_<?php echo $row->id ?>">
                                    <td class=""><?php echo $row->id ?></td>
                                    <td class=" "><?php echo $row->name ?> </td>
                                    <td class=" "><?php echo $row->slug ?> </td>
                                    <td class=" ">
                                        <a href="<?php echo base_url('gioithieu/'.$row->slug . '-' . $row->id . '.html') ?>" target="_blank" class="btn btn-success btn-xs" title="Xem"><i class="fa fa-eye"></i> Xem </a>
                                        <a href="<?php echo admin_url('about/edit/' . $row->id) ?>" title="Sửa" class="btn btn-warning btn-xs"> <i class="fa fa-pencil-square-o"></i> Sửa </a>
                                        <a href="<?php echo admin_url('about/delete/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
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