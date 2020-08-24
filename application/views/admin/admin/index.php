<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">danh sách ban quản trị</a> </div>
    <h1>Quản lý ban quản trị (<?php echo $total ?>)</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo admin_url('') ?>admin/add" class="btn btn-info"><i class="fa fa-plus-square-o"></i> Thêm mới </a>
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> 
                    <h5>Danh sách ban quản trị</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                            <tr>
                                <th class="column-title">ID </th>
                                <th class="column-title">Tài khoản </th>
                                <th class="column-title">Chức vụ </th>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr>
                                    <td class=""><?php echo $row->id ?></td>
                                    <td class=" "><?php echo $row->username ?> </td>
                                    <td class=" ">

                                        <?php if ($row->group_id == 1) { ?> 
                                            <?php echo 'Admin' ?> 
                                            <?php } else{ ?> 
                                            <?php echo 'S-Mod' ?> 
                                        <?php } ?> 

                                    </td>
                                    <td class=" ">
                                        <a href="<?php echo admin_url('admin/edit/' . $row->id) ?>" title="Sửa" class="btn btn-warning btn-xs"> <i class="fa fa-pencil-square-o"></i> Sửa </a>
                                        <a href="<?php echo admin_url('admin/delete/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
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

