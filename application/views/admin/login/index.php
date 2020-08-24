<html>
    <head>
        <?php $this->load->view('admin/login/head'); ?>
    </head>
    <body>
        <div id="loginbox"> 
            <form id="loginform" class="form-vertical" action="" method="POST">
                <div class="control-group normal_text"> <h3><img src="<?php echo public_url('admin/img/logo22.png') ?>" alt="Logo" width="200px" /></h3></div>
                <div style="color:red; text-align: center">
                    <?php echo form_error('login') ?>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Tài khoản" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Mật khẩu" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Quên mật khẩu?</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success">Đăng nhập</span>
                </div>
            </form>
            <form id="recoverform" action="" class="form-vertical">
                <p class="normal_text">Nếu bạn bị quên mật khẩu admin, hãy gọi 070.883.229 để được trợ giúp</p>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Quay lại đăng nhập</a></span>
                </div>
            </form>
        </div>
        <script src="<?php echo public_url('admin/js/jquery.min.js') ?>"></script>  
        <script src="<?php echo public_url('admin/js/matrix.login.js') ?>"></script> 
    </body>

</html>