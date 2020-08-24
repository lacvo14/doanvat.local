<div class="col-md-9 col-right products-list">
    <div class="breadcrumb-area breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li>Cảm nhận</li>
                            <li><?php echo $comments_cat->name ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area-->
    <div class="products-area">
        <?php foreach ($comments_list as $row): ?>
            <!-- Single Product -->
            <div class="row">
                <div class="product-list-col">
                    <div class="col-sm-2 ">
                        <div class="comments-img">
                            <a href="<?php echo base_url('camnhan/' . $row->slug . '-' . $row->id . '.html') ?>"><img src="<?php echo base_url('upload/comments/thumb/' . $row->image_link) ?>" alt=""></a>

                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="product-details-list">
                            <div class="header-list-style">
                                <h4 class="product-title"><a href="<?php echo base_url('camnhan/' . $row->slug . '-' . $row->id . '.html') ?>"><?php echo $row->name ?></a></h4>
                                <div class="entry-meta">
                                    <span class="date"><a href="#" title="" rel="bookmark"><i class="fa fa-clock-o" style="margin-right: 3px"></i><time class="entry-date" datetime=""><?php
                                                $date = new DateTime($row->created);
                                                echo date_format($date, 'd-m-Y');
                                                ?></time></a></span>
                                    <i class="fa fa-folder-open" style="margin-right: 3px;"></i><span class="categories-links"><a href="<?php echo base_url('cam-nhan/' . $comments_cat->slug) ?>" rel="category"><?php echo $comments_cat->name ?></a></span>
                                    <span class="author vcard"><i class="fa fa-user" style="margin-right: 3px"></i><a class="url fn n" href="#" title="View all posts by admin" rel="author">admin</a></span> 
                                </div>
                            </div>
                            <div class="item-content">
                                <p><?php echo desc($row->content, 220) ?>... <a href="<?php echo base_url('camnhan/' . $row->slug . '-' . $row->id . '.html') ?>"><span>[Read more...]</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Product -->
        <?php endforeach; ?>
    </div> 
    <!--/ All product end-->			
</div>