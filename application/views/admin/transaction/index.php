<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Danh sách giao dịch</a> </div>
    <h1>Quản lý giao dịch (<?php echo $total ?>)</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon">
                        <input type="checkbox" id="title-checkbox" name="title-checkbox" />
                    </span>
                    <h5>Danh sách giao dịch</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">

                        <thead class="filter">
                            <tr>
                                <td colspan="8">
                                    <form class="list_filter form" action="<?php echo admin_url('transaction'); ?>" method="get">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="label" >
                                            <lable for="filter_id" style="color: #000;">Mã đơn hàng</lable>
                                            <input name="id" value="<?php
                                            if (isset($filter['id'])) {
                                                echo $filter['id'];
                                            }
                                            ?>" id="filter_id" style="color: #000; width:70px; margin-left: 20px;" type="text">
                                            </td>
                                            <td class="label">
                                            <lable for="filter_status" style="color: #000;">Trạng thái</lable>
                                            <select name="status" style="width:135px">
                                                <option></option>
                                                <option value='0' <?php
                                                if (isset($filter['status']) && $filter['status'] == '0') {
                                                    echo 'selected';
                                                }
                                                ?>>Chưa giao hàng</option>
                                                <option value='1' <?php
                                                if (isset($filter['status']) && $filter['status'] == '1') {
                                                    echo 'selected';
                                                }
                                                ?>>Đã giao hàng</option>
                                                <option value='2' <?php
                                                if (isset($filter['status']) && $filter['status'] == '2') {
                                                    echo 'selected';
                                                }
                                                ?>>Đã hủy</option>
                                            </select>
                                            </td>
                                            <td class="label" >
                                            <lable for="filter_created" style="color: #000;">Từ ngày</lable>
                                            <input name="created" readonly="" data-date="<?php echo mdate('%d-%m-%Y') ?>" data-date-format="dd-mm-yyyy" value="<?php
                                            if ($created) {
                                                echo $created;
                                            }
                                            ?>" id="filter_created" type="text" class="datepicker" style="color: #000; width:130px; margin-left: 20px;" type="text">
                                            </td>
                                            <td class="label" >
                                            <lable for="filter_created_to" style="color: #000;">Đến ngày</lable>
                                            <input name="created_to" readonly="" data-date="<?php echo mdate('%d-%m-%Y') ?>" data-date-format="dd-mm-yyyy" value="<?php
                                            if ($created_to) {
                                                echo $created_to;
                                            }
                                            ?>" id="filter_created_to" type="text" class="datepicker" style="color: #000; width:130px; margin-left: 20px;" type="text">
                                            </td>


                                            <td class="button-view">
                                                <input class="btn btn-success" value="Lọc" type="submit">
                                                <input class="btn btn-success" value="Reset" onclick="window.location.href = '<?php echo admin_url('transaction'); ?>';
                                                       " type="reset">
                                            </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </thead>

                        <thead>
                            <tr>
                                <th><i class="icon-resize-vertical"></i></th>
                                <th class="column-title">Mã đơn hàng </th>
                                <th class="column-title">Thông tin khách hàng </th>
                                <th class="column-title">Số tiền </th>
                                <th class="column-title">Trạng thái</th>
                                <th class="column-title">Ngày tạo </th>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr class="row_<?php echo $row->id ?>">
                                    <td><input type="checkbox" id="id[]" value="<?php echo $row->id ?>"/></td>
                                    <td class=""><?php echo $row->id ?></td>
                                    <td>
                                        <?php echo '<p><b>Tên KH:</b> ' . $row->user_name ?></p>
                                        <?php echo '<p><b>Phone</b>: ' . $row->user_phone ?></p>
                                        <?php echo '<p><b>Email:</b> ' . $row->user_email ?>	 </p>				
                                    </td>
                                    <?php
                                    $tienhang = explode('.', $row->amount);
                                    $tienhang = $tienhang[0];
                                    ?>

                                    <td class=" "><?php echo $tienhang ?>.000 đ </td>
                                    <td>
                                        <?php
                                        if ($row->status == 0) {
                                            echo '<p style="color:red;font-weight:bold">Chưa giao hàng</p>';
                                        } elseif ($row->status == 1) {
                                            echo '<p style="color:green;font-weight:bold">Đã giao hàng</p>';
                                        } else {
                                            echo '<p style="color:orange;font-weight:bold">̶Đ̶̶ã̶ ̶h̶̶ủ̶̶y̶</p>';
                                        }
                                        ?>
                                    </td>
                                    <td class=" "><?php echo get_date($row->created) ?></td>
                                    <td class=" ">
                                        <a href="<?php echo admin_url('transaction/view/' . $row->id) ?>" class="btn btn-success btn-xs btn-detail ajax" title="Chi tiết đơn hàng"><i class="fa fa-eye"></i> Chi tiết</a>
                                        <a href="<?php echo admin_url('transaction/del/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        <button class="btn btn-danger" id="delete_all" url="<?php echo admin_url('transaction/delete_all') ?>"  ><i class="fa fa-trash" aria-hidden="true"></i> Xóa mục đã chọn </button>
                    </label>
                    <div class="table-responsive">
                        <ul class="nav navbar-right pageadmin"><?php echo $this->pagination->create_links() ?></ul>
                    </div>

                </div>
            </div>   
        </div>
    </div>
    <script src="<?php echo public_url('') ?>admin/js/jquery.min.js"></script>
    <script src="<?php echo public_url('') ?>admin/js/matrix.form_common.js"></script>
</div>