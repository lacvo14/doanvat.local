<div class="col-md-9 col-right products-list">
    <div class="breadcrumb-area breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="<?php echo base_url('product') ?>">Sản Phẩm</a></li>
                            <li><a href="<?php echo base_url('product/catalog/' . $product_cat->id); ?>"><?php echo $product_cat->name ?></a></li>
                            <li><?php echo $product->name ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row product-item">
        <div class="product-list-col">
            <div class="col-sm-5">
                <!-- Tab panes -->
                <div class="tab-content single-product-big-img">
                    <div role="tabpanel" class="tab-pane active" id="one">
                        <div class="s-product-img">
                            <!-- Discount - new - hot -->
                            <span class="special"><a href="#"><i class="pe-7s-plus"></i></a></span>
                            <!--/ Discount - new - hot -->
                            <a href="#"><img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" alt=""></a>
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="product-details-list">
                    <div class="product-title-star">
                        <h5 class="product-title single-product"><a href="#"><?php echo $product->name ?></a></h5>
                        <div class="product-review-list"><span>(<?php echo $product->count_view ?> views)</span></div>
                    </div>
                    <?php $this->load->view('site/product/rating', $this->data); ?>
                    <form method="POST" action="<?php echo base_url('cart/add/' . $product->id); ?>">
                        <div class="product-options fix">
                            <div class="single-option colors">
                                <label>Chọn loại :</label>

                                <div class="select-color">
                                    <select name="price" id="price">
                                        <?php
                                        $price_list = @json_decode($product->price);
                                        foreach ($price_list as $price):
                                            ?>
                                            <?php
                                            $price_value = explode(":", $price);
                                            $price_value = trim($price_value['1']);
                                            $price_value = preg_replace('/.000/', '', $price_value)
                                            ?>
                                            <option value="<?php echo $price_value ?>" <?php if ($price_value == $product->price) echo 'selected'; ?>> <?php echo $price ?> </option>
                                        <?php endforeach ?>

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="product-options fix">
                            <div class="quantity-area">
                                <label>Số lượng :</label>
                                <div class="cart-quantity">
                                    <div class="product-quantity">
                                        <div class="cart-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" name="number" type="number" value="1" min="1">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-area-list">
                                <div class="btn-add-to-cart cart-btn"><button class="btn-buy" type="submit"><i class="pe-7s-shopbag"></i> Thêm vào giỏ</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('site/product/comment', $this->data); ?>


    <div class="relative-product">
        <div class="col-sm-12">
            <div class="product-single-sidebar upsell-product">
                <div class="sidebar-title">
                    <p>Sản phẩm cùng loại</p>
                </div>
            </div>
        </div>
        <?php foreach ($get_list_product as $row): ?>
            <div class="col-md-4 col-sm-6 col-xs-12 items">
                <!-- Single Item  -->
                <div class="single-item">
                    <div class="single-product fix">
                        <div class="s-product-img">
                            <a href="#"><img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt=""></a>
                            <div class="img-overlay"></div>
                            <div class="image-title">
                                <!-- Single product hover Title-->
                                <div class="image-title-table">
                                    <div class="image-title-table-cell">
                                        <a href="<?php echo base_url('product/view/' . $row->id); ?>"><p><?php echo $row->name ?></p></a>
                                    </div>
                                </div>
                                <!--/ Single product hover Title-->
                            </div>
                            <div class="single-product-hover">
                                <!-- size and link -->
                                <div class="single-product-links">
                                    <div class="s-link"><a href="#"><i class="pe-7s-shopbag"></i> Add to cart</a></div>
                                </div>
                                <!-- size and link end-->
                            </div>
                        </div>
                        <!-- Single product Title-->
                        <div class="product-title">
                            <a href="#"><?php echo $row->name ?></a>
                        </div>
                        <!-- Product price -->
                        <div class="price-box">
                            <p class="special-price"><span class="price"><?php echo json_decode($row->price)["0"] ?> đ</span></p>
                        </div>
                        <!--/ Product price -->
                    </div>
                </div>
                <!-- Single Item -->
            </div>
        <?php endforeach; ?>
    </div>
</div>