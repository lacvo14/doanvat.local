<div class="footer">
    <!--footer top-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- first column-->
                <div class="footer-logo col-md-12">
                    <img src="<?php echo public_url('site/theme/') ?>img/logo3.png" alt="">
                </div>
                <div class="col-md-6 col-sm-6 text-left">
                    <div class="widget about">

                        <div class="address">

                            <p><i class="pe-7s-map-marker"></i><strong> Address:</strong> <?php echo $address->content ?></p>
                            <p><i class="pe-7s-call"></i><strong> Hotline:</strong> <?php echo $phone->content ?></p>
                            <p><i class="pe-7s-mail"></i><strong> Email:</strong> <?php echo $email->content ?></p> 
                        </div>
                    </div>
                </div>
                <!--/ first column-->
                <!-- 2nd column-->
                <div class="col-md-3 col-sm-3 col-xs-7 text-left">
                    <div class="widget social-icons-list">
                        <div class="footer-menu widget">
                            <ul>
                                <?php foreach ($about_list as $row): ?>
                                    <li><a href="<?php echo base_url('gioithieu/' . $row->slug . '-' . $row->id . '.html') ?>">- <?php echo $row->name ?></a></li>
                                <?php endforeach; ?>
                                <?php foreach ($wholesale_list as $row): ?>
                                    <li><a href="<?php echo base_url('muasi/' . $row->slug . '-' . $row->id . '.html') ?>">- <?php echo $row->name ?></a></li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-5 text-left">
                    <div class="widget social-icons-list">
                        <div class="social-icons size-normal">
                            <a href="https://www.fb.com/daheochiengion/" target="_blank" rel="nofollow" class="icon icon_facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="#" target="_blank" rel="nofollow" class="icon icon_youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                            <a href="#" target="_blank" rel="nofollow" class="icon icon_google"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!--/ 2nd column-->
            </div>
            <!--/ Row-->
        </div>
        <!--/ Container-->
    </div>
    <!--/ footer top-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <section class="copyright-section">
                    <p>2020 &copy; Lạc Võ. Thiết kế bởi <strong> <a style="color: red" href="#">Lạc Võ</a> </strong>. All Rights Reserved</p>
                </section>	
            </div>
        </div>
    </div>
</div>

<div class="container_face">
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-like-box" data-href="https://www.facebook.com/daheochiengion/" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
</div>
<!-- JS -->

<script src="<?php echo public_url('site/theme/js/vendor/jquery-1.11.3.min.js') ?>"></script>
<script src="<?php echo public_url('site/theme/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo public_url('site/theme/js/owl.carousel.min.js') ?>"></script>
<script src="<?php echo public_url('site/theme/js/wow.js') ?>"></script>

<script>
        new WOW().init();
</script>
<script src="<?php echo public_url('site/theme/js/jquery-ui.js') ?>"></script>
<script src="<?php echo public_url('site/theme/js/jquery.scrollUp.min.js') ?>"></script>
<script src="<?php echo public_url('site/theme/js/jquery.meanmenu.js') ?>"></script>

<script src="<?php echo public_url('site/theme/lab/js/jquery.nivo.slider.js') ?>" type="text/javascript"></script>
<script src="<?php echo public_url('site/theme/lab/home.js') ?>" type="text/javascript"></script>
<script src="<?php echo public_url('site/theme/js/plugins.js') ?>"></script>
<script src="<?php echo public_url('site/theme/js/main.js') ?>"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#slider').nivoSlider();
        });


</script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(".container_face").hover(function () {
            jQuery(this).stop().animate({right: "0"}, "medium");
        }, function () {
            jQuery(this).stop().animate({right: "-245"}, "medium");
        }, 500);
    });
</script>