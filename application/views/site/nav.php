<div class="clear"></div>
<div class="header-top-area border-bottom">
    <!-- Top area left menu-->
    <div class="text-left">
        <div class="top-area-left-menu">
            <ul>
                <li><span><i class="pe-7s-call"></i> HOTLINE : </span><a href="#">070883229</a></li>
                <li><span><i class="pe-7s-mail"></i> KHUYẾN MÃI </span><a href="#">Khuyễn Mãi Khi Đặt 5 Con Heo Tại Shop :))</a></li>
            </ul>
        </div>
    </div>
    <!-- /Top area left menu-->

</div>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <!-- Main Menu start -->
            <div class="main-menu-area megamenu-active">
                <!-- Logo Start -->
                <div class="col-md-3 col-sm-12">
                    <div class="site-logo">
                        <a href="<?php echo base_url() ?>"><img src="<?php echo public_url('site/theme/') ?>img/logo3.png" alt=""></a>
                    </div>
                </div>
                <!-- Logo Start -->
                <div class="col-md-9 col-sm-12 text-right">
                    <div class="mainmenu">
                        <div class="navbar-collapse collapse">
                            <ul id="nav" class="nav navbar-nav">
                                <!--<li><a href="<?php echo base_url() ?>">Trang Chủ</a></li>-->
                                <li class="active"><a href="<?php echo base_url() ?>sanpham">Sản phẩm</a></li>
                                <li class="megamenu-list dropdown-active"><a href="<?php echo base_url() ?>gioi-thieu">Giới Thiệu <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <?php foreach ($about_list as $row): ?>
                                            <li><a href="<?php echo base_url('gioithieu/' . $row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="megamenu-list dropdown-active"><a href="#">Tin Tức <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <?php foreach ($newscat_list as $row): ?>
                                            <li><a href="<?php echo base_url('tin-tuc/' . $row->slug) ?>"><?php echo $row->name ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url() ?>lien-he">Liên hệ</a></li>
                                <li class="megamenu-list dropdown-active">
                                    <?php if(isset($user_info)):?>
                                    <a href="<?php echo base_url('user')?>">Xin chào: <?php echo $user_info->name?><i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class=""><a href="<?php echo base_url('user')?>">Hồ sơ</a></li>
                                        <li class=""><a href="<?php echo base_url('user/logout')?>">Thoát</a></li>
                                    </ul>
                                </li>
                                    <?php else :;?>
                                <li class="megamenu-list dropdown-active">
                                    <a href="#">Tài khoản<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <a href="<?php echo base_url('user/login')?>">Đăng nhập</a>
                                        <li class=""><a href="<?php echo base_url('user/register')?>">Đăng ký</a></li>   
                                    </ul>
                                </li>
                                    <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-site-logo">
                <a href="#"><img src="<?php echo public_url('site/theme/') ?>img/logo3.png" alt=""></a>
            </div>
            <!-- Main Menu End -->
            <div class="mobile-menu-area">
                <nav id="mobile-menu" style="display: block;">
                    <ul>
                        <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
                        <li><a href="<?php echo base_url() ?>gioi-thieu">Giới Thiệu</a>
                            <ul>
                                <?php foreach ($about_list as $row): ?>
                                    <li><a href="<?php echo base_url('gioithieu/' . $row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url() ?>sanpham">Sản phẩm</a></li>
                        <li><a href="<?php echo base_url() ?>mua-si">Mua Sỉ</a>
                            <ul>
                                <?php foreach ($wholesale_list as $row): ?>
                                    <li><a href="<?php echo base_url('muasi/' . $row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a href="#">Tin Tức</a>
                            <ul>
                                <?php foreach ($newscat_list as $row): ?>
                                    <li><a href="<?php echo base_url('tin-tuc/' . $row->slug) ?>"><?php echo $row->name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li>
                                    <?php if(isset($user_info)):?>
                                    <a href="<?php echo base_url('user')?>">Xin chào: <?php echo $user_info->name?><i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class=""><a href="<?php echo base_url('user')?>">Hồ sơ</a></li>
                                        <li class=""><a href="<?php echo base_url('user/logout')?>">Thoát</a></li>
                                    </ul>
                                </li>
                                    <?php else :;?>
                                <li class="megamenu-list dropdown-active">
                                    <a href="#">Tài khoản<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <a href="<?php echo base_url('user/login')?>">Đăng nhập</a>
                                        <li class=""><a href="<?php echo base_url('user/register')?>">Đăng ký</a></li>   
                                    </ul>
                                </li>
                                    <?php endif;?>
                        <li><a href="<?php echo base_url() ?>lien-he">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--/ col -->
    </div>
    <!--/ row -->
</div>
<!--/ container -->
