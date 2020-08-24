<div class="col-md-9 col-right products-list">
    <div class="breadcrumb-area breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li>Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area-->
    <div class="products-area">

        <div class="row">
            <?php foreach ($products as $row): ?>
                <div class="col-md-4 col-sm-6 col-xs-12 items">
                    <form method="POST" action="<?php echo base_url('cart/add/' . $row->id); ?>">
                        <!-- Single Item  -->
                        <div class="single-item">
                            <div class="single-product fix">
                                <div class="s-product-img">
                                    <a href="<?php echo base_url($row->slug . '-' . $row->id . '.html') ?>"><img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="">
                                        <div class="img-overlay"></div>
                                        <div class="image-title">
                                            <!-- Single product hover Title-->
                                            <div class="image-title-table">
                                                <div class="image-title-table-cell">
                                                    <p><?php echo $row->name ?></p>
                                                </div>
                                            </div>
                                            <!--/ Single product hover Title-->
                                        </div>
                                    </a>
                                    <div class="single-product-hover">
                                        <!-- size and link -->
                                        <div class="single-product-links">
                                            <div class="s-link"><button class="btn-b" type="submit"><i class="pe-7s-shopbag"></i> Thêm vào giỏ</button></div>
                                        </div>
                                        <!-- size and link end-->
                                    </div>

                                </div>
                                <!-- Single product Title-->
                                <div class="product-title">
                                    <a href="<?php echo base_url($row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a>
                                </div>
                                <!-- Product price -->
                                <div class="price-box">
                                    <?php $price = @json_decode($row->price)['0']; ?>
                                    <?php
                                    $price_value = explode(":", $price);
                                    $price_value = trim($price_value['1']);
                                    $price_value = preg_replace('/.000/', '', $price_value)
                                    ?>
                                    <input value="<?php echo $price_value ?>" name="price" type="hidden">
                                    <p class="special-price"><span class="price"><?php echo json_decode($row->price)["0"] ?> đ</span></p>
                                </div>
                                <!--/ Product price -->
                            </div>
                        </div>
                        <!-- Single Item -->
                    </form>
                </div>
            <?php endforeach; ?>

        </div>
        <!--/ All product-->	

        <!--Pagination -->
        <div class="row">
            <div class="col-sm-12">
                <div class="pagination-area">
                    <div class="paginations">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-per-page">
                                    <p>Total : <span><?php echo $total ?></span> Sản phẩm</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-page-number">
                                    <?php echo $this->pagination->create_links() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End-->		
    </div> 
    <!--/ product area-->	
</div>