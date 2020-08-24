<!-- Breadcrumb -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-list">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li>Thông tin khách hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End-->
<!-- checkout Area-->
<div class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shoping-steps fix">
                    <div class="step">
                        <div class="step-num">
                            <div class="step-num-cell active">
                                <span>01</span>
                            </div>
                        </div>
                        <div class="step-title">
                            <h5>Đặt hàng</h5>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-num">
                            <div class="step-num-cell active">
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
            </div>
        </div>
        <div class="row">
            <div class="checkout-form">
                <?php if(isset($user_info)):?>
                <form action="<?php echo base_url('order/checkout'); ?>" method="post">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-right-side">
                            <h4 class="form-site-title">Thông tin người nhận</h4>
                            <div class="s-data">
                                <p class="input-label required">Họ và tên</p>
                                <input value="<?php echo set_value('o-fullname') ?>" type="text" name="o-fullname" id="text12" placeholder="Lee Min Ho"/>
                                <ul class="parsley-errors-list filled" id="parsley-id-7">
                                    <li class="parsley-required"><?php echo form_error('o-fullname') ?></li>
                                </ul>
                            </div>
                            <div class="s-data">
                                <p class="input-label required">Điện thoại</p>
                                <input value="<?php echo set_value('o-phone') ?>" type="text" name="o-phone" id="text12" placeholder="01234567890"/>
                                <ul class="parsley-errors-list filled" id="parsley-id-7">
                                    <li class="parsley-required"><?php echo form_error('o-phone') ?></li>
                                </ul>
                            </div>
                            <div class="s-data">
                                <p class="input-label required">Email</p>
                                <input value="<?php echo set_value('o-email') ?>" type="text" name="o-email" id="text12" placeholder="lee@gmail.com"/>
                                <ul class="parsley-errors-list filled" id="parsley-id-7">
                                    <li class="parsley-required"><?php echo form_error('o-email') ?></li>
                                </ul>
                            </div>
                            <div class="s-data">
                                <p class="input-label required">Địa chỉ</p>
                                <input value="<?php echo set_value('o-address') ?>" type="text" name="o-address" id="text12" placeholder="65 Bùi Đình Túy"/>
                                <ul class="parsley-errors-list filled" id="parsley-id-7">
                                    <li class="parsley-required"><?php echo form_error('o-address') ?></li>
                                </ul>
                            </div>
                            <!--<div class="s-data">
                                <p class="input-label required">Tỉnh / Thành phố</p>
                                <select class="vietnam">
                                    <option  selected>Vietnam</option>
                                    <option>Vietnam 1</option>
                                    <option>Vietnam 2</option>
                                    <option>Vietnam 3</option>
                                </select>
                            </div>
                            <div class="s-data">
                                <p class="input-label required">Quận / Huyện</p>
                                <select class="vietnam">
                                    <option  selected>Vietnam</option>
                                    <option>Vietnam 1</option>
                                    <option>Vietnam 2</option>
                                    <option>Vietnam 3</option>
                                </select>
                            </div>-->

                            <div class="s-data notes">
                                <p  class="input-label">Ghi chú</p>
                                <textarea value="<?php echo set_value('o-note') ?>" name="o-note" placeholder="thêm ghi chú"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="table-responsive">
                            <div class="cart_totals">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-quantity">Sản phẩm</th>
                                            <th class="product-subtotal">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($carts as $row): ?>
                                            <tr class="cart-subtotal">
                                                <th><?php echo $row['name'] ?> <span> x <?php echo $row['qty'] ?></span></th>
                                                <td><?php echo $row['subtotal'] . '.000 đ' ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="order-total">
                                            <th><span class="amount">Tổng tiền</span></th>
                                            <td><span class="amount"><?php echo $total_amount . '.000 đ' ?></span></td>
                                        </tr>
                                    </tbody>
              
                                </table>
                                    <!-- <button href="http://localhost/momo/PayMoMo/index.php?amount=1000000&orderInfo=B%C3%A1nh%20tr%C3%A1n" formtarget="_blank">Thanh toán qua momo</button> -->
                                <a target="_blank" href="http://bleumomo.herokuapp.com/index.php?amount=<?php echo $total_amount . '000' ?>&orderInfo=<?php foreach ($carts as $row): ?>
                                        <?php echo $row['name'] ?> x <?php echo $row['qty'] ?>
                                        <?php endforeach; ?>" class="btn btn btn-danger" id="btn-sendface">Thanh toán bằng momo</a>
                            </div>
                        </div>
                        <div class="coupon-chech-out">
                            <div class="chech-out">
                                <button type="submit" class="btn-update" id="btn-sendface"  /> Gửi đơn hàng</button>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
            <div class="col-sm-12">
                <h3 class="login-comment-requied">Bạn cần <a href="/doanvat.local/user/login">đăng nhập</a> để đặt hàng về sản phẩm!</h3>
            </div>
        <?php endif ?>
                </form>
            </div>
        </div>

 <script type="text/javascript">
         <!--
            function Redirect() {
               window.location="http://bleumomo.herokuapp.com/index.php?amount=<?php echo $total_amount . '000' ?>&orderInfo=<?php foreach ($carts as $row): ?>
                                        <?php echo $row['name'] ?> x <?php echo $row['qty'] ?>
                                        <?php endforeach; ?>";
            }
         //-->
      </script>
    </div>
</div>
<!--/ checkout Area-->