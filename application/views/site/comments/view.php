<div class="col-md-9 col-right products-list">
    <div class="breadcrumb-area breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li>Tin Tức</li>
                            <li><a href="<?php echo base_url() ?>"><?php echo $comments_cat->name ?></a></li>
                            <li><?php echo $comments->name ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area-->
    <div class="products-area">
        <article id="post-<?php echo $comments->id ?>" class="detail-comments">
            <header class="entry-header">
                <h1 class="entry-title"><?php echo $comments->name ?></h1>

                <div class="entry-meta">
                    <span class="date"><a href="#" title="" rel="bookmark"><i class="fa fa-clock-o" style="margin-right: 3px"></i><time class="entry-date" datetime=""><?php echo $comments->created ?></time></a></span>
                    <i class="fa fa-folder-open" style="margin-right: 3px;"></i><span class="categories-links"><a href="<?php echo base_url('cam-nhan/' . $comments_cat->slug) ?>" rel="category"><?php echo $comments_cat->name ?></a></span>
                    <span class="author vcard"><i class="fa fa-user" style="margin-right: 3px"></i><a class="url fn n" href="#" title="View all posts by admin" rel="author">admin</a></span> 
                </div>
                <div class="entry-content">
                    <?php echo $comments->content ?>
                </div>
            </header>
        </article>

    </div> 
    <!--/ product area-->	
</div>