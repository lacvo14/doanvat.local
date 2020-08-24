<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Danh sách khách hàng</a> </div>
    <h1>Quản lý khách hàng</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> 
                    <h5>Danh sách khách hàng</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                            <tr>
                                <td style="width:80px;">Mã số</td>
                                <td>Họ và tên</td>
                                <td>Username</td>
                                <td>Password</td>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr>
                                   <!-- Hiển thị thông tin người dùng -->
                                    <td class="textC"><?php echo $row->id?></td>
                                    <td>
                                        <span title="<?php echo $row->name?>" class="tipS"><?php echo $row->name?></span></td>
                                    <td>
                                        <span title="<?php echo $row->email?>" class="tipS"><?php echo $row->email?>                    
                                    </span></td>
                                    <td>
                                        <span title="<?php echo $row->password?>" class="tipS"></span>
                                        <?php echo $row->password?>
                                        </td>
                                    <td class=" ">
                                        <!--<a href="<?php echo admin_url('user/edit/' . $row->id) ?>" title="Sửa" class="btn btn-warning btn-xs"> <i class="fa fa-pencil-square-o"></i> Sửa </a>-->
                                        <a href="<?php echo admin_url('user/del/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
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

