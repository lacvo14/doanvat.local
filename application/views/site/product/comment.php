<div class="comment-product">
    <div class="col-sm-12">
        <div class="product-single-sidebar upsell-product">
            <h3 class="sidebar-title">Bình luận về sản phẩm</h3>
        </div>
        <div class="list-comments">
            <?php foreach($listcomments as $row): ?>
                <div class="comment-item">
                    <h4 class="comment-author"><?php echo (isset($row->infoUser->name)) ? $row->infoUser->name : 'Ẩn danh'; ?></h4>
                    <p class="comment-content"><?php echo $row->content ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="comment-product">
    <?php if(isset($user_info)):?>
        <div class="col-sm-12">
            <div class="product-single-sidebar upsell-product">
                <h4 class="sidebar-title">Để lại bình luận</h4>
            </div>
            <div class="comment-form">
                <textarea placeholder="Tham gia bình luận ngay" required="" id="content" style="overflow: hidden; min-height: 2em;"></textarea>
                <div class="right">
                    <button id="comment-submit">Bình luận</button>
                </div>
                <div class="left">
                    <p id="comment-err"></p>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="col-sm-12">
                <h3 class="login-comment-requied">Bạn cần <a href="/doanvat.local/user/login">đăng nhập</a> để bình luận về sản phẩm!</h3>
            </div>
        <?php endif ?>
    </div>


    <script>
        $('#comment-submit').click(function(event) {
            $('#comment-err').hide('fadeOut');
            content = $('#content').val();
            if(content.length < 6){
                $('#comment-err').show('fadeIn');
                $('#comment-err').html('Nội dung bình luận phải nhiều hơn 6 ký tự');
            }else
            {
                comment();
            }
            $('#content').val('');
        });



        function comment(){
            $.ajax({
                url: '<?php echo base_url('product/comment'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    product: '<?php echo $product->id ?>',
                    content: content
                },
            })
            .done(function(data) {
                if(data.status == 'success')
                    window.location.reload();
                else{
                    $('#comment-err').show('fadeIn');
                    $('#comment-err').html(data.msg);
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }       
    </script>