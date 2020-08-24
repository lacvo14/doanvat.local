<div id='homer' style="width:600px; padding:5px 10px;">
    <div class="title" style="overflow: hidden; padding-bottom: 15px; border-bottom: 1px solid #000">
        <div class="col-md-6 col-xs-6" style="padding-top: 10px">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>  | Chi tiết đơn hàng
        </div>
        <div class="col-md-6 col-xs-6" style="text-align: right;">
            <?php if ($info->status != '1'): ?>
                <a href="<?php echo admin_url('transaction/active/' . $info->id) ?>" class="btn btn-success">
                    <span>Giao hàng</span>
                </a>
                <a href="<?php echo admin_url('transaction/cancel/' . $info->id) ?>" class="btn btn-danger">
                    <span>Hủy đơn hàng</span>
                </a>
            <?php else: ?>
                <a href="<?php echo admin_url('transaction/cancel/' . $info->id) ?>" class="btn btn-danger">
                    <span>Hủy đơn hàng</span>
                </a>
            <?php endif ?>
        </div>
    </div>
    <?php
    $tienhang = explode('.', $info->_amount);
    $tienhang = $tienhang[0];
    ?>
    <div class="body-content">
        <div class="col-md-6 col-xs-6">
            <div class="title-blue">Thông tin thanh toán: </div>

            <ul class="list2 valueB link">
                <li>
                    <span>Mã giao dịch :</span>
                    <font class="red"><?php echo $info->id; ?></font>
                    <div class="clear"></div>
                </li>

                <li>
                    <span>Ngày mua hàng :</span>
                    <?php echo mdate('%d-%m-%Y', $info->created) ?>
                    <div class="clear"></div>
                </li>

                <li>
                    <span>Tổng Tiền :</span>
                    <font class="red"><?php echo $tienhang ?>.000 đ</font>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>

        <div class="col-md-6 col-xs-6">
            <div class="title-blue">Thông tin khách hàng:</div>
            <ul class="list2 valueB">
                <li><span>Họ và tên : </span><?php echo $info->user_name; ?></li>
                <li><span>Email : </span><?php echo $info->user_email; ?></li>
                <li><span>Phone : </span><?php echo $info->user_phone; ?></li>
                <li><span>Địa chỉ : </span> <?php echo $info->user_address; ?></li>
            </ul>
        </div>
    </div>

    <div class="body-bottom col-md-12">

        <div class="title-blue">Thông tin thanh toán: </div>
        <?php foreach ($orders as $row): ?>
            <div class="col-md-7 col-xs-7">
                <div class="order-list">
                    <div class="col-md-3">
                        <a target="_blank" href="#" title="<?php echo $row->product->name; ?>">
                            <img class="left dInline mr10" style="width:100%; max-height:100px;" src="<?php echo base_url('upload/product/thumb/') . $row->product->image_link; ?>" alt="<?php echo $row->product->name; ?>">
                        </a>
                    </div>
                    <div class="col-md-9 text-p">
                        <p><?php echo $row->product->name; ?></p>
                        <p><strong>Số lượng : </strong> <?php echo $row->qty; ?></p>
                    </div>
                </div>
            </div>
            <?php
            $tienhang = explode('.', $row->_amount);
            $tienhang = $tienhang[0];
            ?>
            <div class="col-md-5 col-xs-5 text-p">
                <p><strong>Tổng cộng : </strong><?php echo $tienhang.'.000 đ'; ?></p>
                <p><strong>Trạng thái : </strong><?php echo $row->_status; ?></p>
            </div>
            
            <div class="clear"></div>
        <?php endforeach; ?>	
    </div>
</div>