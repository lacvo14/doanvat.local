<div class="col-md-9 col-right products-list">
    <div class="breadcrumb-area breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li>Tin Tức</li>
                            <li><a href="<?php echo base_url('tin-tuc/' . $news_cat->slug) ?>"><?php echo $news_cat->name ?></a></li>
                            <li><?php echo $news->name ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area-->
    <div class="products-area">
        <article id="post-<?php echo $news->id ?>" class="detail-news">
            <header class="entry-header">
                <h1 class="entry-title"><?php echo $news->name ?></h1>

                <div class="entry-meta">
                    <span class="date"><a href="#" title="" rel="bookmark"><i class="fa fa-clock-o" style="margin-right: 3px"></i><time class="entry-date" datetime=""><?php echo $news->created ?></time></a></span>
                    <i class="fa fa-folder-open" style="margin-right: 3px;"></i><span class="categories-links"><a href="<?php echo base_url('tin-tuc/' . $news_cat->slug) ?>" rel="category"><?php echo $news_cat->name ?></a></span>
                    <span class="author vcard"><i class="fa fa-user" style="margin-right: 3px"></i><a class="url fn n" href="#" title="View all posts by admin" rel="author">admin</a></span> 
                </div>
                <div class="entry-content">
                    <?php echo $news->content ?>
                </div>
            </header>
        </article>

    </div> 
    <!--/ product area-->	
</div>