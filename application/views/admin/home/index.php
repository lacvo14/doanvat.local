<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo admin_url('') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i>Xin chào <?php echo $this->session->userdata('login'); ?></a></div>
    <h1>Trang chủ</h1>
</div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<div class="container-fluid">
    <!--End-Action boxes-->    
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <h5>Ban Quản Trị (<?php echo $total_admin ?>)</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG3">
                    <ul class="recent-posts">
                        <?php foreach ($list_admin as $row): ?>
                            <li>
                                <div class="user-thumb"> <img alt="User" src="<?php echo public_url('') ?>admin/img/demo/av1.jpg" width="40" height="40"> </div>
                                <div class="article-post" style="padding-top:15px">
                                    <p><a href="#"><?php echo $row->username ?></a> </p>
                                </div>
                            </li>    
                        <?php endforeach; ?>
                        <li>
                            <button class="btn btn-warning btn-mini"><a href="<?php echo admin_url('') ?>admin/">View All</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fa fa-rss-square" aria-hidden="true"></i></i></span>
                    <h5>Bài viết (<?php echo $total_news ?>)</h5>
                </div>
                <div class="widget-content nopadding collapse in" >
                    <ul class="recent-posts">
                        <?php foreach ($list_news as $row): ?>
                            <li>
                                <div class="user-thumb"> <img src="<?php echo base_url('') ?>upload/news/thumb/<?php echo $row->image_link ?>" height="40"></div>
                                <div class="article-post" style="padding-top:15px">
                                    <p><a href="<?php echo base_url('tintuc/' . $row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a> </p>
                                </div>
                            </li>    
                        <?php endforeach; ?>
                        <li>
                            <button class="btn btn-warning btn-mini"><a href="<?php echo admin_url('') ?>news/">View All</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fa fa-product-hunt"></i></span>
                    <h5>Sản phẩm mới (<?php echo $total_info ?>)</h5>
                </div>
                <div class="widget-content nopadding collapse in" >
                    <ul class="recent-posts">
                        <?php foreach ($list_info as $row): ?>
                            <li>
                                <div class="user-thumb"> <img src="<?php echo base_url('') ?>upload/product/thumb/<?php echo $row->image_link ?>" height="40"></div>
                                <div class="article-post" style="padding-top:15px">
                                    <p><a href="<?php echo base_url($row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a> </p>
                                </div>
                            </li>    
                        <?php endforeach; ?>
                        <li>
                            <button class="btn btn-warning btn-mini"><a href="<?php echo admin_url('') ?>product/">View All</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="span6">

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="fa fa-cogs"></i></span>
                    <h5>Doanh số</h5>
                </div>
                <div class="widget-content">
                    <ul class="unstyled">
                        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Tổng doanh số <span class="pull-right strong"><?php echo number_format($amount_total) ?>.000 đ </span>
                            <div class="progress progress-striped ">
                                <?php $tong = $amount_total/1000; ?>
                                <div style="width: <?php echo $tong ?>%;" class="bar"></div>
                            </div>
                        </li>
                        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Doanh số tháng <span class="pull-right strong"><?php echo number_format($tongtien_thang) ?>.000 đ </span>
                            <div class="progress progress-success progress-striped ">
                                <?php $month = $tongtien_thang/100; ?>
                                <div style="width: <?php echo $month ?>%;" class="bar"></div>
                            </div>
                        </li>
                        <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span> Doanh số hôm nay <span class="pull-right strong"><?php echo number_format($amount_to_day) ?>.000 đ</span>
                            <div class="progress progress-warning progress-striped ">
                                 <?php $today = $amount_to_day/10; ?>
                                <div style="width: <?php echo $today ?>%;" class="bar"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-warning btn-mini"><a href="<?php echo admin_url('') ?>transaction/">View All</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


