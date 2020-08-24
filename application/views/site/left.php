<div class="col-md-3 col-left">
    <nav class="top-area-right-menu">
        <ul>
            <li class="search-active">
                <a href="#"><i class="pe-7s-search"></i></a>
                <div class="search-form">
                    <form action="<?php echo site_url('product/search') ?>" method="get">
                        <input name="key-search"  id="search" placeholder="Search" type="text">
                    </form>
                </div>
            </li>
            <li class="cart-active"><a href="#"><i class="pe-7s-cart"> <sup><?php echo $total_items ?></sup></i></a>
                <div class="cart-form">
                    <?php $total_amount = 0; ?>
                    <?php foreach ($carts as $row): ?>
                    <?php $total_amount = $total_amount + $row['subtotal']; ?>
                        <div class="cart-single-product">
                            <div class="cart-single-product-img">
                                <img src="<?php echo base_url('upload/product/thumb/' . $row['image_link']) ?>" alt="">
                            </div>
                            <div class="cart-single-product-title">
                                <a href="#"><?php echo $row['name'] ?> </a>
                                <p><?php echo $row['qty'] ?> <span>X</span> <?php echo $row['price'].'.000 đ' ?></p>
                            </div>
                            <div class="cart-single-product-del">
                                <a href="<?php echo base_url('cart/del/').$row['id']?>"><i class="pe-7s-trash"></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="total-amount fix">
                        <p>Tổng tiền : </p><span><?php echo $total_amount.'.000 đ' ?></span>

                    </div>
                    <div class="action-cart">
                        <a href="<?php echo base_url('cart') ?>" class="viewcart">Giỏ Hàng</a>
                        <a href="<?php echo base_url('order/checkout') ?>" class="checkout">Thanh Toán</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <div class="categori-menu">
        <div class="categori-head">
            <h5><i class="fa fa-bars"></i>Danh mục</h5>
        </div>
        <div class="categories-body">
            <ul>
                <?php foreach ($cat_list as $row): ?>
                    <li><a href="<?php echo base_url('san-pham/'.$row->slug) ?>"><?php echo $row->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="categori-menu">
        <div class="categori-head">
            <h5>Video</h5>
        </div>
        <div class="video-hot">
            <?php foreach ($video_pub as $row): ?>
                <?php
                $url = $row->link;
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                    $video_id = $match[1];
                }
                ?>
                <iframe width="640" height="480" frameborder="0" id="player" allowfullscreen="1" title="YouTube video player" src="http://www.youtube.com/embed/<?php echo $video_id ?>"></iframe>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="categori-menu">
        <div class="categori-head">
            <h5>Fanpage</h5>
        </div>
        <div class="video-hot">
            <div class="fb-page" data-href="https://www.facebook.com/daheochiengion/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/daheochiengion/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/daheochiengion/">Facebook</a>
                </blockquote>
            </div>
        </div>
    </div>
</div>