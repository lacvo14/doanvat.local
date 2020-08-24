<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Danh sách sản phẩm</a> </div>
    <h1>Quản lý sản phẩm (<?php echo $total ?>)</h1>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo admin_url('') ?>product/add" class="btn btn-info"><i class="fa fa-plus-square-o"></i> Thêm mới </a>
            <?php $this->load->view('admin/message', $this->data); ?>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon">
                        <input type="checkbox" id="title-checkbox" name="title-checkbox" />
                    </span>
                    <h5>Danh sách sản phẩm</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped with-check">

                        <thead class="filter">
                            <tr>
                                <td colspan="8">
                                    <form class="list_filter form" action="<?php echo admin_url('product'); ?>" method="get">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="label" style="width:40px;"><p for="filter_id">Tên Sản phẩm</p></td>
                                                    <td class="item" style="width:155px;"><input name="name" value="<?php echo $this->input->get('name'); ?>" id="filter_iname" style="width:155px; margin-left: 80px;" type="text"></td>
                                                    <td class="label" style="width:150px;"><p for="filter_status">Chuyên mục</p></td>
                                                    <td class="item">
                                                        <select name="catalog">
                                                            <option value=""></option>
                                                            <?php foreach ($cats as $row): ?>
                                                                <option value="<?php echo $row->id ?>" <?php echo ($this->input->get('catalog') == $row->id) ? 'selected' : '' ?> ><?php echo $row->name ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td class="button-view" style="width:150px">
                                                        <input class="btn btn-success" value="Lọc" type="submit">
                                                        <input class="btn btn-success" value="Reset" onclick="window.location.href = '<?php echo admin_url('product'); ?>';
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
                                <th class="column-title">ID </th>
                                <th class="column-title">Hình minh họa </th>
                                <th class="column-title">Tên sản phẩm </th>
                                <th class="column-title">Giá sản phẩm </th>
                                <th class="column-title">Feature </th>
                                <th class="column-title">Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr class="row_<?php echo $row->id ?>">
                                    <td><input type="checkbox" id="id[]" value="<?php echo $row->id ?>"/></td>
                                    <td class=""><?php echo $row->id ?></td>
                                    <td class=" "><img src="<?php echo base_url('') ?>upload/product/thumb/<?php echo $row->image_link ?>" height="50"></td>
                                    <td class=" "><?php echo $row->name ?> </td>
                                    <td class=" "><?php echo implode("\r\n", json_decode($row->price)); ?></td>
                                    <td class=" "><?php echo $row->feature ?> </td>
                                    <td class=" ">
                                        <a href="<?php echo base_url($row->slug . '-' . $row->id . '.html') ?>" target="_blank" class="btn btn-success btn-xs" title="Xem"><i class="fa fa-eye"></i> Xem </a>
                                        <a href="<?php echo admin_url('product/edit/' . $row->id) ?>" title="Sửa" class="btn btn-warning btn-xs"> <i class="fa fa-pencil-square-o"></i> Sửa </a>
                                        <a href="<?php echo admin_url('product/delete/' . $row->id) ?>" onclick="return confirm('Bạn có chắc chắn xóa?')" title="Xóa" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Xóa </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        <button class="btn btn-danger" id="delete_all" url="<?php echo admin_url('product/delete_all') ?>"  ><i class="fa fa-trash" aria-hidden="true"></i> Xóa mục đã chọn </button>
                    </label>
                    <div class="table-responsive">
                        <ul class="nav navbar-right pageadmin"><?php echo $this->pagination->create_links() ?></ul>
                    </div>

                </div>
            </div>   
        </div>
    </div>
</div>