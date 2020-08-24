<div class="col-md-9 col-right products-list">
    <div class="breadcrumb-area breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li>Giới thiệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area-->
    <div class="products-area">
        <?php foreach ($about_list as $row): ?>
            <!-- Single Product -->
            <div class="col-md-12 product-list-col">
                <div class="product-details-list">
                    <div class="header-list-style">
                        <h4 class="grid-title">
                            <a href="<?php echo base_url('gioithieu/' . $row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a>
                        </h4>
                        <div class="entry-meta">
                            <span class="date"><a href="#" title="" rel="bookmark"><i class="fa fa-clock-o" style="margin-right: 3px"></i><time class="entry-date" datetime=""><?php
                                        $date = new DateTime($row->created);
                                        echo date_format($date, 'd-m-Y');
                                        ?></time></a></span>
                            <i class="fa fa-folder-open" style="margin-right: 3px;"></i><span class="categories-links"><a href="<?php echo base_url('gioi-thieu'); ?>" rel="category">Giới thiệu</a></span>
                            <span class="author vcard"><i class="fa fa-user" style="margin-right: 3px"></i><a class="url fn n" href="#" title="View all posts by admin" rel="author">admin</a></span> 
                        </div>
                    </div>
                    <div class="item-content">
                        <p><?php echo desc($row->content, 220) ?>... <a href="<?php echo base_url('gioithieu/' . $row->slug . '-' . $row->id . '.html') ?>"><span>[Read more...]</span></a></p>
                    </div>
                </div>
            </div>
            <!-- Single Product -->
        <?php endforeach; ?>
    </div> 
    <!--/ All product end-->			
</div>