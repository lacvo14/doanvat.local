<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 no-padding-xs no-padding-sm no-padding-left-md">
  <div class="column-right">
    <div class="headline"><h1>Đăng nhập hệ thống</h1></div>
    <div class="content">
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div style="padding-top:30px" class="panel-body" >
                        <?php echo form_error('login')?>
                        <form id="loginform" class="form-horizontal" role="form" method="POST">
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email">     
                                <div class="error" id="email_error"><?php echo form_error('email')?></div>                                   
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                <div class="error" id="email_error"><?php echo form_error('password')?></div>
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                  <button id="btn-login" class="btn btn-success" type="submit"> Đăng nhập  </button>
                                  <a id="btn-fblogin" href="doanvat.local/user/fblogin" class="btn btn-primary">Đăng nhập bằng Facebook</a>
                                </div>
                            </div>
                        </form>     
                    </div>                     
                </div>  
            </div>
        </div>
    </div>
</div>