<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 no-padding-xs no-padding-sm no-padding-left-md">
  <div class="column-right">
    <div class="headline"><h1>Chỉnh sửa thông tin thành viên</h1></div>
    <div class="content">
        <div id="loginbox" class="mainbox col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1">                    
            <div class="panel panel-info">
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="<?php echo $user->email ?>" disabled="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Họ tên</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php echo $user->name ?>">
                                <div class="error" id="name_error"><?php echo form_error('name')?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-3 control-label">Số điện thoại</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone" value="<?php echo $user->phone ?>">
                                <div class="error" id="phone_error"><?php echo form_error('phone')?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-3 control-label">Địa chỉ</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" value="<?php echo $user->address ?>">
                                <div class="error" id="phone_error"><?php echo form_error('phone')?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" >
                                <div class="error" id="password_error"><?php echo form_error('password')?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="re_password" class="col-md-3 control-label">Nhập lại mật khẩu</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu">
                                <div class="error" id="re_password_error"><?php echo form_error('re_password')?></div>
                            </div>
                        </div>
                        <div class="form-group">                                
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit"><i class="icon-hand-right"></i> Chỉnh sửa thông tin </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
        </div>
    </div>
</div>