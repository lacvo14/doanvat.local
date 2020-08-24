<!-- Breadcrumb -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-list">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li>Giỏ Hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End-->
<!-- Shopping Area-->
<div class="shopping-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="woocommerce">
                    <div class="shoping-steps fix">
                        <div class="step">
                            <div class="step-num">
                                <div class="step-num-cell active">
                                    <span>01</span>
                                </div>
                            </div>
                            <div class="step-title">
                                <h5>Đặt Hàng</h5>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-num">
                                <div class="step-num-cell">
                                    <span>02</span>
                                </div>
                            </div>
                            <div class="step-title">
                                <h5>Thông tin khách hàng</h5>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-num">
                                <div class="step-num-cell">
                                    <span>03</span>
                                </div>
                            </div>
                            <div class="step-title">
                                <h5>Hoàn tất</h5>
                            </div>
                        </div>
                    </div>
                    <?php if ($total_items > 0): ?>
                        <form method="POST" action="<?php echo base_url('cart/update'); ?>">
                            <div  class="table-responsive">
                                <table class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-price">Đơn Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total_amount = 0; ?>
                                        <?php foreach ($carts as $row): ?>
                                            <?php $total_amount = $total_amount + $row['subtotal']; ?>
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="<?php echo base_url('cart/del/') . $row['id'] ?>" ><i class="pe-7s-trash"></i></a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img alt="product-img" class="attachment-shop_thumbnail wp-post-image" src="<?php echo base_url('upload/product/thumb/' . $row['image_link']) ?>"></a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="#"><?php echo $row['name'] ?></a> 
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">
                                                        <select name="gia_<?php echo $row['id'] ?>" id="price_<?php echo $row['id'] ?>">
                                                            <?php
                                                            $price_list = @json_decode($row['goi']);
                                                            foreach ($price_list as $price):
                                                                ?>
                                                                <?php
                                                                $price_value = explode(":", $price);
                                                                $price_value = trim($price_value['1']);
                                                                $price_value = preg_replace('/.000/', '', $price_value)
                                                                ?>
                                                                <option value="<?php echo $price_value ?>" <?php if ($price_value == $row['price']) echo 'selected'; ?>> <?php echo $price ?> </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="cart-quantity">
                                                        <div class="cart-plus-minus">
                                                            <input name="qty_<?php echo $row['id'] ?>" id="qty_<?php echo $row['id'] ?>" value="<?php
                                                            if (!$row['qty'])
                                                                $row['qty'] = 1;
                                                            else
                                                                echo $row['qty'];
                                                            ?>" type="number" min='1' />

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount"><?php echo $row['subtotal'] . '.000 đ' ?></span> 
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="calculate-shipping-cart-totals-area fix">

                                <div class="cart_totals cart-amount ">
                                    <!--<h4 class="widget-title">THÀNH TIỀN</h4>-->
                                    <table class="shop_table">
                                        <tbody>
    <!--                                        <tr class="cart-subtotal">
                                                <th>Tiền Hàng</th>
                                                <td><span>$1107.00</span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Phí Giao Hàng</th>
                                                <td>
                                                    Free Shipping
                                                </td>
                                            </tr>-->
                                            <tr class="order-total">
                                                <th><span class="amount">Tổng tiền :</span></th>
                                                <td><span class="amount"><?php echo $total_amount . '.000 đ' ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="coupon-chech-out">
                                <div class="chech-out">
                                    <button type="submit" class="btn-update" id="btn-sendface"  /> Cập nhật giỏ hàng </button>
                                    <a href="<?php echo base_url('cart/del'); ?>">Xóa giỏ hàng</a>
                                    <a href="<?php echo base_url('order/checkout'); ?>">Đăt hàng</a>
                                </div>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="error-cart error-search"><h3>Không có sản phẩm nào trong giỏ hàng ! <span><a href="<?php echo base_url() ?>">Quay lại cửa hàng</a></span></h3></div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shopping Area end-->