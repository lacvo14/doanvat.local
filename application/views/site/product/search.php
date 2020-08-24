<div class="col-md-9 col-right products-list">
    <!-- product area-->
    <div class="products-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-menu">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#">Tìm Kiếm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="inner-arrow"><i class="fa fa-ellipsis-v" aria-hidden="true"></i> Kết quả tìm kiếm từ khóa : <?php echo $key ?></h4>
                <?php if (!empty($list_search)) : ?>
                    <?php foreach ($list_search as $row): ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 items">
                            <form method="POST" action="<?php echo base_url('cart/add/' . $row->id); ?>">
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
                                                        <p><?php echo $row->name ?></p>
                                                    </div>
                                                </div>
                                                <!--/ Single product hover Title-->
                                            </div>
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
                                            <a href="#"><?php echo $row->name ?></a>
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
                <?php else : ?>
                    <div class="error-search"><h3>Rất tiếc ! Không tìm thấy kết quả nào với từ khóa '<span><?php echo $key ?></span>'</h3></div>
                <?php endif; ?>
            </div>
        </div>
        <!--/ All product-->	


    </div> 
    <!--/ product area-->	
</div>